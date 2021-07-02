$(document).ready(function () {
    
    $('#enviar').click(function () {
        $('#invalid_nombre').hide();
        $('#invalid_correo').hide();
        $('#invalid_telefono').hide();
        $('#invalid_comentarios').hide();
        var isvalid = validate();
        if(isvalid === 0){
            valid();
        }else{
            invalid(isvalid);
        }
    });

    function validate(){
        var result = 0;
        var re = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
        if(!($('#nombre').val())){
            result += 1;
        }
        if(!(re.test($('#correo').val()))){
            result += 10;
        }
        if($('#telefono').val().replace(/[^0-9]/g,'').length !== 10){
            result += 100;
        }
        if(!($('#comentarios').val())){
            result += 1000;
        }
        return result;
    }

    function valid(){
        $.ajax({
            type:"POST",
            url:api_dev+"home/sendmail",
            data:{
                key:api_key,
                nombre:$('#nombre').val(),
                correo:$('#correo').val(),
                telefono:$('#telefono').val(),
                comentarios:$('#comentarios').val()
            },
            dataType:"text",
            success:function(data){
                var data = data.slice(0, -265);
                if(data!=='Invalid key'){
                    if(data !== 'Email no enviado'){
                        Swal.fire({
                            icon: 'success',
                            title: 'Mensaje enviado',
                            text: 'Se envió su mensaje, pronto nuestro equipo lo leerá',
                            showCloseButton: true,
                            confirmButtonText: 'Ok',
                            onClose: () => {
                                location.replace(app_root+"/");
                            }
                        },function(isConfirm){
                            location.replace(app_root+"/");
                        });
                    }else{
                        Swal.fire({
                            icon: 'error',
                            title: 'Mensaje no enviado',
                            text: 'No se pudo enviar su mensaje, por favor inténtelo más tarde',
                            showCloseButton: true,
                            confirmButtonText: 'Ok'
                        });
                    }
                }
            }
        });
    }

    function invalid(isvalid){
        switch(isvalid){
            case 1:
                nombre();
            break;
            case 10:
                correo();
            break;
            case 11:
                nombre();
                correo();
            break;
            case 100:
                telefono();
            break;
            case 101:
                nombre();
                telefono();
            break;
            case 110:
                correo();
                telefono();
            break;
            case 111:
                nombre();
                correo();
                telefono();
            break;
            case 1000:
                comentarios();
            break;
            case 1001:
                nombre();
                comentarios();
            break;
            case 1010:
                correo();
                comentarios();
            break;
            case 1100:
                telefono();
                comentarios();
            break;
            case 1011:
                nombre();
                correo();
                comentarios();
            break;
            case 1101:
                nombre();
                telefono();
                comentarios();
            break;
            case 1110:
                correo();
                telefono();
                comentarios();
            break;
            case 1111:
                nombre();
                correo();
                telefono();
                comentarios();
            break;
        }
    }

    function nombre(){
        $('#invalid_nombre').show();
    }

    function correo(){
        $('#invalid_correo').show();
    }

    function telefono(){
        $('#invalid_telefono').show();
    }

    function comentarios(){
        $('#invalid_comentarios').show();
    }

});