
<form id="registration_form" action="<?php echo constant('URL'); ?>login/verifUser" method="POST">

    <?php echo $this->message; ?>

        <h3>Sus Datos</h3>
        <hr>

        <div class="form-group">
            <input type="email" placeholder="Su correo" class="form-control myinput" name="login" required>
        </div>
        <div class="form-group">
            <input type="password" placeholder="Su contraseña" class="form-control myinput"name="password" required>
        </div>

    <input type="submit" class="btn btn-primary" value="Ingresar" />
</form>