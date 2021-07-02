<div class="content">
    <div class="container-fluid">
        <div class="section">
        	<h1>
        		Ventas
        	</h1>
        	<table id="table-filt" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
			  <thead>
			    <tr>
			      <th class="th-sm">ID

			      </th>
			      <th class="th-sm">Articulos

			      </th>
			      <th class="th-sm">Total

			      </th>
             <th class="th-sm">Fecha de compra

            </th>
			      <th class="th-sm">Plataforma

			      </th>
			      <th class="th-sm">Estado

			      </th>
			      <th class="th-sm">Envio

			      </th>
			      <th class="th-sm">Factura

			      </th>
			    </tr>
			  </thead>
			  <tbody id="table-body">
			    
			  </tbody>
			  <tfoot>
			    <tr>
			      <th class="th-sm">ID

			      </th>
			      <th class="th-sm">Articulos

			      </th>
			      <th class="th-sm">Total

			      </th>
            <th class="th-sm">Fecha de compra

            </th>
			      <th class="th-sm">Plataforma

			      </th>
			      <th class="th-sm">Estado

			      </th>
			      <th class="th-sm">Envio

			      </th>
			      <th class="th-sm">Factura

			      </th>
			    </tr>
			  </tfoot>
			</table>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="articulosModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Articulos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="table-container">
        	<table id="table-filt-arts" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
    			  <thead>
    			    <tr>
    			      <th class="th-sm">ID

    			      </th>
    			      <th class="th-sm">Articulo

    			      </th>
    			      <th class="th-sm">Cantidad

    			      </th>
    			      <th class="th-sm">Precio unitario

    			      </th>
    			      <th class="th-sm">Precio total

    			      </th>
    			    </tr>
    			  </thead>
    			  <tbody id="table-body-articulos">
    			  </tbody>
    			</table>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade bd-example-modal-xl" id="sendingModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Datos de envío</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<div id="Info-space">
      		<p>
      			<b>Nombre:</b> <span id="send-nombre"></span>
      		</p>
          <p>
            <b>Telefono:</b> <span id="send-phone"></span>
          </p>
      		<p>
      			<b>Email:</b> <span id="send-email"></span>
      		</p>
      		<p>
      			<b>Calle:</b> <span id="send-calle"></span>
      		</p>
      		<p>
      			<b>N.E:</b> <span id="send-ne"></span> <b>N.I:</b> <span id="send-ni"></span>
      		</p>
      		<p>
      			<b>Colonia:</b> <span id="send-colonia"></span> <b>C.P:</b> <span id="send-cp"></span>
      		</p>
      		<p>
      			<b>Municipio:</b> <span id="send-municipio"></span>
      		</p>
      		<p>
      			<b>Estado:</b> <span id="send-estado"></span> <b>Pais:</b> <span id="send-pais"></span>
      		</p>

          <div class="table-container">
            <table id="table-filt-sending" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th class="th-sm">Proveedor

                  </th>
                  <th class="th-sm">Fecha de envio

                  </th>
                  <th class="th-sm">Fecha de llegada

                  </th>
                  <th class="th-sm">Estado

                  </th>
                  <th class="th-sm">Seguimiento

                  </th>
                </tr>
              </thead>
              <tbody id="table-body-sending">
              </tbody>
            </table>
          </div>
      		

      	</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" onclick="updateEnvio()">Actualizar envio</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="facturingModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Datos de facturación</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<div id="Info-space-fact">
      		<p>
      			<b>Nombre:</b> <span id="fact-nombre"></span>
      		</p>
      		<p>
      			<b>Email:</b> <span id="fact-email"></span>
      		</p>
      		<p>
      			<b>R.F.C:</b> <span id="fact-frc"></span>
      		</p>
      		<p>
      			<b>Razon Social:</b> <span id="fact-rs"></span>
      		</p>
      		<p>
      			<b>Calle:</b> <span id="fact-calle"></span>
      		</p>
      		<p>
      			<b>N.E:</b> <span id="fact-ne"></span> <b>N.I:</b> <span id="fact-ni"></span>
      		</p>
      		<p>
      			<b>Colonia:</b> <span id="fact-colonia"></span> <b>C.P:</b> <span id="fact-cp"></span>
      		</p>
      		<p>
      			<b>Municipio:</b> <span id="fact-municipio"></span>
      		</p>
      		<p>
      			<b>Estado:</b> <span id="fact-estado"></span> <b>Pais:</b> <span id="fact-pais"></span>
      		</p>

      		
      </div>
      	</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>