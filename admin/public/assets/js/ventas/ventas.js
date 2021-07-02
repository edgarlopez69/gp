$(document).ready(function () {
   

  getVentas();
});

var prodList = [];

function getVentas()
{
    var cookie = getCookie("glassprotechUserData");
    var parametros = {
        "cookie" : cookie
    };
    $.ajax({
            data:  parametros, //datos que se envian a traves de ajax 
            url:   api_dev + 'home/admin_getCompras', //archivo que recibe la peticion
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
                  
                  for(var i = 0; i < inventory.length; i++)
                  {
                    var plataforma = inventory[i].compra_plataforma;
                    if (plataforma == "OXXO") {plataforma = "Oxxo";}
                    else if (plataforma == "CARD") {plataforma = "Tarjeta"}
                    var status = inventory[i].compra_estatus;

                    if (status == "succeeded" || status == "successful") {status = "Completado"}
                    if (status == "Incomplete") {status = "Incompleto"}
                    if (status == "cancelled") {status = "Cancelado"}
                    tableArticles += "<tr id='row-"+i+"'>";
                    
                    tableArticles += "<td>"+inventory[i].compra_identificador+"</td>";
                    tableArticles += "<td><a href='#' data-toggle='modal' data-target='#articulosModal' onclick='setArticles("+i+")'>Articulos</a></td>";
                    tableArticles += "<td>$"+Number(inventory[i].compra_subtotal).toFixed(2)+"</td>";
                    tableArticles += "<td>"+inventory[i].compra_fecha+"</td>";
                    tableArticles += "<td>"+plataforma+"</td>";
                    tableArticles += "<td>"+status+"</td>";
                    tableArticles += "<td><a href='#' data-toggle='modal' data-target='#sendingModal' onclick='setSending("+i+")'>Envio</a></td>";
                    tableArticles += "<td><a href='#' data-toggle='modal' data-target='#facturingModal' onclick='setFacture("+i+")'>Factura</a></td>";
                    
                    tableArticles += "</tr>";
                    
                  }
                  $("#table-body").html(tableArticles);

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

function setArticles(id)
{
    var articles = JSON.parse(prodList[id].compra_articulos);
    var tableArticles = "";
    for(var i = 0; i < articles.length; i++)
    {
        var cantidad = articles[i].articulos;
        var indiv = articles[i].precio;
        var total = indiv * cantidad;

        tableArticles += "<tr>";
                    
        tableArticles += "<td><a target='_blank' href='https://store.glassprotech.com.mx/producto/"+articles[i].id+"'>"+articles[i].id+"</a></td>";
        tableArticles += "<td>"+articles[i].nombre+"</td>";
        tableArticles += "<td>"+cantidad+"</td>";
        tableArticles += "<td>$"+Number(indiv).toFixed(2)+"</td>";
        tableArticles += "<td>$"+Number(total).toFixed(2)+"</td>";
                            
        tableArticles += "</tr>";
    }
    $("#table-body-articulos").html(tableArticles);
    
}

function setSending(id)
{
    var sending = JSON.parse(prodList[id].compra_sending);
    $("#send-nombre").html(sending.nombre);
    $("#send-email").html(sending.email);
    $("#send-calle").html(sending.calle);
    $("#send-ne").html(sending.ne);
    $("#send-ni").html(sending.ni);
    $("#send-colonia").html(sending.colonia);
    $("#send-cp").html(sending.cp);
    $("#send-municipio").html(sending.municipio);
    $("#send-estado").html(sending.estado);
    $("#send-pais").html(sending.pais);
    $("#send-phone").html(sending.telefono);

    var cookie = getCookie("glassprotechUserData");
    var parametros = {
        "cookie" : cookie,
        "id" : prodList[id].compra_envio,

    };
    $.ajax({
            data:  parametros, //datos que se envian a traves de ajax 
            url:   api_dev + 'home/admin_getEnvioById', //archivo que recibe la peticion
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
                    var desc_send = response.desc;
                    desc_send = desc_send[0];
                    var sending_dat = "";
                    sending_dat += "<tr>";
                    sending_dat += "<td>";
                    sending_dat += "<input type='hidden' id='id' value='"+desc_send.envio_identificador+"'>";
                    sending_dat += "<input type='text' id='proveedor' value='"+desc_send.envio_proovedor+"' placeholder='Envio'></td>";
                    sending_dat += "<td><input type='date' id='f_envio' value='"+desc_send.envio_fecha_envio+"'></td>";
                    sending_dat += "<td><input type='date' id='f_arribo' value='"+desc_send.envio_fecha_arribo+"'></td>";
                    sending_dat += "<td><select id='estado'>";
                    sending_dat += "    <option value='No enviado'>No enviado</option>";
                    sending_dat += "    <option value='Enviado'>Enviado</option>";
                    sending_dat += "    <option value='Problema'>Problema</option>";
                    sending_dat += "    <option value='Entregado'>Entregado</option>";
                    sending_dat += "    <option value='Cancelado'>Cancelado</option>";
                    sending_dat += "</select></td>";
                    sending_dat += "<td><input type='text' id='seguimiento' value='"+desc_send.envio_seguimiento+"' placeholder='Codigo de seguimiento'></td>";
                    sending_dat += "</select></td>";
                    sending_dat += "</tr>";
                    $("#table-body-sending").html(sending_dat);
                    $('#estado').val(desc_send.envio_estatus);
                }

            }
    });
}

function updateEnvio()
{
      Swal.fire({
        icon: 'warning',
        title: 'Confirmación',
        text: '¿Estas seguro de que quiere actualizar estos datos?',
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
          doUpdate();
        }
        else
        {
        }
      });
}

function doUpdate()
{
    var cookie = getCookie("glassprotechUserData");

    var id = document.getElementById("id").value;
    var proveedor = document.getElementById("proveedor").value;
    var f_envio = document.getElementById("f_envio").value;
    var f_arribo = document.getElementById("f_arribo").value;
    var estatus = document.getElementById("estado").value;
    var seguimiento = document.getElementById("seguimiento").value;

    var parametros = {
        "cookie" : cookie,
        "id" : id,
        "proveedor" : proveedor,
        "f_envio" : f_envio,
        "f_arribo" : f_arribo,
        "estatus" : estatus,
        "seguimiento" : seguimiento
    };
    $.ajax({
            data:  parametros, //datos que se envian a traves de ajax 
            url:   api_dev + 'home/admin_updateEnvio', //archivo que recibe la peticion
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
                        text: 'Envio modificado',
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

function setFacture(id)
{
    var sending = JSON.parse(prodList[id].compra_fact_data);
    if (sending.nombre != "") 
    {
        $("#fact-nombre").html(sending.nombre);
        $("#fact-email").html(sending.email);
        $("#fact-rfc").html(sending.rfc);
        $("#fact-rs").html(sending.rs);
        $("#fact-calle").html(sending.calle);
        $("#fact-ne").html(sending.ne);
        $("#fact-ni").html(sending.ni);
        $("#fact-colonia").html(sending.colonia);
        $("#fact-cp").html(sending.cp);
        $("#fact-municipio").html(sending.municipio);
        $("#fact-estado").html(sending.estado);
        $("#fact-pais").html(sending.pais);
    }
    else
    {
        $("#Info-space-fact").html("No se ha proveído datos de factura.");
    }
        
}