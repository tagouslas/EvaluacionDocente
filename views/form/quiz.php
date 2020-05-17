<?php require 'views/header.php'; ?>

    <main id="main">

        <div class="myform container">       
        <div class="jumbotron">
            <h3>Formulario : <?php echo $this->form->identification_num ?></h3>
        </div>
        <form action="<?php echo constant('URL'); ?>form/complete" method="post">
        <?php 
            include_once 'models/categoryClass.php';
            $i = 0;
            foreach ($this->categories as $row) {
                $category = new QCategory();
                $category = $row;
        ?>
            <fieldset>
            <br>
                <div class="jumbotron">
                    <h3><?php echo $category->value ?></h3>

                    <?php 
                    include_once 'models/questionClass.php';

                    foreach ($this->questions as $row) {
                        $question = new Question();
                        $question = $row;
                        
                        if ($question->category == $category->id) {
                        if ($question->type == 1){
                    ?>
                        
                        
                        <?php require 'views/form/radioResponse.php'; ?>
                        
                        <?php }else if ($question->type == 2){ ?>            
                        
                        <?php require 'views/form/textResponse.php'; ?> 
                        
                    <?php } } } ?>
                </div>
        <?php }?>
            <input type="submit" class="btn btn-success" value="Enviar sus respuestas" />
        </form>



        </div>
        <br>
    </main>

<?php require 'views/footer.php'; ?>