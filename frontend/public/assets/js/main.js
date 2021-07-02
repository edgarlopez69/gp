var api_key = 'testKey';
//var api_deploy = 'https://api.glassprotech.com.mx/';
var api_dev = "https://api.glassprotech.com.mx/";
$(document).ready(function (){
    if(localStorage.getItem('carrito')!==null){
        var carrito = JSON.parse(localStorage.getItem('carrito'));
        $('#carrito_elementos').text(carrito.articulos.length.toString());
    }
    checksession();
});

function checksession(){
    var cookie = getCookie("GlassProtechUserData");
    if(cookie !== ''){
        $.ajax({
            type:"POST",
            url:api_dev+"home/getuserdata",
            data:{
                key:api_key,
                cookie:cookie
            },
            dataType:"text",
            success:function(data){
                var data = data.slice(0, -265);
                if(data!=='Invalid key'){
                    data = JSON.parse(data);
                    $('#sesion_text').text(data.name);
                    if(data.image !== 'default.png'){
                        $('#sesion_image').html('<source srcset="'+data.img+'" type="img/'+data.img.substring(data.img.length-3)+'"><img src="'+data.img+'" alt="imagen de perfil">');
                    }
                    $('#sesion_link').attr("href", app_root+'/perfil');
                }
            }
        });
    }
}

function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for (var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') {
                    c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                    return c.substring(name.length, c.length);
            }
    }
    return "";
}