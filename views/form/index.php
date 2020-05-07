<?php require 'views/header.php'; ?>

    <main id="main">
        <div class="container">
            <h1 class="center">Evaluación Docente - Universitaria Virtual Internacional</h1>
        </div>
        
        <div class="myform container ">
            
            <br>
            <!-- Sección Descripción -->
            <div class="jumbotron">
                <div class="container justify">
                    <h3>Apreciado docente-tutor,</h3>
                    <br>
                    <p>La siguiente autoevaluación nos permitirá conocer la percepción de tu desempeño y acompañamiento en el proceso formativo de nuestros estudiantes. Tus respuestas nos servirán para diseñar e implementar acciones que mejoren la calidad educativa de la Universitaria Virtual Internacional.</p>
                    <br>
                    <p>Para cada enunciado, responde si refleja el trabajo que realizas como docente-tutor, seleccionando una de las opciones de la siguiente escala:</p>
                    <ul class="container">
                        <li>Totalmente de acuerdo</li>
                        <li>De acuerdo</li>
                        <li>Ni de acuerdo ni en desacuerdo</li>
                        <li>En desacuerdo</li>
                        <li>Totalmente en desacuerdo</li>
                    </ul>
                    <p>Muchas gracias.</p>
                    <p>Cordialmente,</p>
                    <p>Universitaria Virtual Internacional</p>
                </div>
            </div>
            <!-- Fín de la Sección Descripción -->


            <div class="jumbotron">
                <h3>Sus Datos</h3>
                <hr>
                <form action="<?php echo constant('URL'); ?>form/firstStep" method="POST">
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
                    <input type="submit" class="btn btn-primary" value="submit">
                </form>
            </div>
                
        </div>
    </main>

<?php require 'views/footer.php'; ?>