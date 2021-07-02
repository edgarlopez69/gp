$(document).ready(function () {
   

  getCategs();
});

var catsList = [];

var subcatlist = [];
var subcatlistMod = [];

function getCategs()
{
    var cookie = getCookie("glassprotechUserData");
    var parametros = {
        "cookie" : cookie
    };
    $.ajax({
            data:  parametros, //datos que se envian a traves de ajax 
            url:   api_dev + 'home/admin_getCategorias', //archivo que recibe la peticion
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
                  var tableArticles = "";
                  for(var i = 0; i < inventory.length; i++)
                  {
                    tableArticles += "<tr id='row-"+i+"'>";
                    tableArticles += "<td>"+inventory[i].categoria_id+"</td>";
                    tableArticles += "<td>"+inventory[i].categoria_nombre+"</td>";
                    tableArticles += "<td><ul>";
                    var subcatArray = JSON.parse(inventory[i].categoria_sub);
                    for(var j = 0; j < subcatArray.length; j++)
                    {
                        tableArticles += "<li>"+subcatArray[j]+"</li>";
                    }
                    tableArticles += "</ul></td>";
                    tableArticles += "<td><a href='#row-"+i+"' data-toggle='modal' data-target='#modifModal' onclick='getCatData("+i+")'>Modificar</a></td>";
                    tableArticles += "<td><a href='#row-"+i+"' onclick='deleteCat("+inventory[i].categoria_id+")'>Borrar</a></td>";
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

function deleteCat(id)
{
  Swal.fire({
    icon: 'warning',
    title: 'Confirmación',
    text: '¿Estas seguro de que quieres borrar esta categoría?',
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
        "catID" : id,

    };
    $.ajax({
            data:  parametros, //datos que se envian a traves de ajax 
            url:   api_dev + 'home/admin_deleteCategoriaById', //archivo que recibe la peticion
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
                        text: 'Categoría eliminada',
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

function createOrder(id)
{

    var nombre = document.getElementById("newNombre").value;
    var sub = JSON.stringify(subcatlist);

    if (nombre == "" ||sub == "") 
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
        text: '¿Estas seguro de que crear una nueva categoría?',
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

    var nombre = document.getElementById("newNombre").value;
    var sub = JSON.stringify(subcatlist);

    var parametros = {
        "cookie" : cookie,
        "nombre" : nombre,
        "sub" : sub

    };
    $.ajax({
            data:  parametros, //datos que se envian a traves de ajax 
            url:   api_dev + 'home/admin_newCategoria', //archivo que recibe la peticion
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
                        text: 'Categoría creada',
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

function modOrder()
{
    var nombre = document.getElementById("newNombreMod").value;
    var sub = JSON.stringify(subcatlistMod);

    if (nombre == "" ||sub == "") 
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
        text: '¿Estas seguro de que quiere modificar esta categoría?',
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
          doMod();
        }
        else
        {
        }
      });
    }

   
}


function doMod()
{
    var cookie = getCookie("glassprotechUserData");

    var nombre = document.getElementById("newNombreMod").value;
    var cid = document.getElementById("idMod").value;
    var sub = JSON.stringify(subcatlistMod);

    var parametros = {
        "cookie" : cookie,
        "nombre" : nombre,
        "catID" : cid,
        "sub" : sub

    };
    $.ajax({
            data:  parametros, //datos que se envian a traves de ajax 
            url:   api_dev + 'home/admin_updateCategoria', //archivo que recibe la peticion
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
                        text: 'Categoría modificado',
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

function getCookie(cname) 
{
  var name = cname + "=";
  var decodedCookie = decodeURIComponent(document.cookie);
  var ca = decodedCookie.split(';');
  for(var i = 0; i <ca.length; i++) {
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

function getCatData(id)
{
    document.getElementById("newNombreMod").value = catsList[id].categoria_nombre;
    document.getElementById("idMod").value = catsList[id].categoria_id;
    var subcatArray = JSON.parse(catsList[id].categoria_sub);
    var listContent = "";
    for(var j = 0; j < subcatArray.length; j++)
    {
        subcatlistMod.push(subcatArray[j]);
        
    }
    udateListMod();
}


function addCatToList()
{
    var subcat = document.getElementById("newSubcat").value;
    if (subcat != "") 
    {
        subcatlist.push(subcat);
        udateList();
    }
    
}

function removeCatToList(id)
{
    subcatlist.splice(id, 1);  
    udateList();
}

function udateList()
{
    var listtext="";
    for(var i = 0; i < subcatlist.length; i++)
    {
        listtext = listtext + '<li class="list-group-item"><a href="#" onclick="removeCatToList('+i+')">'+subcatlist[i]+'</a></li>';
    }
    document.getElementById("newSubcatlist").innerHTML = listtext;
}

function addCatToListMod()
{
    var subcat = document.getElementById("newSubcatMod").value;
    if (subcat != "") 
    {
        subcatlistMod.push(subcat);
        udateListMod();
    }
    
}

function removeCatToListMod(id)
{
    subcatlistMod.splice(id, 1);  
    udateListMod();
}

function udateListMod()
{
    var listtext="";
    for(var i = 0; i < subcatlistMod.length; i++)
    {
        listtext = listtext + '<li class="list-group-item"><a href="#" onclick="removeCatToListMod('+i+')">'+subcatlistMod[i]+'</a></li>';
    }
    document.getElementById("newSubcatlistMod").innerHTML = listtext;
}