

<?php require 'views/header.php'; ?>

    <main id="main">
        <div class="myform container">
            <form action="<?php echo constant('URL'); ?>form/end" method="post">
                <br>
                <div class="jumbotron">
                    <h3>Comentarios sobre la evaluación</h3>
                    <h3><?php echo $this->message; ?></h3>
                    <hr>

                    <label class="mylabel">¿Qué sugerencias o recomendaciones tienes para mejorar esta evaluación ?</label>
                    <br>
                    <div class="form-group">
                        <textarea class="form-control mytextarea" rows="3" placeholder="Tu respuesta.." name="comment" required></textarea>
                    </div>
                    <input type="submit" class="btn btn-success" value="Enviar mi commentario y terminar" />
                </div>
            </form> 
        </div>
    </main>

<?php require 'views/footer.php'; ?>