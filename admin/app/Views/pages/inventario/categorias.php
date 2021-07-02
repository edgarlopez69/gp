<div class="content">
    <div class="container-fluid">
        <div class="section">
        	<h1>
        		Categorias
        	</h1>
        	<div class="table-container">
	        	<table id="table-filt" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
				  <thead>
				    <tr>
				      <th class="th-sm">ID

				      </th>
				      <th class="th-sm">Categoría

				      </th>
				      <th class="th-sm">Subcategorias

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
				      <th class="th-sm">Categoría

				      </th>
				      <th class="th-sm">Subcategorias

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
			  Añadir nueva categoría
			</button>
		</div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nueva categoría</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
		  <div class="form-group">
		    <label for="exampleInputPassword1">Nombre de la categoría</label>
		    <input type="text" class="form-control" id="newNombre" placeholder="Nombre">
		  </div>
		  <div class="form-group">
		    <label for="exampleInputPassword1">Nombre del producto:</label>
		    <input type="text" class="form-control name-with-button" id="newSubcat" placeholder="Nueva categoría">
		    <button type="button" class="btn btn-primary button-for-cats" onclick="addCatToList()">+</button>
		    <ul class="list-group cat-list-container" id="newSubcatlist">
			  
			</ul>
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
        <h5 class="modal-title" id="exampleModalLabel">Modificar categoría</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
		  <div class="form-group">
		    <label for="exampleInputPassword1">Nombre de la categoría</label>
		    <input type="text" class="form-control" id="newNombreMod" placeholder="Nombre">
		    <input type="hidden" id="idMod">
		  </div>
		  <div class="form-group">
		    <label for="exampleInputPassword1">Nombre del producto:</label>
		    <input type="text" class="form-control name-with-button" id="newSubcatMod" placeholder="Nueva categoría">
		    <button type="button" class="btn btn-primary button-for-cats" onclick="addCatToListMod()">+</button>
		    <ul class="list-group" id="newSubcatlistMod">
			  
			</ul>
		  </div>
		</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" onclick="modOrder()">Guardar</button>
      </div>
    </div>
  </div>
</div>