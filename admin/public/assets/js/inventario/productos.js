$(document).ready(function () {
   

  getProducts();
  getCategs();
});

var prodList = [];

var filenames = [];
filenames["img1"] = "default.png";
filenames["img2"] = "default.png";
filenames["img3"] = "default.png";
filenames["Modimg1"] = "";
filenames["Modimg2"] = "";
filenames["Modimg3"] = "";

var catsList = [];
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
                  var catselector = "";
                  catselector += '<option value="x" selected>Sin categoría</option>';
                  for(var i = 0; i < catsList.length; i++)
                  {
                    catselector += '<option value="'+i+'">'+catsList[i].categoria_nombre+'</option>';
                  }
                  $("#new-catsection").html(catselector);
                  $("#Modnew-catsection").html(catselector);           
                }
                

            }
    });
}

function getProducts()
{
    var cookie = getCookie("glassprotechUserData");
    var parametros = {
        "cookie" : cookie
    };
    $.ajax({
            data:  parametros, //datos que se envian a traves de ajax 
            url:   api_dev + 'home/admin_getInventory', //archivo que recibe la peticion
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
                    tableArticles += "<tr id='row-"+i+"'>";
                    tableArticles += "<td><a target='_blank' href='https://store.glassprotech.com.mx/producto/"+inventory[i].articulo_identificador+"'>"+inventory[i].articulo_identificador+"</a></td>";
                    tableArticles += "<td>"+inventory[i].articulo_descripción+"</td>";
                    tableArticles += "<td>"+inventory[i].articulo_marca+"</td>";

                    var cats = inventory[i].articulo_cats;
                    cats = cats.replace(/`/g, '"');
                    cats = JSON.parse(cats);
                    tableArticles += "<td>";
                    tableArticles += "<p>"+cats.categoria+"</p>";
                    tableArticles += "<ul>";
                    for(var j = 0; j < cats.subcategorias.length; j++)
                    {
                        tableArticles += "<li>"+cats.subcategorias[j]+"</li>";
                    }
                    tableArticles += "</ul>";
                    tableArticles += "</td>";

                    tableArticles += "<td>$"+Number(inventory[i].articulo_precio).toFixed(2)+"</td>";
                    tableArticles += "<td><input type='hidden' id='hid-"+i+"' value='"+inventory[i].articulo_cantidad+"'><input type='number' name='' min='0' max='9999' id='can-"+i+"' onchange='modCant("+i+")' value='"+inventory[i].articulo_cantidad+"'></td>";
                    tableArticles += "<td><a href='#row-"+i+"' data-toggle='modal' data-target='#modifModal' onclick='getProdData("+i+")'>Modificar</a></td>";
                    tableArticles += "<td><a href='#row-"+i+"' onclick='deleteProduct("+i+")'>Borrar</a></td>";
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

function deleteProduct(id)
{
  var prod = document.getElementById('row-'+id).getElementsByTagName('td')[0].getElementsByTagName('a')[0].innerHTML;
  Swal.fire({
    icon: 'warning',
    title: 'Confirmación',
    text: '¿Estas seguro de que quieres borrar el producto '+prod+'?',
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
      doDelete(prod);
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
        "prodID" : id,

    };
    $.ajax({
            data:  parametros, //datos que se envian a traves de ajax 
            url:   api_dev + 'home/admin_deleteProductByID', //archivo que recibe la peticion
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
                        text: 'Producto eliminado',
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
    var prodID = document.getElementById("prodID").value;
    var descript = document.getElementById("descript").value;
    var ext = document.getElementById("ext").value;
    var marca = document.getElementById("marca").value;
    var catname = document.getElementById("new-catsection").value;
    var categorias = "";
    var precio = document.getElementById("precio").value;
    var cant = document.getElementById("cant").value;
    var img1 = filenames["img1"];
    var img2 = filenames["img2"];
    var img3 = filenames["img3"];

    var inputs = document.getElementById("newOptions").getElementsByTagName('div');
    var subcatarray = [];
    var nombre_categoria = "";
    if (catname == "x") 
    {
        nombre_categoria = "Sin categoría";
    }
    else
    {
        nombre_categoria = catsList[catname].categoria_nombre;
        var subcats = JSON.parse(catsList[catname].categoria_sub);
        for(var i = 0; i < inputs.length; i++)
        {
            var currentInput = inputs[i].getElementsByTagName('input');
            if (currentInput[0].checked) 
            {
                subcatarray.push(``+subcats[i]);
            }
        }
    }
    subcatarray = JSON.stringify(subcatarray);
    subcatarray = subcatarray.replace(/"/g, "`");
    categorias = "{`categoria`:`"+nombre_categoria+"`, `subcategorias`:"+subcatarray+"}";
    if (prodID == "" ||descript == "" ||ext == "" ||marca == "" ||precio == "" ||cant == "") 
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
        text: '¿Estas seguro de que crear un nuevo producto?',
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

    var prodID = document.getElementById("prodID").value;
    var descript = document.getElementById("descript").value;
    var ext = document.getElementById("ext").value;
    var marca = document.getElementById("marca").value;
    var catname = document.getElementById("new-catsection").value;
    var categorias = "";
    var precio = document.getElementById("precio").value;
    var cant = document.getElementById("cant").value;
    var img1 = filenames["img1"];
    var img2 = filenames["img2"];
    var img3 = filenames["img3"];

    var inputs = document.getElementById("newOptions").getElementsByTagName('div');
    var subcatarray = [];
    var nombre_categoria = "";
    if (catname == "x") 
    {
        nombre_categoria = "Sin categoría";
    }
    else
    {
        nombre_categoria = catsList[catname].categoria_nombre;
        var subcats = JSON.parse(catsList[catname].categoria_sub);
        for(var i = 0; i < inputs.length; i++)
        {
            var currentInput = inputs[i].getElementsByTagName('input');
            if (currentInput[0].checked) 
            {
                subcatarray.push(subcats[i]);
            }
        }
    }
    subcatarray = JSON.stringify(subcatarray);
    subcatarray = subcatarray.replace(/"/g, "`");
    categorias = "{`categoria`:`"+nombre_categoria+"`, `subcategorias`:"+subcatarray+"}";
    var parametros = {
        "cookie" : cookie,
        "prodID" : prodID,
        "descript" : descript,
        "ext" : ext,
        "precio" : precio,
        "cant" : cant,
        "img1" : img1,
        "img2" : img2,
        "img3" : img3,
        "marca" : marca,
        "cats" : categorias

    };
    $.ajax({
            data:  parametros, //datos que se envian a traves de ajax 
            url:   api_dev + 'home/admin_newProduct', //archivo que recibe la peticion
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
                        text: 'Producto creado',
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
    var prodID = document.getElementById("ModprodID").value;
    var descript = document.getElementById("Moddescript").value;
    var ext = document.getElementById("Modext").value;
    var marca = document.getElementById("Modmarca").value;
    var catname = document.getElementById("new-catsection").value;
    var categorias = "";
    var precio = document.getElementById("Modprecio").value;
    var cant = document.getElementById("Modcant").value;
    var img1 = filenames["Modimg1"];
    var img2 = filenames["Modimg2"];
    var img3 = filenames["Modimg3"];

    var inputs = document.getElementById("ModnewOptions").getElementsByTagName('div');
    var subcatarray = [];
    var nombre_categoria = "";
    if (catname == "x") 
    {
        nombre_categoria = "Sin categoría";
    }
    else
    {
        nombre_categoria = catsList[catname].categoria_nombre;
        var subcats = JSON.parse(catsList[catname].categoria_sub);
        for(var i = 0; i < inputs.length; i++)
        {
            var currentInput = inputs[i].getElementsByTagName('input');
            if (currentInput[0].checked) 
            {
                subcatarray.push(``+subcats[i]);
            }
        }
    }
    subcatarray = JSON.stringify(subcatarray);
    subcatarray = subcatarray.replace(/"/g, "`");
    categorias = "{`categoria`:`"+nombre_categoria+"`, `subcategorias`:"+subcatarray+"}";

    if (prodID == "" ||descript == "" ||ext == "" ||marca == "" ||categorias == "" ||precio == "" ||cant == "" ||img1 == "" ||img2 == "" ||img3 == "") 
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
        text: '¿Estas seguro de que quiere modificar este producto?',
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

    var prodID = document.getElementById("ModprodID").value;
    var descript = document.getElementById("Moddescript").value;
    var ext = document.getElementById("Modext").value;
    var marca = document.getElementById("Modmarca").value;
    var catname = document.getElementById("Modnew-catsection").value;
    var categorias = "";
    var precio = document.getElementById("Modprecio").value;
    var cant = document.getElementById("Modcant").value;
    var img1 = filenames["Modimg1"];
    var img2 = filenames["Modimg2"];
    var img3 = filenames["Modimg3"];

    var inputs = document.getElementById("ModnewOptions").getElementsByTagName('div');
    var subcatarray = [];
    var nombre_categoria = "";
    if (catname == "x") 
    {
        nombre_categoria = "Sin categoría";
    }
    else
    {
        nombre_categoria = catsList[catname].categoria_nombre;
        var subcats = JSON.parse(catsList[catname].categoria_sub);
        for(var i = 0; i < inputs.length; i++)
        {
            var currentInput = inputs[i].getElementsByTagName('input');
            if (currentInput[0].checked) 
            {
                subcatarray.push(``+subcats[i]);
            }
        }
    }
    subcatarray = JSON.stringify(subcatarray);
    subcatarray = subcatarray.replace(/"/g, "`");
    categorias = "{`categoria`:`"+nombre_categoria+"`, `subcategorias`:"+subcatarray+"}";

    var parametros = {
        "cookie" : cookie,
        "prodID" : prodID,
        "descript" : descript,
        "ext" : ext,
        "precio" : precio,
        "cant" : cant,
        "img1" : img1,
        "img2" : img2,
        "img3" : img3,
        "marca" : marca,
        "cats" : categorias

    };
    $.ajax({
            data:  parametros, //datos que se envian a traves de ajax 
            url:   api_dev + 'home/admin_updateProduct', //archivo que recibe la peticion
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
                        text: 'Producto modificado',
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

function modCant(id)
{
  var prod = document.getElementById('row-'+id).getElementsByTagName('td')[0].getElementsByTagName('a')[0].innerHTML;
  Swal.fire({
    icon: 'warning',
    title: 'Confirmación',
    text: '¿Estas seguro de que quieres cambiar el inventario de '+prod+'?',
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
      doModCant(prod, id);
    }
    else
    {
      document.getElementById("can-"+id).value = document.getElementById("hid-"+id).value;
    }
  });
  
}

function doModCant(id,order)
{
    var cookie = getCookie("glassprotechUserData");
    var prodID = id;
    var cant = document.getElementById("can-"+order).value;

    var parametros = {
        "cookie" : cookie,
        "prodID" : prodID,
        "cant" : cant

    };
    $.ajax({
            data:  parametros, //datos que se envian a traves de ajax 
            url:   api_dev + 'home/admin_updateProdCant', //archivo que recibe la peticion
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
                        text: 'Producto modificado',
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

function getProdData(id)
{
  document.getElementById("ModprodID").value = prodList[id].articulo_identificador;
  document.getElementById("Modmarca").value = prodList[id].articulo_marca;
  document.getElementById("Moddescript").value = prodList[id].articulo_descripción;
  document.getElementById("Modext").value = prodList[id].articulo_extracto;
  document.getElementById("Modprecio").value = prodList[id].articulo_precio;
  document.getElementById("Modcant").value = prodList[id].articulo_cantidad;
  filenames["Modimg1"] = prodList[id].articulo_imagen_1;
  filenames["Modimg2"] = prodList[id].articulo_imagen_2;
  filenames["Modimg3"] = prodList[id].articulo_imagen_3;
  /*
  var cats = prodList[id].articulo_cats;
  cats = cats.replace(/`/g, '"');
  cats = JSON.parse(cats);
  console.log(cats);
  
    document.getElementById("Modnew-catsection").value = cats.categoria;
    var optionList = "";
        optionList += '<p>Subcategorias:</p>';
        for(var i = 0; i < cats.subcategorias.length; i++)
        {
            optionList += '<div class="form-check">';
            optionList += '<input type="checkbox" class="chk-box" id="subcatlistcheck'+i+'">';
            optionList += '<label class="chk-box-label" for="subcatlistcheck'+i+'">'+cats.subcategorias[i]+'</label>';
            optionList += '</div>';
        }
    $("#ModnewOptions").html(optionList);
    */
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

function uploadImg(input_id, form_id)
{
    var data = document.getElementById(input_id).value;
    if (data == "") 
    {
      Swal.fire({
        icon: 'error',
        title: 'Archivo no seleccionado',
        text: 'No a elegido una imagen a subir.',
        showCloseButton: true,
        confirmButtonText: 'Ok'
      });
    }
    else
    {
      var parametros = new FormData(document.getElementById(form_id));
      $.ajax({
              data:  parametros, //datos que se envian a traves de ajax 
              url:   store_root+'home/changeProduct', //archivo que recibe la peticion
              type:  'post', //método de envio
              dataType: "html",
              cache: false,
              contentType: false,
              processData: false,
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

                  var structure = JSON.parse(response);
                  filenames[input_id] = structure.file;
                  if (structure.status != "ok") 
                  {
                    Swal.fire({
                      icon: 'error',
                      title: 'Error',
                      text: structure.result,
                      showCloseButton: true,
                      confirmButtonText: 'Ok'
                    });
                  }
                  else
                  {
                    Swal.fire({
                      icon: 'success',
                      title: 'Exito',
                      text: structure.result,
                      showCloseButton: true,
                      confirmButtonText: 'Ok'
                    });
                  }
                  

              }
      });
    }
    
}

function getFile(id)
{
    var filename;
    var fullPath = document.getElementById(id).value;
    if (fullPath) {
        var startIndex = (fullPath.indexOf('\\') >= 0 ? fullPath.lastIndexOf('\\') : fullPath.lastIndexOf('/'));
        filename = fullPath.substring(startIndex);
        if (filename.indexOf('\\') === 0 || filename.indexOf('/') === 0) {
            filename = filename.substring(1);
        }
    }
    if (filename = undefined)
    {
        filename = "";
    }
    return filename;
}

function loadCatNew()
{
    var ind = document.getElementById("new-catsection").value;
    var optionList = "";
    if (ind == "x") 
    {
        optionList += 'Sin Subcategorías';
    }
    else
    {
        var subcatlist = JSON.parse(catsList[ind].categoria_sub);
        optionList += '<p>Subcategorias:</p>';
        for(var i = 0; i < subcatlist.length; i++)
        {
            optionList += '<div class="form-check">';
            optionList += '<input type="checkbox" class="chk-box" id="subcatlistcheck'+i+'">';
            optionList += '<label class="chk-box-label" for="subcatlistcheck'+i+'">'+subcatlist[i]+'</label>';
            optionList += '</div>';
        }
    }
    $("#newOptions").html(optionList);
    
}

function loadCatMod()
{
    var ind = document.getElementById("Modnew-catsection").value;
    var optionList = "";
    if (ind == "x") 
    {
        optionList += 'Sin Subcategorías';
    }
    else
    {
        var subcatlist = JSON.parse(catsList[ind].categoria_sub);
        optionList += '<p>Subcategorias:</p>';
        for(var i = 0; i < subcatlist.length; i++)
        {
            optionList += '<div class="form-check">';
            optionList += '<input type="checkbox" class="chk-box" id="subcatlistcheck'+i+'">';
            optionList += '<label class="chk-box-label" for="subcatlistcheck'+i+'">'+subcatlist[i]+'</label>';
            optionList += '</div>';
        }
    }
    $("#ModnewOptions").html(optionList);
    
}