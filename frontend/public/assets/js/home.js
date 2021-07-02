$(document).ready(function () {
    const getDeviceType = () => {
      const ua = navigator.userAgent;
      if (/(tablet|ipad|playbook|silk)|(android(?!.*mobi))/i.test(ua)) {
        return "tablet";
      }
      if (
        /Mobile|iP(hone|od|ad)|Android|BlackBerry|IEMobile|Kindle|Silk-Accelerated|(hpw|web)OS|Opera M(obi|ini)/.test(
          ua
        )
      ) {
        return "mobile";
      }
      return "desktop";
    };
    // Función para obtener y asignar en estilo la imagen popup actual
    //getPopup();

    // Obtiene los productos del slider
    getProducts();

    // Funcion de buscador
    //doSearch();

    // Functión que obtiene el popup
    function getPopup(){
        $.ajax({
            type:"POST",
            url:api_dev+"home/getpopup",
            data:{
                key:api_key
            },
            dataType:"text",
            success:function(data){
                var data = data.slice(0, -265);
                if(data!=='Invalid key'){
                    // Cambiar en css el popup
                    $('#BodyPopup').css('background-image','url(assets/img/popup/'+data+')');
                    // Revisa si la cookie de popup sigue siendo valida, si no lo muestra
                    checkPopup();
                }
            }
        });
    }

    // Función para revisar la cookie y coloar el popup si hace falta
    function checkPopup() {
        var popup = getCookie("popup");
        if (popup === "") {
            $('#ModalPopup').modal('toggle');
            setCookie("popup", "true", 1);
        }
    }

    // Función para obtener el valor de una cookie
    function getCookie(cname) {
        var name = cname + "=";
        var ca = document.cookie.split(';');
        for (var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) === ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) === 0) {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    }

    // Función para colocar una cookie
    function setCookie(cname, cvalue, exdays) {
        var d = new Date();
        d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
        var expires = "expires=" + d.toUTCString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }

    // Función para obtener los productos
    function getProducts(){
        $.ajax({
            type:"POST",
            url:api_dev+"home/getprod",
            data:{
                key:api_key
            },
            dataType:"text",
            success:function(data){
                var data = data.slice(0, -265);
                if(data!=='Invalid key'){
                    var json = JSON.parse(data).articulos;
                    var articulos = '';
                    localStorage.setItem('articulos',articulos);
                    json.forEach(function (item,index,array){
                        var string = localStorage.getItem('articulos');
                        if(index===0){
                            string += '<div class="carousel-item active"><div class="row pb-5">';
                        }else if(((index+4)%4)===0&&getDeviceType()=="desktop"){
                            string += '</div></div><div class="carousel-item"><div class="row pb-5">';
                        }
                        else if(((index+2)%2)===0&&getDeviceType()=="mobile"){
                            string += '</div></div><div class="carousel-item"><div class="row pb-5">';
                        }
                        if(item.articulo_descripción.length>25){
                            item.articulo_descripción = item.articulo_descripción.substr(0,21)+'...';
                        }
                        string += '<div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12 mb-4 d-flex justify-content-center"><div class="card shadow" style="width: 100%;"><img src="'+app_root+'/assets/img/productos/'+item.articulo_imagen_1+'" class="card-img-top toproduct" alt="product_'+index.toString()+'" id="'+item.articulo_identificador.toString()+'"><div class="card-body"><h5 class="card-title">'+item.articulo_descripción+'</h5><div class="row"><div class="col-sm-8 col-12"><p class="card-text">Existencia:';

                        if(item.articulo_cantidad>5){
                            string += '+5';
                        }else{
                            string += item.articulo_cantidad.toString();
                        }
                        var precio_item = parseFloat(item.articulo_precio);
                        precio_item = precio_item.toFixed(2);

                        string += '</p></div><div class="col-sm-4 col-12"><p class="card-text">$'+precio_item +'</p></div></div><button class="product_addtocart btn btn-primary mt-5" id="'+item.articulo_identificador.toString()+'">Agregar <i class="fas fa-shopping-cart"></i></button></div></div></div>';
                        if(index === array.length - 1){
                            string += '</div>';
                        }
                        localStorage.setItem('articulos',string);
                    });
                    articulos = localStorage.getItem('articulos');
                    localStorage.removeItem('articulos');
                    $('#carouselAllPages').append(articulos);
                    startProducts();
                }
            }
        });
    }

    // Función para carga de productos
    function startProducts(){
        mySwiper  = new Swiper('#ProductSlider', {
            // Optional parameters
            speed: 2000,
            direction: 'horizontal',
            loop: false,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.swiper-pagination',
                type: 'bullets',
                clickable: true,
                renderBullet: function (index, className) {
                    return '<span class="' + className + ' pink-bullet"></span>';
                }
            },

        });
        // Funcion para abrir un producto
        openProd();
        // Funcion añadir al carrito
        toCart();
    }

    // Función para buscar
    function doSearch(){
        $('#HomeBuscar').keypress(function (event) {
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
                                carrito.articulos[carrito.articulos.length-1].articulos = 1;
                                $('#carrito_elementos').text(carrito.articulos.length.toString());
                                localStorage.setItem('carrito',JSON.stringify(carrito));
                            }else{
                                carrito = {
                                    articulos:[articulo]
                                }
                                carrito.articulos[carrito.articulos.length-1].articulos = 1;
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

});
$(document).ready(function () 
{
    
    getSliderContent();
});



function startSlider()
{
    mySwiper  = new Swiper('#HomeSlider', 
    {
        // Optional parameters
        speed: 2000,
        direction: 'horizontal',
        loop: false,
        // autoplay: {
        //     delay: 3000,
        //     disableOnInteraction: false,
        // },
    });
}

function getSliderContent()
{
    var response =  getTemporalItems();
    var sliderContent = "";
    var itemCounter = 0;

    sliderContent += '<div class="swiper-slide"><div class="row" style="width:100%;">';
    for (var i = 0; i < response.length; i++) 
    {
        sliderContent += '<div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12 productos-item-col">';
        sliderContent += '<div class="productos-item-container">';
        sliderContent += '<img src="'+app_root+'/assets/img/products/'+response[i]["img"]+'.png" class="productos-item-img">';
        sliderContent += '<b class="productos-item-name">'+response[i]["nombre"]+'</b>';
        sliderContent += '<p class="productos-item-content">Existencia   '+response[i]["existencia"]+'</p>';
        sliderContent += '<p class="productos-item-content">Precio   $'+response[i]["precio"].toFixed(2);+'</p>';
        sliderContent += '<img src="'+app_root+'/assets/img/components/agregar_a_carrito.png" class="productos-item-carrito-img">';
        sliderContent += "</div>";
        sliderContent += "</div>";

        itemCounter++;
        if(itemCounter == 4)
        {
            itemCounter = 0;
            sliderContent += "</div></div>";
            sliderContent += '<div class="swiper-slide"><div class="row" style="width:100%;">';
        }
    }
    sliderContent += "</div></div>";
    $("#HomeSliderWrapper").html(sliderContent);
    startSlider();
}

function getTemporalItems()
{
    var items = [];
    var item = [];

    for(var i = 0; i <10; i++)
    {
        item["nombre"] = "Martillo de cristal";
        item["existencia"] = 5;
        item["precio"] = 500;
        item["img"] = "Martillo Cristal";
        items[i] = item;
    }

    return items;
}