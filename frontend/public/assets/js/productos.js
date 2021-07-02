$(document).ready(function () {
    trySearch();
    //loadSearch();
    getCategs();
});

var catsList = [];

function getCategs()
{
    var parametros = {
    };
    $.ajax({
            data:  parametros, //datos que se envian a traves de ajax 
            url:   api_dev + 'home/getCategorias', //archivo que recibe la peticion
            type:  'post', //método de envio
            beforeSend: function () 
            {
              Swal.fire({
                title: 'Procesando información',
                html: 'Un momento porfavor, estamos procesando su información',
                onBeforeOpen: () => {
                  Swal.showLoading();
                }
              });
            },
            success:  function (response) 
            { //una vez que el archivo recibe el request lo procesa y lo devuelve
                Swal.close();
                if (response.status == "error") 
                {
                  Swal.fire({
                        icon: 'error',
                        title: 'Usuario invalido',
                        text: 'Este usuario no tiene privilegios de administrador',
                        showCloseButton: true,
                        confirmButtonText: 'Ok',
                        onClose: () => {
                            location.replace(app_root+"/");
                        }
                    });
                }
                else if (response.status == "ok") 
                {
                  
                  var inventory = response.inventory;

                  catsList = inventory;
                  var clist = "";
                  clist += '<p>';
                  clist += '<a href="#" class="" onclick="loadFilter()">Ver todos los productos</a>';
                  clist += '</p>';
                  for(var i = 0; i < inventory.length; i++)
                  {
                    clist += '<p>';
                   clist += '<a href="#" onclick="loadFilter(`'+inventory[i].categoria_nombre+'`)">'+inventory[i].categoria_nombre+'</a>';
                   clist += '</p>';
                  }
                  $("#catego-list").html(clist);
                  
                }
                

            }
    });
}

function trySearch(){
    var params = JSON.parse(localStorage.getItem('filterParams'));
    if(params !== null){
        var search = params.look;
        var ordered  = params.price;
        var articulos = {};

        if (search!==''){
            $('#buscar').val(search);
            getArticulos(articulos, ordered, search);
        }else{
            getArticulos(articulos, ordered);
        }

    }else{
        getArticulos(articulos);
    }
}

function continueSearch(articulos,ordered){
    if (ordered!==''){
        $('#ordenar').val(ordered);
        if(ordered==='>'){
            loadArticulos(articulos, ordered);
        }else if(ordered==='<'){
            loadArticulos(articulos, ordered);
        }
    }else{
        loadArticulos(articulos);
    }
}

function getArticulos(articulos,ordered='',filter=''){
    $.ajax({
        type:"POST",
        url:api_dev+"home/getart",
        data:{
            key:api_key,
            filter:filter
        },
        dataType:"text",
        success:function(data){
            var data = data.slice(0, -265);
            if(data!=='Invalid key'){
                articulos = JSON.parse(data).articulos;
                if(articulos.length !== 0){
                    continueSearch(articulos,ordered);
                }else{
                    Swal.fire({
                        icon: 'error',
                        title: 'No se encontraron resultados',
                        text: 'Su busqueda no arrojo resultados, porfavor continue buscando',
                        showCloseButton: true,
                        confirmButtonText: 'Ok',
                        onClose: () => {
                            if(localStorage.getItem('filterParams')!==null){
                                var params = JSON.parse(localStorage.getItem('filterParams'));
                                params.look = '';
                                localStorage.setItem('filterParams',JSON.stringify(params));
                            }
                            location.reload();
                        }
                    }).then(function(isConfirm) {
                        if(localStorage.getItem('filterParams')!==null){
                            var params = JSON.parse(localStorage.getItem('filterParams'));
                            params.look = '';
                            localStorage.setItem('filterParams',JSON.stringify(params));
                        }
                        location.reload();
                    });
                }
            }
        }
    });
}

function loadArticulos(articulos, order=''){
    if(order==='>'){
        articulos.sort(function (a,b) {return b.precio - a.precio});
    }else if(order==='<'){
        articulos.sort(function (a,b) {return a.precio - b.precio});
    }
    if(localStorage.getItem('Articulos')!==null){
        localStorage.removeItem('Articulos');
    }
    localStorage.setItem('Articulos',JSON.stringify(articulos));
    pagination();
    showArticulos(0,8);
}

function pagination(){
    $('#pagination').twbsPagination({
        totalPages: Math.ceil((JSON.parse(localStorage.getItem('Articulos')).length)/8),
        startPage: 1,
        visiblePages: 3,
        first: 'Primera',
        prev: '<-',
        next: '->',
        last: 'Última',
        onPageClick: function (event, page) {
            showArticulos(((page*8)-8),8);
        }
    });
}

function showArticulos(start,end){
    var articulos = JSON.parse(localStorage.getItem('Articulos'));
    var json = articulos;
    var articulos = '';
    json = json.splice(start,end);
    localStorage.setItem('articulos',articulos);
    var string = localStorage.getItem('articulos');
    json.forEach(function (item,index,array){
        
        if(item.nombre.length>25){
            item.nombre = item.nombre.substr(0,21)+'...';
        }
        var categorias = item.cats;

        categorias = categorias.replace(/`/g, '"');
        categorias = JSON.parse(categorias);
        if (c != undefined && c != "") 
        {
            
                if (categorias.categoria == c) 
                {
										string += `<div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12 my-4 d-flex justify-content-center"><div class="card shadow" style="width: 100%;"><img src="${app_root}/assets/img/productos/${item.imagen_1}" class="card-img-top toproduct" alt="product_${index.toString()}" id="${item.id.toString()}"><div class="card-body"><h5 class="card-title product_name">${item.nombre}</h5><div class="row"><div class="col-sm-8 col-12"><p class="card-text">Existencia: `;
                    

                    if(item.cantidad>5){
                        string += `+5`;
                    }else{
                        string += item.cantidad.toString();
                    }

										string += `</p></div><div class="col-sm-4 col-12"><p class="card-text">$${item.precio.toFixed(2)}</p></div></div><button class="product_addtocart btn btn-primary mt-5" id="${item.id.toString()}">Agregar <i class="fas fa-shopping-cart"></i></button></div></div></div>`;

                    localStorage.setItem('articulos',string);
                }
            
        }
        else
        {
						string += `<div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12 my-4 d-flex justify-content-center"><div class="card shadow" style="width: 100%;"><img src="${app_root}/assets/img/productos/${item.imagen_1}" class="card-img-top toproduct" alt="product_${index.toString()}" id="${item.id.toString()}"><div class="card-body"><h5 class="card-title product_name">${item.nombre}</h5><div class="row"><div class="col-sm-8 col-12"><p class="card-text">Existencia: `;
                    
						if(item.cantidad>5){
								string += `+5`;
						}else{
								string += item.cantidad.toString();
						}

						string += `</p></div><div class="col-sm-4 col-12"><p class="card-text">$${item.precio.toFixed(2)}</p></div></div><button class="product_addtocart btn btn-primary mt-5" id="${item.id.toString()}">Agregar <i class="fas fa-shopping-cart"></i></button></div></div></div>`;
            localStorage.setItem('articulos',string);
        }
    });
    articulos = localStorage.getItem('articulos');
    localStorage.removeItem('articulos');
    $('.le-productos').html('');
    $('.le-productos').append(string);
    // Funcion para abrir un producto
    openProd();
    // Funcion añadir al carrito
    toCart();
    // Funcion añadir al carrito
    buyNow();
}

function loadSearch(){
    doSearch();
    doOrder();
}

function doSearch(){
    $('#buscar').keypress(function (event) {
        if (event.which == '13') {
            event.preventDefault();
            var params = {
                look:$(this).val(),
                price:$('#ordenar').val()
            }
            localStorage.setItem('filterParams',JSON.stringify(params));
            location.reload();
        }
    });
}

function doOrder(){
    $('#ordenar').on('change', function() {
        var params = {
            look:$('#buscar').val(),
            price:$(this).val()
        }
        localStorage.setItem('filterParams',JSON.stringify(params));
        location.reload();
    });
}

// Abre la pagina de producto
function openProd(){
    $('.toproduct').click(function(){
        location.replace(app_root+'/productos/'+$(this).attr("id"));
    });
}

// Añade productos a carrito
function toCart(){
    $('.product_addtocart').click(function (){
        var id = $(this).attr("id");
        $.ajax({
            type:"POST",
            url:api_dev+"home/getprodbyid",
            data:{
                key:api_key,
                id:id
            },
            dataType:"text",
            success:function(data){
                var data = data.slice(0, -265);
                if(data!=='Invalid key'){
                    articulos = JSON.parse(data).articulos;
                    if(articulos.length!==0){
                        var carrito;
                        var articulo = articulos[0];
                        if(localStorage.getItem('carrito')!==null){
                            carrito = JSON.parse(localStorage.getItem('carrito'));
                            carrito.articulos.push(articulo);
                            carrito.articulos[carrito.articulos.length-1].articulos = parseInt($('#tobuy_'+carrito.articulos[carrito.articulos.length-1].id.toString()).val());
                            $('#carrito_elementos').text(carrito.articulos.length.toString());
                            localStorage.setItem('carrito',JSON.stringify(carrito));
                        }else{
                            carrito = {
                                articulos:[articulo]
                            }
                            carrito.articulos[carrito.articulos.length-1].articulos = parseInt($('#tobuy'+carrito.articulos[carrito.articulos.length-1].id.toString()).val());
                            $('#carrito_elementos').text(carrito.articulos.length.toString());
                            localStorage.setItem('carrito',JSON.stringify(carrito));
                        }
                        Swal.fire({
                            icon: 'success',
                            title: 'Se añadio su producto a carrito',
                            text: '¿Desea ir a carrito o seguir comprando?',
                            confirmButtonColor: '#C3C3C3',
                            cancelButtonColor: '#00E154',
                            showCloseButton: true,
                            showCancelButton: true,
                            confirmButtonText: 'Continuar comprando',
                            cancelButtonText: 'Ir al carrito de compras'
                        }).then(function(isConfirm) {
                            if(!isConfirm.value){
                                location.replace(app_root+'/carrito');
                            }
                        });
                    }
                }
            }
        });
    });
}

// Función para comprar ahora
function buyNow(){
    $('.product_buynow').click(function (){
        var id = $(this).attr("id");
        $.ajax({
            type:"POST",
            url:api_dev+"home/getprodbyid",
            data:{
                key:api_key,
                id:id
            },
            dataType:"text",
            success:function(data){
                var data = data.slice(0, -265);
                if(data!=='Invalid key'){
                    articulos = JSON.parse(data).articulos;
                    if(articulos.length!==0){
                        var carrito;
                        var articulo = articulos[0];
                        if(localStorage.getItem('carrito')!==null){
                            carrito = JSON.parse(localStorage.getItem('carrito'));
                            carrito.articulos.push(articulo);
                            carrito.articulos[carrito.articulos.length-1].articulos = parseInt($('#tobuy_'+carrito.articulos[carrito.articulos.length-1].id.toString()).val());
                            $('#carrito_elementos').text(carrito.articulos.length.toString());
                            localStorage.setItem('carrito',JSON.stringify(carrito));
                            localStorage.setItem('buynow','');
                            location.replace(app_root+'/carrito');
                        }else{
                            carrito = {
                                articulos:[articulo]
                            }
                            carrito.articulos[carrito.articulos.length-1].articulos = parseInt($('#tobuy_'+carrito.articulos[carrito.articulos.length-1].id.toString()).val());
                            $('#carrito_elementos').text(carrito.articulos.length.toString());
                            localStorage.setItem('carrito',JSON.stringify(carrito));
                            localStorage.setItem('buynow','');
                            location.replace(app_root+'/carrito');
                        }
                    }
                }
            }
        });
    });
}


//funcion para obtener las variables get
function getGET()
{
    var $_GET = {};
    if(document.location.toString().indexOf('?') !== -1) {
        var query = document.location
                       .toString()
                       // get the query string
                       .replace(/^.*?\?/, '')
                       // and remove any existing hash string (thanks, @vrijdenker)
                       .replace(/#.*$/, '')
                       .split('&');

        for(var i=0, l=query.length; i<l; i++) {
           var aux = decodeURIComponent(query[i]).split('=');
           $_GET[aux[0]] = aux[1];
        }
    }
    //get the 'index' query parameter
    return $_GET;
}

function loadFilter(filter="")
{
    c = filter;
    trySearch();
}