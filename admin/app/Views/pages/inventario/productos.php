<div class="content">
    <div class="container-fluid">
        <div class="section">
        	<h1>
        		Productos
        	</h1>
        	<div class="table-container">
	        	<table id="table-filt" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
				  <thead>
				    <tr>
				      <th class="th-sm">ID

				      </th>
				      <th class="th-sm">Producto

				      </th>
				      <th class="th-sm">Marca

				      </th>
				      <th class="th-sm">Categorías

				      </th>
				      <th class="th-sm">Precio

				      </th>
				      <th class="th-sm">Cantidad

				      </th>
				      <th class="th-sm">Modificar

				      </th>
				      <th class="th-sm">Eliminar

				      </th>
				    </tr>
				  </thead>
				  <tbody id="table-body">
				    
				  </tbody>
				  <tfoot>
				    <tr>
				      <th class="th-sm">ID

				      </th>
				      <th class="th-sm">Producto

				      </th>
				      <th class="th-sm">Marca

				      </th>
				      <th class="th-sm">Categorías

				      </th>
				      <th class="th-sm">Precio

				      </th>
				      <th class="th-sm">Cantidad

				      </th>
				      <th class="th-sm">Modificar

				      </th>
				      <th class="th-sm">Eliminar

				      </th>
				    </tr>
				  </tfoot>
				</table>
			</div>
        </div>
        <div class="section">
        	<!-- Button trigger modal -->
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createModal">
			  Añadir nuevo producto
			</button>
		</div>
    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nuevo producto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
        	<div class="form-group">
		    <label for="exampleInputPassword1">ID del producto:</label>
		    <input type="text" class="form-control" id="prodID" placeholder="ID">
		  </div>
		  <div class="form-group">
		    <label for="exampleInputPassword1">Nombre del producto:</label>
		    <input type="text" class="form-control" id="descript" placeholder="Nombre">
		  </div>
		  <div class="form-group">
		    <label for="exampleInputPassword1">Marca del producto:</label>
		    <input type="text" class="form-control" id="marca" placeholder="Marca">
		  </div>
		  <div class="form-group">
		    <label for="exampleInputPassword1">Extracto del producto:</label>
		    <textarea class="form-control" id="ext" rows="3" placeholder="Extracto"></textarea>
		  </div>
		  <div class="form-group">
		    <label for="exampleInputPassword1">Precio unitario:</label>
		    <input type="number" min="0" step=".01" class="form-control" id="precio" placeholder="Precio">
		  </div>
		  <div class="form-group">
		    <label for="exampleInputPassword1">Cantidad en inventario:</label>
		    <input type="number" min="0" max="9999" class="form-control" id="cant" placeholder="Cantidad">
		  </div>
		  <div class="form-group">
		    <label for="exampleInputPassword1">Añadir categoría</label>
		    <select class="form-control" id="new-catsection" onchange="loadCatNew()">

			</select>
			<div class="option-container" id="newOptions">
				
			</div>
		  </div>
		  
		  <div class="form-group">
		    <label for="exampleInputPassword1">Primera imagen:</label>
		    <form></form>
		    <form id="f_img_1">
		    	<input type="file" class="form-control" name="fileToUpload" id="img1" placeholder="Imagen.png" onchange="uploadImg('img1', 'f_img_1')">
		    </form>
		  </div>
		  <div class="form-group">
		    <label for="exampleInputPassword1">Segunda imagen:</label>
		    <form id="f_img_2">
		    	<input type="file" class="form-control" name="fileToUpload" id="img2" placeholder="Imagen.png" onchange="uploadImg('img2', 'f_img_2')">
		    </form>
		  </div>
		  <div class="form-group">
		    <label for="exampleInputPassword1">Tercera imagen:</label>
		    <form id="f_img_3">
		    	<input type="file" class="form-control" name="fileToUpload" id="img3" placeholder="Imagen.png" onchange="uploadImg('img3', 'f_img_3')">
		    </form>
		  </div>
		</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" onclick="createOrder()">Crear</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="modifModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modificar producto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
		  <div class="form-group">
		    <input type="hidden" class="form-control" id="ModprodID" placeholder="ID">
		  </div>
		  <div class="form-group">
		    <label for="exampleInputPassword1">Nombre del producto:</label>
		    <input type="text" class="form-control" id="Moddescript" placeholder="Nombre">
		  </div>
		  <div class="form-group">
		    <label for="exampleInputPassword1">Marca del producto:</label>
		    <input type="text" class="form-control" id="Modmarca" placeholder="Marca">
		  </div>
		  <div class="form-group">
		    <label for="exampleInputPassword1">Extracto del producto:</label>
		    <input type="text" class="form-control" id="Modext" placeholder="Extracto">
		  </div>
		  <div class="form-group">
		    <label for="exampleInputPassword1">Precio unitario:</label>
		    <input type="number" min="0" step=".01" class="form-control" id="Modprecio" placeholder="Precio">
		  </div>
		  <div class="form-group">
		    <label for="exampleInputPassword1">Cantidad en inventario:</label>
		    <input type="number" min="0" max="9999" class="form-control" id="Modcant" placeholder="Cantidad">
		  </div>
		  <div class="form-group">
		    <label for="exampleInputPassword1">Añadir categoría</label>
		    <select class="form-control" id="Modnew-catsection" onchange="loadCatMod()">

			</select>
			<div class="option-container" id="ModnewOptions">
				
			</div>
		  </div>
		  <div class="form-group">
		    <label for="exampleInputPassword1">Primera imagen:</label>
		    <form></form>
		    <form id="form_img_1">
		    	<input type="file" class="form-control" name="fileToUpload" id="Modimg1" placeholder="Imagen.png" onchange="uploadImg('Modimg1', 'form_img_1')">
		    </form>
		  </div>
		  <div class="form-group">
		    <label for="exampleInputPassword1">Segunda imagen:</label>
		    <form id="form_img_2">
		    	<input type="file" class="form-control" name="fileToUpload" id="Modimg2" placeholder="Imagen.png" onchange="uploadImg('Modimg2', 'form_img_2')">
		    </form>
		  </div>
		  <div class="form-group">
		    <label for="exampleInputPassword1">Tercera imagen:</label>
		    <form id="form_img_3">
		    	<input type="file" class="form-control" name="fileToUpload" id="Modimg3" placeholder="Imagen.png" onchange="uploadImg('Modimg3', 'form_img_3')">
		    </form>
		  </div>
		</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" onclick="modOrder()">Modificar</button>
      </div>
    </div>
  </div>
</div>