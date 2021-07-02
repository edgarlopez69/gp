$(document).ready(function (){
    loadCarrito();
    continuarComprando();
    comprar();
    login();
    doSearch();
});

var factura = {};
var sending = {};

document.getElementById("p-1").style.display = "block";
document.getElementById("p-2").style.display = "none";
document.getElementById("p-3").style.display = "none";

document.getElementById('button-factura').style.display = "none";

function loadCarrito(){
    if(localStorage.getItem('carrito')!==null){
        var articulos = JSON.parse(localStorage.getItem('carrito')).articulos;
        if(articulos.length!==0){
            var html = '';
            var precio = {
                subtotal:0.00,
                descuento:0.00,
                total:0.00
            }
            localStorage.setItem('html',html);
            localStorage.setItem('precio',JSON.stringify(precio));
            articulos.forEach(function (item,index,array) {
                var html = localStorage.getItem('html');
                var precio = JSON.parse(localStorage.getItem('precio'));
                html += '<div class="objeto bg-white"><div class="o-left"><picture class="o-picture"><source srcset="assets/img/productos/'+item.imagen_1+'" type="img/png"><img src="'+app_root+'/assets/img/productos/'+item.imagen_1+'" alt="product_'+index.toString()+'" class="toproduct" id="'+item.id.toString()+'"></picture></div><div class="o-right"><h1 class="o-titulo">'+item.nombre+'</h1><div class="o-box"><div class="o-line"><div class="sub-line"><p class="o-sub-left">Precio:</p><p class="o-sub-right" id="precio">$'+item.precio.toFixed(2)+'</p></div><div class="sub-line"><p class="o-sub-left">Cantidad:</p><select class="form-control to-buy" id="'+index.toString()+'">';
                if(item.cantidad>5){
                    for (let number = 1; number <= 5; number++) {
                        if(item.articulos === number){
                            html += '<option value="'+number.toString()+'" selected>'+number.toString()+'</option>';
                        }else{
                            html += '<option value="'+number.toString()+'">'+number.toString()+'</option>';
                        }              
                    }
                }else{
                    for (let number = 1; number <= item.cantidad; number++) {
                        if(item.articulos === number){
                            html += '<option value="'+number.toString()+'" selected>'+number.toString()+'</option>';
                        }else{
                            html += '<option value="'+number.toString()+'">'+number.toString()+'</option>';
                        }             
                    }
                }
                html += '</select></div></div><div class="o-spec-line"><button class="object-delete btn btn-danger" id="'+index.toString()+'">Eliminar <i class="fa fa-trash" aria-hidden="true"></i></button></div></div></div></div>';
                localStorage.setItem('html',html);
                precio.subtotal += item.articulos * item.precio;
                localStorage.setItem('precio',JSON.stringify(precio));
            });
            html = localStorage.getItem('html');
            localStorage.removeItem('html');
            $('#contenedor').append(html);
            precio = JSON.parse(localStorage.getItem('precio'));
            precio.total = (precio.subtotal + 150);
            localStorage.setItem('precio',JSON.stringify(precio));
            $('#subtotal').text('$'+precio.subtotal.toFixed(2));
            $('#total').text('$'+precio.total.toFixed(2));
            cambioCantidad();
            deleteArticulos();
            openProducto();
        }else{
            localStorage.removeItem('carrito');
            Swal.fire({
                icon: 'error',
                title: 'El carrito esta vacio',
                text: 'Porfavor añada minimo un producto',
                showCloseButton: true,
                confirmButtonText: 'Ok',
                onClose: () => {
                    location.replace(app_root+"/productos");
                }
            }).then(function(isConfirm) {
                location.replace(app_root+"/productos");
            });
        }
    }else{
        Swal.fire({
            icon: 'error',
            title: 'El carrito esta vacio',
            text: 'Porfavor añada minimo un producto',
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

function continuarComprando(){
    $('#continuar').click(function(){
        location.replace(app_root+'/');
    });
}


function cambioCantidad(){
    $('.to-buy').on('change', function() {
        var id = parseInt($(this).attr('id'));
        var carrito = JSON.parse(localStorage.getItem('carrito'));
        var precio = {
            subtotal:0.00,
            descuento:0.00,
            total:0.00
        }
        carrito.articulos[id].articulos = parseInt($(this).val());
        localStorage.setItem('precio',JSON.stringify(precio));
        carrito.articulos.forEach(function (item,index,array) {
            var precio = JSON.parse(localStorage.getItem('precio'));
            precio.subtotal += item.articulos * item.precio;
            localStorage.setItem('precio',JSON.stringify(precio));
        });
        precio = JSON.parse(localStorage.getItem('precio'));
        precio.total = precio.subtotal;
        localStorage.setItem('precio',JSON.stringify(precio));
        $('#subtotal').text('$'+precio.subtotal.toFixed(2));
        $('#total').text('$'+precio.total.toFixed(2));
        localStorage.setItem('carrito',JSON.stringify(carrito));
    });
}

function deleteArticulos(){
    $('.object-delete').click(function(){
        $(this).closest('.objeto').remove();
        var id = parseInt($(this).attr('id'));
        var carrito = JSON.parse(localStorage.getItem('carrito'));
        var precio = {
            subtotal:0.00,
            descuento:0.00,
            total:0.00
        }
        carrito.articulos.splice(id,1);
        localStorage.setItem('precio',JSON.stringify(precio));
        carrito.articulos.forEach(function (item,index,array) {
            var precio = JSON.parse(localStorage.getItem('precio'));
            precio.subtotal += item.articulos * item.precio;
            localStorage.setItem('precio',JSON.stringify(precio));
        });
        precio = JSON.parse(localStorage.getItem('precio'));
        precio.total = precio.subtotal;
        localStorage.setItem('precio',JSON.stringify(precio));
        $('#subtotal').text('$'+precio.subtotal.toFixed(2));
        $('#total').text('$'+precio.total.toFixed(2));
        localStorage.setItem('carrito',JSON.stringify(carrito));
        if(carrito.articulos.length === 0){
            Swal.fire({
                icon: 'error',
                title: 'El carrito está vacío',
                text: 'Por favor añada mínimo un producto',
                showCloseButton: true,
                confirmButtonText: 'Ok',
                onClose: () => {
                    location.replace(app_root+"/productos");
                }
            }).then(function(isConfirm) {
                location.replace(app_root+"/productos");
            });
        }
    });
}

function openProducto(){
    $('.toproduct').click(function(){
        location.replace(app_root+'/producto/'+$(this).attr("id"));
    });
}

function comprar(){
    $('#comprar-card').click(function()
    {
        var carrito = JSON.parse(localStorage.getItem('carrito'));
        if(carrito.articulos.length === 0){
            Swal.fire({
                icon: 'error',
                title: 'El carrito está vacío',
                text: 'Por favor añada mínimo un producto',
                showCloseButton: true,
                confirmButtonText: 'Ok',
                onClose: () => {
                    location.replace(app_root+"/productos");
                }
            }).then(function(isConfirm) {
                location.replace(app_root+"/productos");
            });
        }
        else
        {
            var usuario = document.getElementById('usr_id').value;
            var email = document.getElementById('email').value;
            var carrito = JSON.parse(localStorage.getItem('carrito'));
            var articulo = "";
            
            var parametros = 
            {
                "key" : api_key,
                "usuario" : usuario,
                "email" : email,
                "articulos" : carrito.articulos,
                "factura" : factura,
                "sending" : sending
            };
            $.ajax({
                data:  parametros, //datos que se envian a traves de ajax 
                url:   api_dev + 'home/compras_newOrder', //archivo que recibe la peticion
                type:  'post', //método de envio
                beforeSend: function () {
                    Swal.fire({
                        title: 'Procesando información',
                        html: 'Un momento por favor, estamos procesando su compra',
                        onBeforeOpen: () => {
                            Swal.showLoading();
                        }
                    });
                },
                success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                    Swal.close();
                    if(response.estado == "exito")
                        {
                            var stripe = Stripe('pk_test_51IQ2HgBVvcBUZwkfEcAIZU9d1gCx4VsYpKlRxTaQ4ePJH3zSPBcEONYYzZFdt3h1PgMUt8E8xy8d5hVc124UwZLV00okTqUOFR');
                            stripe.redirectToCheckout({ sessionId: response.id }); 
                        }
                        else if(response.estado == "fallo")
                        {
                            var carrito = JSON.parse(localStorage.getItem('carrito'));
                            //
                            var errorItems = response.errorItems;
                            for(var i = 0; i < errorItems.length; i++)
                            {
                                var order = errorItems[i].order;
                                var articulosNumber = parseInt(carrito.articulos[order].articulos);
                                var articulosNumberFinal = articulosNumber + parseInt(errorItems[i].diference);
                                if (articulosNumberFinal > 0) 
                                {
                                    carrito.articulos[order].articulos = articulosNumberFinal;
                                }
                                else
                                {
                                    carrito.articulos.splice(order,1);
                                }
                                
                            }
                            localStorage.setItem('carrito',JSON.stringify(carrito));
                            Swal.fire({
                                icon: 'error',
                                title: 'Error de inventario',
                                text: 'Algunos de sus articulos estan limitados.',
                                showCloseButton: true,
                                confirmButtonText: 'Ok',
                                onClose: () => {
                                    location.replace(app_root+"/carrito");
                                }
                                }, function (isConfirm) {
                                    location.replace(app_root+"/carrito");
                                });
                        }         
                    
                }
            });
        } 
    });
    $('#comprar-oxxo').click(function()
    {
        var carrito = JSON.parse(localStorage.getItem('carrito'));
        if(carrito.articulos.length === 0)
        {
            Swal.fire({
                icon: 'error',
                title: 'El carrito está vacío',
                text: 'Por favor añada mínimo un producto',
                showCloseButton: true,
                confirmButtonText: 'Ok',
                onClose: () => {
                    location.replace(app_root+"/productos");
                }
            }).then(function(isConfirm) {
                location.replace(app_root+"/productos");
            });
        }
        else
        {
            var email = document.getElementById('email').value;
            var name = document.getElementById('nombre').value;

            var usuario = document.getElementById('usr_id').value;
            var carrito = JSON.parse(localStorage.getItem('carrito'));
            var articulo = "";
            if (email != "" && name != "") 
            {
                
                var parametros = 
                {
                    "key" : api_key,
                    "usuario" : usuario,
                    "articulos" : carrito.articulos,
                    "email" : email,
                    "factura" : factura,
                    "sending" : sending
                };
                $.ajax({
                    data:  parametros, //datos que se envian a traves de ajax 
                    url:   api_dev + 'home/compras_oxxo', //archivo que recibe la peticion
                    type:  'post', //método de envio
                    beforeSend: function () {
                        Swal.fire({
                            title: 'Procesando información',
                            html: 'Un momento porfavor, estamos procesando su compra',
                            onBeforeOpen: () => {
                                Swal.showLoading();
                            }
                        });
                    },
                    success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                        Swal.close();
                        //console.log(response);
                        
                        if(response.estado == "exito")
                        {
                            document.getElementById("p-3").style.display = "none";
                            document.getElementById("p-4").style.display = "";
                            var stripe = 
                            Stripe('pk_test_51IQ2HgBVvcBUZwkfEcAIZU9d1gCx4VsYpKlRxTaQ4ePJH3zSPBcEONYYzZFdt3h1PgMUt8E8xy8d5hVc124UwZLV00okTqUOFR');
                            stripe.confirmOxxoPayment(
                              response.clientSecret,
                              {
                                payment_method: {
                                  billing_details: {
                                    name: name,
                                    email: email,
                                  },
                                },
                              }
                            ).then(function(result) {
                              // Handle result.error or result.paymentIntent
                              //console.log(result); 
                            });
                        }
                        else if(response.estado == "fallo")
                        {
                            var carrito = JSON.parse(localStorage.getItem('carrito'));
                            //
                            var errorItems = response.errorItems;
                            for(var i = 0; i < errorItems.length; i++)
                            {
                                var order = errorItems[i].order;
                                var articulosNumber = parseInt(carrito.articulos[order].articulos);
                                var articulosNumberFinal = articulosNumber + parseInt(errorItems[i].diference);
                                if (articulosNumberFinal > 0) 
                                {
                                    carrito.articulos[order].articulos = articulosNumberFinal;
                                }
                                else
                                {
                                    carrito.articulos.splice(order,1);
                                }
                                
                            }
                            localStorage.setItem('carrito',JSON.stringify(carrito));

                            Swal.fire({
                                icon: 'error',
                                title: 'Error de inventario',
                                text: 'Algunos de sus articulos estan limitados.',
                                showCloseButton: true,
                                confirmButtonText: 'Ok',
                                onClose: () => {
                                    location.replace(app_root+"/carrito");
                                }
                                }, function (isConfirm) {
                                    location.replace(app_root+"/carrito");
                                });
                        }   
                    }   
                });
            }
            else
            {
                Swal.fire({
                title: 'Error!',
                text: "Campos vacíos",
                icon: 'error',
                confirmButtonText: 'Ok',
                onClose: () => {

                    }
                });
            }
        }        
    });
}


function islogedBuy()
{
    var cookie = getCookie("GlassProtechUserData");
    if(cookie != "")
    {
        var parametros = 
        {
            "jwt": cookie
        };
        $.ajax({
            data: parametros, //datos que se envian a traves de ajax 
            url: api_dev + 'home/decodeUserData', //archivo que recibe la peticion
            type: 'post', //método de envio
            beforeSend: function () 
            {
                Swal.fire({
                    title: 'Espere un momento...',
                    html: 'Cargando información de factura',
                    onBeforeOpen: () => {
                        Swal.showLoading();
                    }
                });                            
            },
            success: function (response) 
            {
                Swal.close();
                var id = JSON.stringify(response);
                id = JSON.parse(id);
                document.getElementById('usr_id').value = response["id"];
                document.getElementById('data-disclaimer').innerHTML = "Puede modificar la información para este envío.";
                setFacturingInfo(response);
                setEmail(response);
                setSendingInfo(response);                               
            }                    
        });
    }
    else
    {
        Swal.fire({
                icon: 'error',
                title: 'No ha iniciado sesión',
                text: '¿Desea comprar como invitado?',
                confirmButtonColor: '#C3C3C3',
                cancelButtonColor: '#00E154',
                showCloseButton: true,
                showCancelButton: true,
                confirmButtonText: 'Si',
                cancelButtonText: 'Iniciar sesión'
            }).then(function(isConfirm) {
            if(isConfirm.value){
                document.getElementById('usr_id').value = 1;
                document.getElementById('user_name').innerHTML = "Invitado";
                document.getElementById('data-disclaimer').innerHTML = "Inserte con cuidado la información de envio.";
                
            }
            else
            {
                $('#login-popup').modal('show')
                //location.replace(app_root+'/login');
            }
        });
    }
}

function setSendingInfo(user_identification)
{
    var parametros = 
    {
        "id" : user_identification["id"],
    };
    $.ajax({
            data:  parametros, //datos que se envian a traves de ajax 
            url:   api_dev + 'home/informacion_obtener', //archivo que recibe la peticion
            type:  'post', //método de envio
            beforeSend: function () {

            },
            success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                    

                   document.getElementById('nombre').value = response[0];
                   document.getElementById('user_name').innerHTML = response[0];
                   document.getElementById('calle').value = response[1];
                   document.getElementById('ne').value = response[2];
                   document.getElementById('ni').value = response[3];
                   document.getElementById('colonia').value = response[4];
                   document.getElementById('cp').value = response[5];
                   document.getElementById('municipio').value = response[6];
                   document.getElementById('estado').value = response[7];
                   document.getElementById('pais').value = response[8];
                   document.getElementById('telefono').value = response[9];
            }
    });
}

function setEmail(user_identification)
{
    var parametros = 
    {
        "usuario" :  user_identification["id"],
    };
    $.ajax({
            data:  parametros, //datos que se envian a traves de ajax 
            url:   api_dev + 'home/usuarios_getEmail', //archivo que recibe la peticion
            type:  'post', //método de envio
            beforeSend: function () {

            },
            success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                    
                   document.getElementById('email').value = response["email"];
            }
    });
}

function setFacturingInfo(user_identification)
{
  var parametros = 
  {
        "id" : user_identification["id"],
  };
  $.ajax({
            data:  parametros, //datos que se envian a traves de ajax 
            url:   api_dev + 'home/factura_obtener', //archivo que recibe la peticion
            type:  'post', //método de envio
            beforeSend: function () {

            },
            success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                  
                  var obj = JSON.parse(response["factura_información"]);
                  
                  document.getElementById('nombre-fact').value = response["factura_nombre"];
                  document.getElementById('rfc-fact').value = response["factura_rfc"];
                  document.getElementById('rs-fact').value = response["factura_razon_social"];
                    if (obj["email"] != undefined) 
                    {
                        document.getElementById('email-fact').value = obj["email"];
                       document.getElementById('calle-fact').value = obj["calle"];
                       document.getElementById('ne-fact').value = obj["ne"];
                       document.getElementById('ni-fact').value = obj["ni"];
                       document.getElementById('colonia-fact').value = obj["colonia"];
                       document.getElementById('cp-fact').value = obj["cp"];
                       document.getElementById('municipio-fact').value = obj["municipio"];
                       document.getElementById('estado-fact').value = obj["estado"];
                       document.getElementById('pais-fact').value = obj["pais"];
                    }
                    
            }
    });
}

function pageOne()
{
    document.getElementById("p-1").style.display = "block";
    document.getElementById("p-2").style.display = "none";
    document.getElementById("p-3").style.display = "none";
}

function pageTwo()
{
    document.getElementById("p-1").style.display = "none";
    document.getElementById("p-2").style.display = "block";
    document.getElementById("p-3").style.display = "none";
}

function pageThree()
{
    var nombre = document.getElementById('nombre').value;
    var telefono = document.getElementById('telefono').value;
    var email = document.getElementById('email').value;
    var calle = document.getElementById('calle').value;
    var ne = document.getElementById('ne').value;
    var ni = document.getElementById('ni').value;
    var colonia = document.getElementById('colonia').value;
    var cp = document.getElementById('cp').value;
    var municipio = document.getElementById('municipio').value;
    var estado = document.getElementById('estado').value;
    var pais = document.getElementById('pais').value;

    var factura_status = false;
    var nombre_fact = document.getElementById('nombre-fact').value;
    var email_fact = document.getElementById('email-fact').value;
    var rfc_fact = document.getElementById('rfc-fact').value;
    var rs_fact = document.getElementById('rs-fact').value;
    var calle_fact = document.getElementById('calle-fact').value;
    var ne_fact = document.getElementById('ne-fact').value;
    var ni_fact = document.getElementById('ni-fact').value;
    var colonia_fact = document.getElementById('colonia-fact').value;
    var cp_fact = document.getElementById('cp-fact').value;
    var municipio_fact = document.getElementById('municipio-fact').value;
    var estado_fact = document.getElementById('estado-fact').value;
    var pais_fact = document.getElementById('pais-fact').value;
    var checkBox = document.getElementById('facturaCheck');

    if (checkBox.checked == true) 
    {
        if(nombre_fact == "" || calle_fact == "" || ne_fact == "" || colonia_fact == "" || cp_fact == "" || municipio_fact == "" || estado_fact == "" || pais_fact == "" )
        {

        }
        else
        {
            factura_status = true;
        }

    }
    else
    {
        factura_status = true;
    }

    if(nombre == "" || telefono == "" || calle == "" || ne == "" || colonia == "" || cp == "" || municipio == "" || estado == "" || pais == "" || factura_status == false|| email == "")
    {
        Swal.fire({
            title: 'Error!',
            text: "Campos vacios",
            icon: 'error',
            confirmButtonText: 'Ok',
            onClose: () => {

                }
            });
    }
    else if(testName(nombre))
    {
        Swal.fire({
            title: 'Error!',
            text: "El nombre tiene que ser al menos dos palabras de al menos cuatro letras.",
            icon: 'error',
            confirmButtonText: 'Ok',
            onClose: () => {

                }
            });
    }
    else
    {
        sending = 
        {
            "nombre" : nombre,
            "telefono" : telefono,
            "email" : email,
            "calle" : calle,
            "ne" : ne,
            "ni" : ni,
            "colonia" : colonia,
            "cp" : cp,
            "municipio" : municipio,
            "estado" : estado,
            "pais" : pais
        };
        if (checkBox.checked == false) 
        {
            factura = 
            {
                "nombre" : "",
                "email" : "",
                "rfc" : "",
                "rs" : "",
                "calle" : "",
                "ne" : "",
                "ni" : "",
                "colonia" : "",
                "cp" : "",
                "municipio" : "",
                "estado" : "",
                "pais" : ""
            };
        }
        else
        {
            factura = 
            {
                "nombre" : nombre_fact,
                "email" : email_fact,
                "rfc" : rfc_fact,
                "rs" : rs_fact,
                "calle" : calle_fact,
                "ne" : ne_fact,
                "ni" : ni_fact,
                "colonia" : colonia_fact,
                "cp" : cp_fact,
                "municipio" : municipio_fact,
                "estado" : estado_fact,
                "pais" : pais_fact
            };
        }
        
        document.getElementById("p-1").style.display = "none";
        document.getElementById("p-2").style.display = "none";
        document.getElementById("p-3").style.display = "block";
        document.getElementById("p-4").style.display = "none";
    }   
}

function chekboxFactura()
{
    var checkBox = document.getElementById('facturaCheck');
    var buttonfact = document.getElementById('button-factura');
    if (checkBox.checked == true)
    {
        buttonfact.style.display = "block";
    } else {
        buttonfact.style.display = "none";
    }
}

function modalHideMain()
{
    $('#pay-type').modal("hide");
}

function modalRestart()
{
    $('#pay-type').modal("show");
    $('#pay-factura').modal("hide");
    $('#login-popup').modal("hide");
}

function login() {
        $('#login').click(function () {
                var mail = $('#correo').val();
                var contra = $('#contraseña').val();
                if (validate(mail, contra) === 0) {
                        $('#invalid_correo').hide();
                        $('#invalid_contra').hide();
                        var parametros = {
                                "key": api_key,
                                "mail": mail,
                                "contra": contra
                        };
                        $.ajax({
                                data: parametros, //datos que se envian a traves de ajax 
                                url: api_dev + 'home/usr_login', //archivo que recibe la peticion
                                type: 'post', //método de envio
                                beforeSend: function () {
                                        Swal.fire({
                                                title: 'Procesando información',
                                                html: 'Un momento porfavor, estamos procesando su información',
                                                onBeforeOpen: () => {
                                                        Swal.showLoading();
                                                }
                                        });
                                },
                                success: function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                                        var backup = response;
                                        var response = response.slice(0, -265);
                                        if(response!=='Invalid key'){
                                                response = backup;
                                                if (response[0] === "Login exitoso") {
                                                        Swal.close();

                                                        var today = new Date();
                                                        var date = today.getFullYear() + '-' + (today.getMonth() + 1) + '-' + today.getDate();
                                                        var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
                                                        var dateTime = date + ' ' + time;
                                                        document.cookie = "GlassProtechUserData=" + response[1] + ";expires=" + dateTime + "; path=/";
                                                        Swal.fire({
                                                                icon: 'success',
                                                                title: 'Login exitoso',
                                                                text: 'Bienvenido, puede continuar navegando en la app',
                                                                showCloseButton: true,
                                                                confirmButtonText: 'Ok',
                                                                onClose: () => {
                                                                        location.replace(app_root+"/carrito");
                                                                }
                                                        }, function (isConfirm) {
                                                                location.replace(app_root+"/carrito");
                                                        });
                                                } else {
                                                        Swal.close();
                                                        Swal.fire({
                                                                icon: 'error',
                                                                title: 'Login fallido',
                                                                text: 'No se pudo inicar sesión porfavor confirme sus datos',
                                                                showCloseButton: true,
                                                                confirmButtonText: 'Ok'
                                                        });
                                                }
                                        }
                                }
                        });
                } else if (validate(mail, contra) === 1) {
                        $('#invalid_correo').show();
                } else if (validate(mail, contra) === 10) {
                        $('#invalid_contra').show();
                } else if (validate(mail, contra) === 11) {
                        $('#invalid_correo').show();
                        $('#invalid_contra').show();
                }
        });
}

function validate(mail, contra) {
        var re = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
        var result = 0;
        if (!(re.test(mail))) {
                result += 1;
        }
        if (!(contra)) {
                result += 10;
        }
        return result;
}


function testName(nombre)
{
    var nameinvalid = true;
    var processName = nombre.split(" ");
    if (processName.length > 1) 
    {
        nameinvalid = false;
        for (var i = 0; i < processName.length; i++) 
        {
            if (processName[i].length < 4) 
            {
                nameinvalid = true;
            }
        }
    }
    return nameinvalid;
}

// Función para buscar
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