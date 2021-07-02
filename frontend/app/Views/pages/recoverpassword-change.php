

<div class="recover-div" id="step-one">
    <h1 class="titulo">Ingresa una nueva contraseña</h1>
    <div class="row" style="margin-top: 10%;">
        
        <div class="col-12">
            <div class="input-container step-two-div">
                <img src="<?php echo base_url(); ?>/assets/img/global/input-password.png" class="input-img">
                <input type="password" class="form-email contained-input" id="psw" placeholder="Contraseña nueva">
            </div>
            
        </div>
        <div class="col-12">
            <div class="input-container step-two-div">
                <img src="<?php echo base_url(); ?>/assets/img/global/input-password.png" class="input-img">
                <input type="password" class="form-email contained-input" id="psw2" placeholder="Repetir contraseña">
            </div>
            
        </div>
        <div class="col-12">
            <button class="btn btn-login" id="login" onclick="sendRecoveryCode()">
                <img src="<?php echo base_url(); ?>/assets/img/global/arrow.png" class="button-img">
                Enviar Código
            </button>
        </div>
    </div>
    <input type="hidden" id="code" name="" <?php echo 'value="'.$c.'"';  ?> >
</div>