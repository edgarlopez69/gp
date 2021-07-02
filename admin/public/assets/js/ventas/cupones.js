$(document).ready(function () {
   

  getCupones();
});

var prodList = [];

function getCupones()
{
    var cookie = getCookie("glassprotechUserData");
    var parametros = {
        "cookie" : cookie
    };
    $.ajax({
            data:  parametros, //datos que se envian a traves de ajax 
            url:   api_dev + 'home/admin_getCupones', //archivo que recibe la peticion
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
                    console.log(inventory[i]);
                    tableArticles += "<tr id=''>";
                    
                    tableArticles += "<td>"+inventory[i].cupon_identificador+"</td>";
                    tableArticles += "<td>"+inventory[i].cupon_codigo+"</td>";
                    tableArticles += "<td>$"+Number(inventory[i].cupon_descuento).toFixed(2)+"</td>";
                    tableArticles += "<td>"+inventory[i].cupon_condición+"</td>";
                    tableArticles += "<td>"+inventory[i].cupon_vencimiento+"</td>";
                    tableArticles += "<td>"+inventory[i].cupon_limite+"</td>";
                    tableArticles += "<td>"+inventory[i].cupon_canjeados+"</td>";
                    tableArticles += "<td><a href='#' data-toggle='modal' data-target='#sendingModal' onclick='setSending("+i+")'>Modificar</a></td>";
                    tableArticles += "<td><a href='#' data-toggle='modal' data-target='#facturingModal' onclick='setFacture("+i+")'>Eliminar</a></td>";
                    
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