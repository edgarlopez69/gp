<div class="content">
    <div class="container-fluid">
        <div class="section">
        	<h1>
        		Carrusel
        	</h1>
        	<div class="new-Product">
        		<select class="form-control" id="selector-items">
				  
				</select>
        		<button type="button" class="btn btn-primary" onclick="addToTable()">
				  Añadir nuevo producto
				</button>
        	</div>

        	<div class="table-container">
	        	<table id="table-filt" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
				  <thead>
				    <tr>
				      <th class="th-sm">ID

				      </th>
				      <th class="th-sm">Producto

				      </th>
				      <th class="th-sm">Imagen 1

				      </th>
				      <th class="th-sm">Imagen 2

				      </th>
				      <th class="th-sm">Imagen 3

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
				      <th class="th-sm">Imagen 1

				      </th>
				      <th class="th-sm">Imagen 2

				      </th>
				      <th class="th-sm">Imagen 3

				      </th>
				      <th class="th-sm">Eliminar

				      </th>
				    </tr>
				  </tfoot>
				</table>
			</div>
			<button type="button" class="btn btn-primary" onclick="saveSlider()">
				Guardar sliders
			</button>

        </div>
    </div>
</div>