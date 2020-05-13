
<?php require 'views/header.php';?>

<main id="main">
    <div class="container">
        
        <div class="jumbotron center">
            <h1 class="mytitle">Bienvenido al Evaluación Docente</h1>
        </div>

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
                <p>
                    <img src="<?php echo constant('URL'); ?>public/img/uvirtuallogo2.png" alt="" width="50px" height="auto">
                    Universitaria Virtual Internacional 
                </p>
                
            </div>
            <a class="btn btn-success" href="<?php echo constant('URL'); ?>form">Empezar un nuevo formulario</a>
        </div>
        <!-- Fín de la Sección Descripción -->

    </div>
</main>

<?php require 'views/footer.php';?>
