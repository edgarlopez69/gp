<div class="inner-section" style="position: relative">
<div style="position: absolute; top: 0; bottom: 0; left: 0; right: 0; height: 100%; z-index: -100;" id="particles-js"></div>
	<div class="row" style="width: 100%;">
		<div class="col-lg-8 col-md-7 col-sm-12 col-12 p-md-3 p-sm-2 p-1">
			<div class="carrito-items-container" id="contenedor">
				
			</div>
		</div>

		<div class="col-lg-4 col-md-5 col-sm-12 col-12 p-3 bg-white">
			<div class="carrito-panel shadow rounded">
				<div class="total-pagar rounded-top fw-bold text-dark">
					TOTAL A PAGAR
				</div>
				<div class="total-info-container text-dark">
					<div class="row" style="width: 100%;">
						<div class="col-8 text-start">
							<p class="carrito-text">
								Forma de pago:
							</p>
						</div>
						<div class="col-4 text-end">
							<p class="carrito-text">
								Contado
							</p>
						</div>
					</div>
					<div class="row" style="width: 100%;">
						<div class="col-8 text-start">
							<p class="carrito-text">
								Subtotal:
							</p>
						</div>
						<div class="col-4 text-end">
							<p class="carrito-text" id="subtotal">
								$0.00
							</p>
						</div>
					</div>
					<div class="row" style="width: 100%;">
						<div class="col-8 text-start">
							<p class="carrito-text">
								Descuento:
							</p>
						</div>
						<div class="col-4 text-end">
							<p class="carrito-text">
								$0.00
							</p>
						</div>
					</div>
					<div class="row " style="width: 100%;">
						<div class="col-8 text-start">
							<p class="carrito-text">
								Total:
							</p>
						</div>
						<div class="col-4 text-end">
							<p class="carrito-text" id="total">
								$0.00
							</p>
						</div>
					</div>
					<div class="row" style="width: 100%;">
						<div class="col-xl-6 col-md-12 col-sm-6 col-6 mb-3">
							<button class="carrito-button-continuar btn btn-outline-primary" id="continuar">Continuar <br> comprando</button>
						</div>
						<div class="col-xl-6 col-md-12 col-sm-6 col-6 mb-3">
							<button class="carrito-button-comprar btn btn-primary" id="comprar" data-toggle="modal" data-target="#pay-type" onclick="islogedBuy()">Confirmar <br> compra</button>
						</div>
					</div>
				</div>
			</div>
			
		</div>
	</div>
</div>



<!-- Modal -->
<div class="modal fade" id="pay-type" tabindex="-1" role="dialog" aria-labelledby="pay-type" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="data">
            <input type="hidden" name="" id="usr_id" value="1">
            <span id="user_name">...</span>
        </div>
        <div class="" id="p-1">
            <div class="row button-row">
                <div class="col">
                    
                </div>
                <div class="col">
                    <button type="button" class="btn btn-success btn-compra" onclick="pageTwo()">Continuar</button>
                </div>
            </div>
        </div>
        <div class="" id="p-2">
            
            <div class="form-panel">
                        <h1 class="titulo titulo-panel">Datos de envio</h1>

                        <div class="row" style="margin-bottom: 5%;">
                            <div class="col-12">
                                <label for="nombre">Nombre</label>
                                <div class="input-container">
                                    
                                    <input type="text" class="form-email contained-input" id="nombre" placeholder="Nombre">
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin-bottom: 5%;">
                            <div class="col-12">
                                <label for="nombre">Telefono</label>
                                <div class="input-container">
                                    
                                    <input type="phone" class="form-email contained-input" id="telefono" placeholder="33 222 222 11">
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin-bottom: 5%;">
                            <div class="col-12">
                                <label for="email">Email:</label>
                                <div class="input-container">               
                                    <input type="email" class="form-email contained-input" id="email" placeholder="Email">
                                </div>
                            </div>
                        </div>
                        
                        <div class="row" style="margin-bottom: 5%;">
                            <div class="col-12">
                                <label for="calle">Calle</label>
                                <div class="input-container">
                                    
                                    <input type="text" class="form-email contained-input" id="calle" placeholder="Calle">
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin-bottom: 5%;">
                            <div class="col-6">
                                <label for="entidad">N.E.</label>
                                <div class="input-container">
                                    
                                    <input type="text" class="form-email contained-input" id="ne" placeholder="N.E.">
                                </div>
                            </div>
                            <div class="col-6">
                                <label for="cp">N.I.</label>
                                <div class="input-container">
                                    
                                    <input type="text" class="form-email contained-input" id="ni" placeholder="N.I.">
                                </div>
                            </div>
                            
                        </div>
                        <div class="row" style="margin-bottom: 5%;">
                            <div class="col-12">
                                <label for="colonia">Colonia</label>
                                <div class="input-container">
                                    
                                    <input type="text" class="form-email contained-input" id="colonia" placeholder=Colonia>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin-bottom: 5%;">
                            <div class="col-6">
                                <label for="cp">C.P.</label>
                                <div class="input-container">
                                    
                                    <input type="number" class="form-email contained-input" id="cp" placeholder="C.P.">
                                </div>
                            </div>
                            <div class="col-6">
                                <label for="entidad">Municipio</label>
                                <div class="input-container">
                                    
                                    <input type="text" class="form-email contained-input" id="municipio" placeholder="Municipio">
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin-bottom: 5%;">
                            <div class="col-6">
                                <label for="cp">Estado</label>
                                <div class="input-container">
                                    
                                    <input type="text" class="form-email contained-input" id="estado" placeholder="Estado">
                                </div>
                            </div>
                            <div class="col-6">
                                <label for="entidad">Pais</label>
                                <div class="input-container">
                                    
                                    <input type="text" class="form-email contained-input" id="pais" placeholder="Pais">
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin-bottom: 5%;">
                        <div class="col-6">
                            <input class="form-check-input" type="checkbox" value="" id="facturaCheck" onchange="chekboxFactura()">
                            <label class="form-check-label" for="facturaCheck">
                                ¿Facturar esta compra?
                            </label>
                        </div>
                        <div class="col-6">
                            <button type="button" id="button-factura" class="btn btn-success" data-toggle="modal" data-target="#pay-factura" onclick="">Datos de factura</button>
                        </div>
                    </div>
            </div>
            <span id="data-disclaimer"></span>
            <div class="row button-row">
                <div class="col">
                    <button type="button" class="btn btn-secondary btn-compra" onclick="pageOne()">Regresar</button>
                </div>
                <div class="col">
                    <button type="button" class="btn btn-success btn-compra" onclick="pageThree()">Continuar</button>
                </div>
            </div>
        </div>    
        <div class="" id="p-3">
            <div class="final-text-div">
                <span class="final-text">
                    Por favor asegurese que la informacion sea correcta y completa. Para continuar haga clic en el método de pago.
                </span>
            </div>
            <div class="row button-row">
                <div class="col">
                    <img src="<?php echo base_url(); ?>/assets/img/global/card_logo.png" id="comprar-card" class="comprar-img card">
                </div>
                <div class="col-12">
                    <p class="text-muted">Al realizar la compra se te enviará un correo electrónico con instrucciones para realizar el proceso de envio. Costo del envio NO incluido en la compra de esta página. Al comprar en esta tienda aceptas estas condiciones.</p>
                </div>
                <!--
                <div class="col">
                    <img src="<?php echo base_url(); ?>/assets/img/global/oxxo_logo.png" id="comprar-oxxo" class="comprar-img oxxo">
                </div>
                -->
            </div>
            <div class="row button-row">
                <div class="col">
                    <button type="button" class="btn btn-secondary btn-compra" onclick="pageTwo()">Regresar</button>
                </div>
                <div class="col">
                </div>
            </div>
        </div>
        <div class="" id="p-4" style="display: none">
            <div class="final-text-div">
                <span class="final-text">
                    Espere unos instantes...
                </span>
            </div>
            <div class="final-text-div">
                <span class="final-text">
                    ¿Obtuvo correctamente su ficha de pago de oxxo?
                </span>
            </div>
            <div class="row button-row">
                <div class="col">
                    <button type="button" class="btn btn-secondary btn-compra" onclick="pageThree()">No</button>
                </div>
                <div class="col">
                    <a href="https://store.dientesonriente.com/transaccion/oxxo"><button type="button" class="btn btn-primary btn-compra">Si</button></a>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="pay-factura" tabindex="-1" role="dialog" aria-labelledby="pay-factura" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="titulo titulo-panel">Datos de facturacion</h1>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="modalRestart()">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-panel">
                    <div class="row" style="margin-bottom: 5%;">
                        <div class="col-12">
                            <label for="nombre">Nombre</label>
                            <div class="input-container">
                                <input type="text" class="form-email contained-input" id="nombre-fact" placeholder="Nombre">
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-bottom: 5%;">
                            <div class="col-12">
                                <label for="email-fact">Email:</label>
                                <div class="input-container">               
                                    <input type="email" class="form-email contained-input" id="email-fact" placeholder="Email">
                                </div>
                            </div>
                        </div>
                    <div class="row" style="margin-bottom: 5%;">
                        <div class="col-6">
                            <label for="cp">R.F.C.</label>
                            <div class="input-container">
                                
                                <input type="text" class="form-email contained-input" id="rfc-fact" placeholder="R.F.C.">
                            </div>
                        </div>
                        <div class="col-6">
                            <label for="entidad">Razón social</label>
                            <div class="input-container">
                                
                                <input type="text" class="form-email contained-input" id="rs-fact" placeholder="Razón social">
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-bottom: 5%;">
                        <div class="col-12">
                            <label for="calle">Calle</label>
                            <div class="input-container">
                                <input type="text" class="form-email contained-input" id="calle-fact" placeholder="Calle">
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-bottom: 5%;">
                        <div class="col-6">
                            <label for="cp">N.I.</label>
                            <div class="input-container">
                                
                                <input type="text" class="form-email contained-input" id="ni-fact" placeholder="N.I.">
                            </div>
                        </div>
                        <div class="col-6">
                            <label for="entidad">N.E.</label>
                            <div class="input-container">
                                
                                <input type="text" class="form-email contained-input" id="ne-fact" placeholder="N.E.">
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-bottom: 5%;">
                        <div class="col-12">
                            <label for="colonia">Colonia</label>
                            <div class="input-container">
                                
                                <input type="text" class="form-email contained-input" id="colonia-fact" placeholder=Colonia>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-bottom: 5%;">
                        <div class="col-6">
                            <label for="cp">C.P.</label>
                            <div class="input-container">
                                
                                <input type="number" class="form-email contained-input" id="cp-fact" placeholder="C.P.">
                            </div>
                        </div>
                        <div class="col-6">
                            <label for="entidad">Municipio</label>
                            <div class="input-container">
                                
                                <input type="text" class="form-email contained-input" id="municipio-fact" placeholder="Municipio">
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-bottom: 5%;">
                        <div class="col-6">
                            <label for="cp">Estado</label>
                            <div class="input-container">
                                
                                <input type="text" class="form-email contained-input" id="estado-fact" placeholder="Estado">
                            </div>
                        </div>
                        <div class="col-6">
                            <label for="entidad">Pais</label>
                            <div class="input-container">
                                
                                <input type="text" class="form-email contained-input" id="pais-fact" placeholder="Pais">
                            </div>
                        </div>
                    </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="login-popup" tabindex="-1" role="dialog" aria-labelledby="login-popup" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="titulo titulo-panel">Iniciar sesión</h1>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="islogedBuy();modalRestart();">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <input type="email" class="form-control" id="correo" placeholder="ejemplo@contacto.com">
            <div class="invalid-feedback" id="invalid_correo">Ingresa un correo valido</div>
        </div>
        <div class="form-group">
            <input type="password" class="form-control" id="contraseña" placeholder="contraseña">
            <div class="invalid-feedback" id="invalid_contra">Ingresa tu contraseña</div>
        </div>
        <button class="btn btn-success" id="login">Iniciar Sesión</button>
        <p class="no-acount">¿Aun no tienes cuenta? | <a href="<?php echo base_url(); ?>/register">Registrate aquí</a></p>
        <p class="recover-password"><a href="<?php echo base_url(); ?>/recover-password">¿Olvidaste tu contraseña?</a></p>
      </div>
    </div>
  </div>
</div>
