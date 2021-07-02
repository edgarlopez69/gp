<div class="content">
    <div class="container-fluid">
    	<div class="section">
        	<h1>
        		Administradores
        	</h1>
          <div class="table-container">
          	<table id="table-filt-admin" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
      			  <thead>
      			    <tr>
      			      <th class="th-sm">Correo

      			      </th>
      			      <th class="th-sm">Plataforma

      			      </th>
      			      <th class="th-sm">Contraseña

      			      </th>
      			      <th class="th-sm">Estatus

      			      </th>
      			      <th class="th-sm">Información

      			      </th>
      			      <th class="th-sm">Factura

      			      </th>
      			      <th class="th-sm">Editar

      			      </th>
      			      <th class="th-sm">Eliminar

      			      </th>
      			    </tr>
      			  </thead>
      			  <tbody id="table-body-admin">
      			    
      			  </tbody>
      			  <tfoot>
      			    <tr>
      			      <th class="th-sm">Correo

      			      </th>
      			      <th class="th-sm">Plataforma

      			      </th>
      			      <th class="th-sm">Contraseña

      			      </th>
      			      <th class="th-sm">Estatus

      			      </th>
      			      <th class="th-sm">Información

      			      </th>
      			      <th class="th-sm">Factura

      			      </th>
      			      <th class="th-sm">Editar

      			      </th>
      			      <th class="th-sm">Eliminar

      			      </th>
      			    </tr>
      			  </tfoot>
      			</table>
          </div>
        </div>
        <div class="section">
        	<h1>
        		Usuarios
        	</h1>
          <div class="table-container">
          	<table id="table-filt" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
      			  <thead>
      			    <tr>
      			      <th class="th-sm">Correo

      			      </th>
      			      <th class="th-sm">Plataforma

      			      </th>
      			      <th class="th-sm">Contraseña

      			      </th>
      			      <th class="th-sm">Estatus

      			      </th>
      			      <th class="th-sm">Información

      			      </th>
      			      <th class="th-sm">Factura

      			      </th>
      			      <th class="th-sm">Editar

      			      </th>
      			      <th class="th-sm">Eliminar

      			      </th>
      			    </tr>
      			  </thead>
      			  <tbody id="table-body">
      			    
      			  </tbody>
      			  <tfoot>
      			    <tr>
      			      <th class="th-sm">Correo

      			      </th>
      			      <th class="th-sm">Plataforma

      			      </th>
      			      <th class="th-sm">Contraseña

      			      </th>
      			      <th class="th-sm">Estatus

      			      </th>
      			      <th class="th-sm">Información

      			      </th>
      			      <th class="th-sm">Factura

      			      </th>
      			      <th class="th-sm">Editar

      			      </th>
      			      <th class="th-sm">Eliminar

      			      </th>
      			    </tr>
      			  </tfoot>
      			</table>
          </div>
			<!-- Button trigger modal -->
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createModal">
			  Añadir nuevo usuario
			</button>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nuevo Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
		  <div class="form-group">
		    <label for="exampleInputPassword1">Nombre del usuario:</label>
		    <input type="text" class="form-control" id="nombre" placeholder="Nombre">
		  </div>
		  <div class="form-group">
		    <label for="exampleInputPassword1">Correo:</label>
		    <input type="email" class="form-control" id="mail" placeholder="Correo">
		  </div>
		  <div class="form-group">
		    <label for="exampleInputPassword1">Contraseña:</label>
		    <input type="password" class="form-control" id="contra" placeholder="Contraseña">
		  </div>
		  <div class="form-group">
		    <label for="exampleInputPassword1">Repetir contraseña:</label>
		    <input type="password" class="form-control" id="contra_repeat" placeholder="Repetir contraseña">
		  </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Tipo de usuario:</label>
        <select class="custom-select custom-select-lg mb-3" id="select-level-create">
          <option value="2">Administrador</option>
          <option value="1">Usuario base</option>
        </select>
      </div>
      
		</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" onclick="createUser()">Crear</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="sendingModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
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
      	</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="facturingModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
      			<b>Nombre:</b> <span id="nombre-fact"></span>
      		</p>
      		<p>
      			<b>Email:</b> <span id="email-fact"></span>
      		</p>
      		<p>
      			<b>R.F.C:</b> <span id="rfc-fact"></span>
      		</p>
      		<p>
      			<b>Razon Social:</b> <span id="rs-fact"></span>
      		</p>
      		<p>
      			<b>Calle:</b> <span id="calle-fact"></span>
      		</p>
      		<p>
      			<b>N.E:</b> <span id="ne-fact"></span> <b>N.I:</b> <span id="ni-fact"></span>
      		</p>
      		<p>
      			<b>Colonia:</b> <span id="colonia-fact"></span> <b>C.P:</b> <span id="cp-fact"></span>
      		</p>
      		<p>
      			<b>Municipio:</b> <span id="municipio-fact"></span>
      		</p>
      		<p>
      			<b>Estado:</b> <span id="estado-fact"></span> <b>Pais:</b> <span id="pais-fact"></span>
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

<!-- Modal -->
<div class="modal fade" id="passModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cambiar contraseña</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<form>
      		<input type="hidden" id="id-user-change" name="" value="">
		  <div class="form-group">
		    <label for="chn_psw">Contraseña:</label>
		    <input type="password" class="form-control" id="chn_psw" placeholder="Contraseña">
		  </div>
		  <div class="form-group">
		    <label for="chn_psw_repeat">Repetir contraseña:</label>
		    <input type="password" class="form-control" id="chn_psw_repeat" placeholder="Contraseña">
		  </div>
		</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" onclick="changePsw()">Cambiar Contraseña</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="editingModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<form>
      		<input type="hidden" id="id-user-level" name="" value="">
		  <select class="custom-select custom-select-lg mb-3" id="select-level">
			  <option value="2">Administrador</option>
			  <option value="1">Usuario base</option>
			</select>

		</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" onclick="updateUser()">Actualizar usuario</button>
      </div>
    </div>
  </div>
</div>