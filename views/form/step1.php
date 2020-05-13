<fieldset>
<form id="regiration_form" action="<?php echo constant('URL'); ?>form/complete" method="POST">

    <?php echo $this->message; ?>
    
    <div class="jumbotron">
        <h3>Sus Datos</h3>
        <hr>

        <div class="form-group">
            <label for="inputEmail1" class="mylabel">Correo electrónico:</label>
            <input type="email" placeholder="Su correo" class="form-control myinput" id="inputEmail1" name="mail" required>
        </div>
        <div class="form-group">
            <label for="inputNumID" class="mylabel">Número de identificación (sin puntos ni comas):</label>
            <input type="text" placeholder="Su numero" class="form-control myinput" id="inputNumID" name="idnum" required>
        </div>
        <div class="form-group">
            <label for="programSelect">Selecciona tu Programa académico:</label>
            <select class="form-control myinput" id="programSelect" name="program" required>
                <option>Administración de Empresas</option>
                <option>Diseño Gráfico Digital</option>
                <option>Publicidad</option>
                <option>Inglés - Centro Virtual de Idiomas</option>
                <option>Bienestar</option>
            </select>
        </div>
        <div class="form-group">
            <label for="inputNombre" class="mylabel">Su nombre:</label>
            <input type="text" placeholder="Su nombre" class="form-control myinput" id="inputNombre" name="name" required>
        </div>
    </div>

    <input type="submit" class="btn btn-success" value="Verificar sus datos" />
</form>
    <?php echo $this->next; ?>
</fieldset>