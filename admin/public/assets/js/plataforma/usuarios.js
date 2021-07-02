$(document).ready(function () {
   

  getUserList();
});

var prodList = [];

function getUserList()
{
    var cookie = getCookie("glassprotechUserData");
    var parametros = {
        "cookie" : cookie
    };
    $.ajax({
            data:  parametros, //datos que se envian a traves de ajax 
            url:   api_dev + 'home/admin_getUserData', //archivo que recibe la peticion
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

                  prodList = inventory;

                  var tableArticles = "";
                  var tableArticles_admin = "";
                  
                  for(var i = 0; i < inventory.length; i++)
                  {
                   
                    //console.log(inventory);
                    var estado = inventory[i].usuario_estatus;
                    if (estado == "1") {estado = "Activo";}
                    if (inventory[i].usuario_tipo == "1") 
                    {
                        tableArticles += "<tr>";

                        tableArticles += "<td>"+inventory[i].usuario_correo+"</td>";
                        tableArticles += "<td>"+inventory[i].usuario_plataforma+"</td>";
                        tableArticles += "<td><a href='#' data-toggle='modal' data-target='#passModal'onclick='openPassword("+inventory[i].usuario_identificador+")'>Cambiar</a></td>";
                        tableArticles += "<td>"+estado+"</td>";
                        tableArticles += "<td><a href='#' data-toggle='modal' data-target='#sendingModal' onclick='setSendingInfo("+inventory[i].usuario_identificador+")'>Consultar</a></td>";
                        tableArticles += "<td><a href='#' data-toggle='modal' data-target='#facturingModal' onclick='setFacturingInfo("+inventory[i].usuario_identificador+")'>Consultar</a></td>";
                        tableArticles += "<td><a href='#' data-toggle='modal' data-target='#editingModal' onclick='setEditing("+inventory[i].usuario_identificador+","+i+")'>Editar</a></td>";
                        tableArticles += "<td><a href='#' onclick='deleteUser("+inventory[i].usuario_identificador+")'>Eliminar</a></td>";
                        
                        tableArticles += "</tr>";
                    }
                    else
                    {
                        tableArticles_admin += "<tr>";

                        tableArticles_admin += "<td>"+inventory[i].usuario_correo+"</td>";
                        tableArticles_admin += "<td>"+inventory[i].usuario_plataforma+"</td>";
                        tableArticles_admin += "<td><a href='#' data-toggle='modal' data-target='#passModal' onclick='openPassword("+inventory[i].usuario_identificador+")'>Cambiar</a></td>";
                        tableArticles_admin += "<td>"+estado+"</td>";
                        tableArticles_admin += "<td><a href='#' data-toggle='modal' data-target='#sendingModal' onclick='setSendingInfo("+inventory[i].usuario_identificador+")'>Consultar</a></td>";
                        tableArticles_admin += "<td><a href='#' data-toggle='modal' data-target='#facturingModal' onclick='setFacturingInfo("+inventory[i].usuario_identificador+")'>Consultar</a></td>";
                        tableArticles_admin += "<td><a href='#' data-toggle='modal' data-target='#editingModal' onclick='setEditing("+inventory[i].usuario_identificador+","+i+")'>Editar</a></td>";
                        tableArticles_admin += "<td><a href='#' onclick='deleteUser("+inventory[i].usuario_identificador+")'>Eliminar</a></td>";
                        
                        tableArticles_admin += "</tr>";
                    }
                    
                    
                  }
                  $("#table-body").html(tableArticles);
                  $("#table-body-admin").html(tableArticles_admin);

                  $('#table-filt').DataTable({
                    "language": {
                        "sProcessing": "Procesando...",
                        "sSearch": "Buscar",
                        "sLengthMenu": "Seleccionar _MENU_ elementos",
                        "sInfo": "Mostrando _START_ a _END_ de _TOTAL_ elementos totales",
                        "sInfoEmpty": "No se ha encontrado entradas",
                        "sInfoFiltered": "(filtrado de _MAX_ elementos totales)",
                        "sInfoPostFix": "",
                        "sLoadingRecords": "Cargando registro...",
                        "sZeroRecords": "No se han encontrado registros",
                        "sEmptyTable": "La tabla está vacia",
                        "oPaginate": {
                            "sFirst": "Primero",
                            "sPrevious": "Anterior",
                            "sNext": "Siguiente",
                            "sLast": "Ultimo"
                        },
                        "oAria": {
                            "sSortAscending": ": Filtrar en orden ascendente",
                            "sSortDescending": ": Filtrar en orden descendente"
                        },
                        "select": {
                            "rows": {
                                "_": "%d lineas seleccionadas",
                                "0": "Ninguna linea seleccionada",
                                "1": "1 linea seleccionada"
                            }
                        }
                    },
                    "pagingType": "full_numbers" // "simple" option for 'Previous' and 'Next' buttons only
                  });
                  $('.dataTables_length').addClass('bs-select');
                  
                }
                

            }
    });
}

function createUser()
{
    var mail = document.getElementById("mail").value;
    var contra = document.getElementById("contra").value;
    var contra_repeat = document.getElementById("contra_repeat").value;
    var nombre = document.getElementById("nombre").value;
    var tipo = document.getElementById("select-level-create").value;
    if (mail == ""||contra == ""||contra_repeat==""||nombre==""||tipo=="") 
    {
        Swal.fire({
            icon: 'error',
            title: 'Campos vacios',
            text: 'Por favor asegurese de que todos los campos esten completos',
            showCloseButton: true,
            confirmButtonText: 'Ok'
        });
    }
    else if(contra_repeat != contra)
    {
        Swal.fire({
            icon: 'error',
            title: 'Las contraseñas no coinciden',
            text: 'Por favor escriba la misma contraseña en ambos campos.',
            showCloseButton: true,
            confirmButtonText: 'Ok'
        });
    }
    else
    {
        Swal.fire({
            icon: 'warning',
            title: 'Confirmación',
            text: '¿Estas seguro de que quieres crear este usuario?',
            showCloseButton: true,
            showCancelButton: true,
            confirmButtonText: 'Si',
            cancelButtonText: 'Cancelar'
          }).then((value) => {
            
            if (value.isConfirmed) 
            {
              doCreate();
            }
            else
            {
            }
      });
    }
      
}

function doCreate()
{
    var cookie = getCookie("glassprotechUserData");
    var mail = document.getElementById("mail").value;
    var contra = document.getElementById("contra").value;
    var nombre = document.getElementById("nombre").value;
    var tipo = document.getElementById("select-level-create").value;

    var parametros = {
        "cookie" : cookie,
        "tipo" : tipo,
        "mail" : mail,
        "contra" : contra,
        "nombre" : nombre
    };
    $.ajax({
            data:  parametros, //datos que se envian a traves de ajax 
            url:   api_dev + 'home/admin_usr_register', //archivo que recibe la peticion
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
                if (response.status == "error" && response.desc == "no admin") 
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
                else if(response.status == "error")
                {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: response.desc,
                        showCloseButton: true,
                        confirmButtonText: 'Ok',
                        onClose: () => {
                            location.reload();
                        }
                    });
                }
                else if (response.status == "ok") 
                {
                  Swal.fire({
                        icon: 'success',
                        title: 'Exito',
                        text: 'Usuario creado',
                        showCloseButton: true,
                        confirmButtonText: 'Ok',
                        onClose: () => {
                            location.reload();
                        }
                    });
                }

            }
    });
}

function deleteUser(id)
{
  Swal.fire({
    icon: 'warning',
    title: 'Confirmación',
    text: '¿Estas seguro de que quieres borrar este usuario?',
    showCloseButton: true,
    showCancelButton: true,
    confirmButtonText: 'Si',
    cancelButtonText: 'Cancelar',
    onClose: () => 
    {
      
    }
  }).then((value) => {
    
    if (value.isConfirmed) 
    {
      doDelete(id);
    }
    else
    {
    }
  });
  
}

function doDelete(id)
{
    var cookie = getCookie("glassprotechUserData");
    var parametros = {
        "cookie" : cookie,
        "userID" : id

    };
    $.ajax({
            data:  parametros, //datos que se envian a traves de ajax 
            url:   api_dev + 'home/admin_deleteUserByID', //archivo que recibe la peticion
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
                  Swal.fire({
                        icon: 'success',
                        title: 'Exito',
                        text: 'Usuario eliminado',
                        showCloseButton: true,
                        confirmButtonText: 'Ok',
                        onClose: () => {
                            location.reload();
                        }
                    });
                }

            }
    });
}

function setSendingInfo(user_identification)
{
    var parametros = 
    {
        "id" : user_identification,
    };
    $.ajax({
            data:  parametros, //datos que se envian a traves de ajax 
            url:   api_dev + 'home/informacion_obtener', //archivo que recibe la peticion
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
            success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                    Swal.close();
                   document.getElementById('send-nombre').innerHTML = response[0];
                   document.getElementById('send-calle').innerHTML = response[1];
                   document.getElementById('send-ne').innerHTML = response[2];
                   document.getElementById('send-ni').innerHTML = response[3];
                   document.getElementById('send-colonia').innerHTML = response[4];
                   document.getElementById('send-cp').innerHTML = response[5];
                   document.getElementById('send-municipio').innerHTML = response[6];
                   document.getElementById('send-estado').innerHTML = response[7];
                   document.getElementById('send-pais').innerHTML = response[8];
                   document.getElementById('send-phone').innerHTML = response[9];
            }
    });
}
function setFacturingInfo(user_identification)
{
  var parametros = 
  {
        "id" : user_identification,
  };
  $.ajax({
            data:  parametros, //datos que se envian a traves de ajax 
            url:   api_dev + 'home/factura_obtener', //archivo que recibe la peticion
            type:  'post', //método de envio
            beforeSend: function () {
                Swal.fire({
                    title: 'Procesando información',
                    html: 'Un momento porfavor, estamos procesando su información',
                    onBeforeOpen: () => {
                      Swal.showLoading();
                    }
                  });
            },
            success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                    
                    
                  var obj = JSON.parse(response["factura_información"]);
                  Swal.close();
                  
                  document.getElementById('nombre-fact').innerHTML = response["factura_nombre"];
                  document.getElementById('rfc-fact').innerHTML = response["factura_rfc"];
                  document.getElementById('rs-fact').innerHTML = response["factura_razon_social"];
                    if (obj["email"] != undefined) 
                    {
                        document.getElementById('email-fact').innerHTML = obj["email"];
                       document.getElementById('calle-fact').innerHTML = obj["calle"];
                       document.getElementById('ne-fact').innerHTML = obj["ne"];
                       document.getElementById('ni-fact').innerHTML = obj["ni"];
                       document.getElementById('colonia-fact').innerHTML = obj["colonia"];
                       document.getElementById('cp-fact').innerHTML = obj["cp"];
                       document.getElementById('municipio-fact').innerHTML = obj["municipio"];
                       document.getElementById('estado-fact').innerHTML = obj["estado"];
                       document.getElementById('pais-fact').innerHTML = obj["pais"];
                    }
                    
            }
    });
}

function openPassword(id)
{
    document.getElementById('id-user-change').value = id;
}

function changePsw()
{
    var id = document.getElementById("id-user-change").value;
    var contra = document.getElementById("chn_psw").value;
    var contra_repeat = document.getElementById("chn_psw_repeat").value;

    if (id == ""||contra == ""||contra_repeat=="") 
    {
        Swal.fire({
            icon: 'error',
            title: 'Campos vacios',
            text: 'Por favor asegurese de que todos los campos esten completos',
            showCloseButton: true,
            confirmButtonText: 'Ok'
        });
    }
    else if(contra_repeat != contra)
    {
        Swal.fire({
            icon: 'error',
            title: 'Las contraseñas no coinciden',
            text: 'Por favor escriba la misma contraseña en ambos campos.',
            showCloseButton: true,
            confirmButtonText: 'Ok'
        });
    }
    else
    {
        Swal.fire({
            icon: 'warning',
            title: 'Confirmación',
            text: '¿Estas seguro de que quieres cambiar esta contraseña?',
            showCloseButton: true,
            showCancelButton: true,
            confirmButtonText: 'Si',
            cancelButtonText: 'Cancelar'
          }).then((value) => {
            
            if (value.isConfirmed) 
            {
              dochangePsw();
            }
            else
            {
            }
      });
    }
      
}

function dochangePsw()
{
    var cookie = getCookie("glassprotechUserData");
    var id = document.getElementById("id-user-change").value;
    var newpass = document.getElementById("chn_psw").value;

    var parametros = {
        "cookie" : cookie,
        "newpass" : newpass,
        "id" : id
    };
    $.ajax({
            data:  parametros, //datos que se envian a traves de ajax 
            url:   api_dev + 'home/admin_changePsw', //archivo que recibe la peticion
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
                if (response.status == "error" && response.desc == "no admin") 
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
                else if(response.status == "error")
                {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: response.desc,
                        showCloseButton: true,
                        confirmButtonText: 'Ok',
                        onClose: () => {
                            location.reload();
                        }
                    });
                }
                else if (response.status == "ok") 
                {
                  Swal.fire({
                        icon: 'success',
                        title: 'Exito',
                        text: 'Contraseña actualizada',
                        showCloseButton: true,
                        confirmButtonText: 'Ok',
                        onClose: () => {
                            location.reload();
                        }
                    });
                }

            }
    });
}


function setEditing(id, index)
{
    var user = prodList[index];
    document.getElementById('select-level').value = user.usuario_tipo;
    document.getElementById('id-user-level').value = user.usuario_identificador;
}

function updateUser()
{
    var id = document.getElementById("id-user-level").value;
    var level = document.getElementById("select-level").value;

    if (id == ""||level == "") 
    {
        Swal.fire({
            icon: 'error',
            title: 'Campos vacios',
            text: 'Por favor asegurese de que todos los campos esten completos',
            showCloseButton: true,
            confirmButtonText: 'Ok'
        });
    }
    else
    {
        Swal.fire({
            icon: 'warning',
            title: 'Confirmación',
            text: '¿Estas seguro de que quieres cambiar este usuario?',
            showCloseButton: true,
            showCancelButton: true,
            confirmButtonText: 'Si',
            cancelButtonText: 'Cancelar'
          }).then((value) => {
            
            if (value.isConfirmed) 
            {
              doUpdateUser();
            }
            else
            {
            }
      });
    }
      
}

function doUpdateUser()
{
    var cookie = getCookie("glassprotechUserData");
    var id = document.getElementById("id-user-level").value;
    var tipo = document.getElementById("select-level").value;

    var parametros = {
        "cookie" : cookie,
        "tipo" : tipo,
        "id" : id
    };
    $.ajax({
            data:  parametros, //datos que se envian a traves de ajax 
            url:   api_dev + 'home/admin_userUpdate', //archivo que recibe la peticion
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
                if (response.status == "error" && response.desc == "no admin") 
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
                else if(response.status == "error")
                {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: response.desc,
                        showCloseButton: true,
                        confirmButtonText: 'Ok',
                        onClose: () => {
                            location.reload();
                        }
                    });
                }
                else if (response.status == "ok") 
                {
                  Swal.fire({
                        icon: 'success',
                        title: 'Exito',
                        text: 'Usuario actualizado',
                        showCloseButton: true,
                        confirmButtonText: 'Ok',
                        onClose: () => {
                            location.reload();
                        }
                    });
                }

            }
    });
}
