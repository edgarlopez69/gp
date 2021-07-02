$(document).ready(function ()
{
    islogedBuy();
    comprar();
});

var factura = {};

document.getElementById("p-1").style.display = "block";
document.getElementById("p-2").style.display = "none";
document.getElementById("p-3").style.display = "none";

function comprar()
{
    $('#comprar-card').click(function()
    {
        var carrito = JSON.parse(localStorage.getItem('carrito'));
        if(carrito.articulos.length === 0){
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
        else
        {
            var usuario = document.getElementById('usr_id').value;
            var carrito = JSON.parse(localStorage.getItem('carrito'));
            var articulo = "";
            
            var parametros = 
            {
                "key" : api_key,
                "usuario" : usuario,
                "articulos" : carrito.articulos,
                "factura" : factura
            };
            $.ajax({
                data:  parametros, //datos que se envian a traves de ajax 
                url:   api_dev + 'home/compras_newOrder', //archivo que recibe la peticion
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
                    var stripe = Stripe('pk_test_51Hci5rHPPpKZkxpSeUdyrGQ50Y5r5dibKFqTFYsyaKc6wdlWG917wRL3f70vVN7ZVcXqaEazxsmQq2C8fWAZl4YW00v23ndOs2');
                    stripe.redirectToCheckout({ sessionId: response.id });         
                }
            });
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
                document.getElementById('data-disclaimer').innerHTML = "Puede modificar la información para este envio.";
                setFacturaInfo(response);                               
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
            if(!isConfirm.value){
                location.replace(app_root+'/login');
            }
            else
            {
                document.getElementById('usr_id').value = 1;
                document.getElementById('user_name').innerHTML = "Invitado";
                document.getElementById('data-disclaimer').innerHTML = "Inserte con cuidado la información de envio.";
            }
        });
    }
}

function setFacturaInfo(user_identification)
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
    var calle = document.getElementById('calle').value;
    var ne = document.getElementById('ne').value;
    var ni = document.getElementById('ni').value;
    var colonia = document.getElementById('colonia').value;
    var cp = document.getElementById('cp').value;
    var municipio = document.getElementById('municipio').value;
    var estado = document.getElementById('estado').value;
    var pais = document.getElementById('pais').value;

    if(nombre == "" || calle == "" || ne == "" || colonia == "" || cp == "" || municipio == "" || estado == "" || pais == "")
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
    else
    {
        factura = 
        {
            "nombre" : nombre,
            "calle" : calle,
            "ne" : ne,
            "ni" : ni,
            "colonia" : colonia,
            "cp" : cp,
            "municipio" : municipio,
            "estado" : estado,
            "pais" : pais
        };
        document.getElementById("p-1").style.display = "none";
        document.getElementById("p-2").style.display = "none";
        document.getElementById("p-3").style.display = "block";
    }   
}