<div class="recover-div" id="step-one">
    <h1 class="titulo">¿Has olvidado tu contraseña?</h1>
    <div class="row" style="margin-top: 10%;">
        <div class="col">
            <div class="input-container">
                <img src="<?php echo base_url(); ?>/assets/img/global/email2.png" class="input-img">
                <input type="email" class="form-email contained-input" id="email" placeholder="ejemplo@contacto.com">
            </div>
            
        </div>
        <div class="col">
            <button class="btn btn-login" id="login" onclick="createRecovery()">
                <img src="<?php echo base_url(); ?>/assets/img/global/arrow.png" class="button-img">
                Enviar Código
            </button>
        </div>
    </div>
    <div id="response-space">
        <span id="resultado">
            
        </span>
    </div>
</div>

