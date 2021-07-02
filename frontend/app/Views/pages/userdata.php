<div class="container-fluid" style="padding: 10vh 0; position: relative;">
<div style="position: absolute; top: 0; bottom: 0; left: 0; right: 0; height: 100%; z-index: -100;" id="particles-js"></div>
    <div class="row p-md-5 p-sm-4 p-3">
        <div class="col-12">
            <h2 class="text-primary text-uppercase text-center">Mis datos</h2>
        </div>
    </div>


    <div class="row p-md-5 p-sm-4 p-3">
        <div class="col-12">
            <!-- Tabs navs -->
            <ul class="nav nav-tabs nav-justified mb-3" id="ex1" role="tablist">
            <li class="nav-item" role="presentation">
                <a
                class="nav-link active"
                id="ex3-tab-1"
                data-mdb-toggle="tab"
                href="#ex3-tabs-1"
                role="tab"
                aria-controls="ex3-tabs-1"
                aria-selected="true"
                >Cambiar contraseña</a
                >
            </li>
            <li class="nav-item" role="presentation">
                <a
                class="nav-link"
                id="ex3-tab-2"
                data-mdb-toggle="tab"
                href="#ex3-tabs-2"
                role="tab"
                aria-controls="ex3-tabs-2"
                aria-selected="false"
                >Datos de envío</a
                >
            </li>
            <li class="nav-item" role="presentation">
                <a
                class="nav-link"
                id="ex3-tab-3"
                data-mdb-toggle="tab"
                href="#ex3-tabs-3"
                role="tab"
                aria-controls="ex3-tabs-3"
                aria-selected="false"
                >Datos de facturación</a
                >
            </li>
            </ul>
            <!-- Tabs navs -->

            <!-- Tabs content -->
            <div class="tab-content" id="ex2-content">
            <div
                class="tab-pane fade show active"
                id="ex3-tabs-1"
                role="tabpanel"
                aria-labelledby="ex3-tab-1"
            >
                <div class="row">
                    <div class="col-md-6 col-sm-10 col-12 offset-md-3 offset-sm-1 offset-0">
                        <h5 class="text-primary text-center text-uppercase">Cambiar contraseña</h5>
                    </div>
                    <div class="col-md-6 col-sm-10 col-12 offset-md-3 offset-sm-1 offset-0 text-center p-3">
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="oldpsw" placeholder="Contraseña actual">
                            <label for="oldpsw">Contraseña actual</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="hidden" id="usr_id" name="" value="0">
                            <input type="password" class="form-control" id="psw" placeholder="Nueva contraseña">
                            <label for="psw">Nueva contraseña</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="psw2" placeholder="Confirmar nueva contraseña">
                            <label for="psw2">Confirmar nueva contraseña</label>
                        </div>
                        <button class="btn btn-primary mt-3" id="login">Cambiar contraseña</button>
                    </div>
                </div>
            </div>
            <div
                class="tab-pane fade"
                id="ex3-tabs-2"
                role="tabpanel"
                aria-labelledby="ex3-tab-2"
            >
                <div class="row">
                    <div class="col-md-6 col-sm-10 col-12 offset-md-3 offset-sm-1 offset-0">
                        <h5 class="text-primary text-center text-uppercase">Cambiar datos de envío</h5>
                    </div>
                    <div class="col-md-6 col-sm-10 col-12 offset-md-3 offset-sm-1 offset-0 text-center p-3">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="nombre" placeholder="Nombre completo">
                                    <label for="nombre">Nombre completo</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating mb-3">
                                    <input type="phone" class="form-control" id="telefono" placeholder="Número de teléfono">
                                    <label for="telefono">Número de teléfono</label>
                                </div>
                            </div>
                            <div class="col-sm-6 col-12">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="calle" placeholder="Calle">
                                    <label for="calle">Calle</label>
                                </div>
                            </div>
                            <div class="col-sm-3 col-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="ne" placeholder="Número exterior">
                                    <label for="ne">N.E.</label>
                                </div>
                            </div>
                            <div class="col-sm-3 col-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="ni" placeholder="Número interior">
                                    <label for="ni">N.I.</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="cp" placeholder="Código postal">
                                    <label for="cp">C.P.</label>
                                </div>
                            </div>
                            <div class="col-6 d-flex align-items-center">
                                <div class="form-floating mb-3">
                                    <button type="button" style="float: left" class="btn btn-outline-primary" onclick="validarCPenvio()">Validar</button>
                                </div>
                            </div>
                            <div class="col-sm-6 col-12">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="pais" placeholder="País">
                                    <label for="pais">País</label>
                                </div>
                            </div>
                            <div class="col-sm-6 col-12">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="estado" placeholder="Estado">
                                    <label for="estado">Estado</label>
                                </div>
                            </div>
                            <div class="col-sm-6 col-12">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="municipio" placeholder="Municipio">
                                    <label for="municipio">Municipio</label>
                                </div>
                            </div>
                            <div class="col-sm-6 col-12">
                                <div class="form-floating mb-3">
                                    <select class="form-select form-select-lg mb-3" id="colonia" aria-label=".form-select-lg example">
                                        <option selected>Selecciona C.P.</option>
                                    </select>
                                    <label for="colonia">Colonia</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="button" class="btn btn-primary" onclick="updateSending()">Guardar</button>
                            </div>
                        </div>                        
                    </div>
                </div>
            </div>
            <div
                class="tab-pane fade"
                id="ex3-tabs-3"
                role="tabpanel"
                aria-labelledby="ex3-tab-3"
            >
                <div class="row">
                    <div class="col-md-6 col-sm-10 col-12 offset-md-3 offset-sm-1 offset-0">
                        <h5 class="text-primary text-center text-uppercase">Cambiar datos de facturación</h5>
                    </div>
                    <div class="col-md-6 col-sm-10 col-12 offset-md-3 offset-sm-1 offset-0 text-center p-3">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="nombre-fact" placeholder="Nombre completo">
                                    <label for="nombre-fact">Nombre completo</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" id="email-fact" placeholder="Correo electrónico">
                                    <label for="email-fact">Correo electrónico</label>
                                </div>
                            </div>
                            <div class="col-sm-6 col-12">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="rfc-fact" placeholder="R.F.C.">
                                    <label for="rfc-fact">R.F.C.</label>
                                </div>
                            </div>
                            <div class="col-sm-6 col-12">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="rs-fact" placeholder="Razón social">
                                    <label for="rs-fact">Razón social</label>
                                </div>
                            </div>
                            <div class="col-sm-6 col-12">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="calle-fact" placeholder="Calle">
                                    <label for="calle-fact">Calle</label>
                                </div>
                            </div>
                            <div class="col-sm-3 col-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="ne-fact" placeholder="Número exterior">
                                    <label for="ne-fact">N.E.</label>
                                </div>
                            </div>
                            <div class="col-sm-3 col-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="ni-fact" placeholder="Número interior">
                                    <label for="ni-fact">N.I.</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="cp-fact" placeholder="Código postal">
                                    <label for="cp-fact">C.P.</label>
                                </div>
                            </div>
                            <div class="col-6 d-flex align-items-center">
                                <div class="form-floating mb-3">
                                    <button type="button" style="float: left" class="btn btn-outline-primary" onclick="validarCPenvio('-fact')">Validar</button>
                                </div>
                            </div>
                            <div class="col-sm-6 col-12">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="pais-fact" placeholder="País">
                                    <label for="pais-fact">País</label>
                                </div>
                            </div>
                            <div class="col-sm-6 col-12">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="estado-fact" placeholder="Estado">
                                    <label for="estado-fact">Estado</label>
                                </div>
                            </div>
                            <div class="col-sm-6 col-12">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="municipio-fact" placeholder="Municipio">
                                    <label for="municipio-fact">Municipio</label>
                                </div>
                            </div>
                            <div class="col-sm-6 col-12">
                                <div class="form-floating mb-3">
                                    <select class="form-select form-select-lg mb-3" id="colonia-fact" aria-label=".form-select-lg example">
                                        <option selected>Selecciona C.P.</option>
                                    </select>
                                    <label for="colonia-fact">Colonia</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="button" class="btn btn-primary" onclick="updateFacturing()">Guardar</button>
                            </div>
                        </div>                        
                    </div>
                </div>
            </div>
            </div>
            <!-- Tabs content -->
        </div>
    </div>
</div>
