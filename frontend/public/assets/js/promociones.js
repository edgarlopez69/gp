$(document).ready(function () 
{
    
    getContent();
});


function getContent()
{
    var response =  getTemporalItems();
    console.log(response);
    var prodContent = "";
    var itemCounter = 0;

    prodContent += '<div class="row productos-item-row" style="width:100%;">';
    for (var i = 0; i < response.length; i++) 
    {
        prodContent += '<div class="col-3 productos-item-col">';
        prodContent += '<div class="productos-item-container">';
        prodContent += '<img src="'+app_root+'/assets/img/descuentos/'+response[i]["desc"]+'.png" class="productos-item-desc">';
        prodContent += '<img src="'+app_root+'/assets/img/products/'+response[i]["img"]+'.png" class="productos-item-img">';
        prodContent += '<b class="productos-item-name">'+response[i]["nombre"]+'</b>';
        prodContent += '<p class="productos-item-content">Existencia   '+response[i]["existencia"]+'</p>';
        prodContent += '<p class="productos-item-content">Precio   $'+response[i]["precio"].toFixed(2);+'</p>';
        prodContent += '<img src="'+app_root+'/assets/img/components/agregar_a_carrito.png" class="productos-item-carrito-img">';
        prodContent += "</div>";
        prodContent += "</div>";

        itemCounter++;
        if(itemCounter == 4)
        {
            itemCounter = 0;
            prodContent += "</div>";
            prodContent += '<div class="row productos-item-row" style="width:100%;">';
        }
    }
    prodContent += "</div>";
    $("#item-cuad").html(prodContent);
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
        item["desc"] = 15;
        item["img"] = "Martillo Cristal";
        items[i] = item;
    }

    return items;
}