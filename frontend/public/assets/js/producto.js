$(document).ready(function () {
    getArticulo();
    doSearch();
});

function getArticulo(){
    var id = window.location.pathname.split('/').pop();
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
                    var articulo = articulos[0];
                    $('#titulo_principal').text(articulo.nombre);
                    var append = '<div class="pd-picture"><div class="swiper-container" id="ProductSlider"><div class="swiper-wrapper" id="ProductSwipper"><div class="swiper-slide"><picture class="pdp-picture"><source srcset="'+app_root+'/assets/img/productos/'+articulo.imagen_1+'" type="img/png"><img src="'+app_root+'/assets/img/productos/'+articulo.imagen_1+'" alt="logotipo"></picture></div><div class="swiper-slide"><picture class="pdp-picture"><source srcset="'+app_root+'/assets/img/productos/'+articulo.imagen_2+'" type="img/png"><img src="'+app_root+'/assets/img/productos/'+articulo.imagen_2+'" alt="logotipo"></picture></div><div class="swiper-slide"><picture class="pdp-picture"><source srcset="'+app_root+'/assets/img/productos/'+articulo.imagen_3+'" type="img/png"><img src="'+app_root+'/assets/img/productos/'+articulo.imagen_3+'" alt="logotipo"></picture></div></div></div></div><div class="pd-content"><p class="pdc-titulo">'+articulo.nombre+'</p><div class="line-1"><p class="existencia">Existencia:</p><p class="n-existencia">';
                    if(articulo.cantidad>5){
                        append += '+5';
                    }else{
                        append += articulo.cantidad.toString();
                    }                    
                    append += '</p></div><div class="line-2"><p class="precio">Precio:</p><p class="n-precio">$'+articulo.precio.toFixed(2)+'</p></div><div class="line-3"><p class="cantidad">Cantidad:</p><select class="form-control" id="tobuy">';
                    if(articulo.cantidad>5){
                        append += '<option value="1" selected>1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option>';
                    }else{
                        for (let index = 1; index <= articulo.cantidad; index++) {
                            if (index == 1) 
                            {
                                append += '<option value="'+index.toString()+'" selected>'+index.toString()+'</option>';
                            }
                            else
                            {
                                append += '<option value="'+index.toString()+'">'+index.toString()+'</option>';
                            }
                                            
                        }
                    }
                    append += '</select></div><div class="line-4"><p class="descripcion">Descripción:<br>'+articulo.descripcion+'</p></div><div class="line-5"><div class="subline-1"></div><div class="subline-2"><button class="product_addtocart btn btn-success" id="'+articulo.id.toString()+'">Agregar a <picture class="cart_img"><source srcset="'+app_root+'/assets/img/global/carrito.webp" type="img/webp"><source srcset="'+app_root+'/assets/img/global/carrito.png" type="img/png"><img src="'+app_root+'/assets/img/global/carrito.png" alt="carrito"></picture></button><button class="product_buynow btn btn-success" id="'+articulo.id.toString()+'">Comprar<br>Ahora</button></div></div></div>';
                    $('.box-pd').append(append);
                    productSwiper();
                }else{
                    Swal.fire({
                        icon: 'error',
                        title: 'No se encontraron el producto',
                        text: 'El producto no existe, porfavor continue navegando por nuestra tienda',
                        showCloseButton: true,
                        confirmButtonText: 'Ok',
                        onClose: () => {
                            location.replace(app_root+"/productos");
                        }
                    }).then(function(isConfirm) {
                        location.replace(app_root+"/productos");
                    });
                }
            }
        }
    });
}

function doSearch(){
    $('#buscar').keypress(function (event) {
        if (event.which == '13') {
            event.preventDefault();
            var params = {
                look:$(this).val(),
                price:''
            }
            localStorage.setItem('filterParams',JSON.stringify(params));
            location.replace(app_root+"/productos");
        }
    });
}

function productSwiper(){
    mySwiper  = new Swiper('#ProductSlider', {
        // Optional parameters
        speed: 2000,
        direction: 'horizontal',
        loop: true,
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },
    });
    // Funcion añadir al carrito
    toCart();
    // Funcion añadir al carrito
    buyNow();
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
                            carrito.articulos[carrito.articulos.length-1].articulos = parseInt($('#tobuy').val());
                            $('#carrito_elementos').text(carrito.articulos.length.toString());
                            localStorage.setItem('carrito',JSON.stringify(carrito));
                        }else{
                            carrito = {
                                articulos:[articulo]
                            }
                            carrito.articulos[carrito.articulos.length-1].articulos = parseInt($('#tobuy').val());
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
                            carrito.articulos[carrito.articulos.length-1].articulos = parseInt($('#tobuy').val());
                            $('#carrito_elementos').text(carrito.articulos.length.toString());
                            localStorage.setItem('carrito',JSON.stringify(carrito));
                            localStorage.setItem('buynow','');
                            location.replace(app_root+'/carrito');
                        }else{
                            carrito = {
                                articulos:[articulo]
                            }
                            carrito.articulos[carrito.articulos.length-1].articulos = parseInt($('#tobuy').val());
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