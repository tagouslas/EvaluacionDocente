<?php require 'views/header.php'; ?>

    <main id="main">
        <br>
        <div class="container">
            <h1 class="center">Evaluación Docente - Universitaria Virtual Internacional</h1>
        </div>

        <div class="container center">
            <?php echo $this->message; ?>
        </div>
        
        <div class="myform container">
            
            
            <form id="regiration_form" action="<?php echo constant('URL'); ?>form/firstStep" method="POST">
                <fieldset>
                    <?php require 'views/form/step1.php'; ?>
                    
                    <input type="button" class="next btn btn-info" value="Next" />
                    
                </fieldset>
                

                <?php 
                        include_once 'models/q_category.php';

                        foreach ($this->qcategories as $row) {
                        $qcategory = new QCategory();
                        $qcategory = $row;
                    ?>
                <fieldset>
                    
                        <?php require 'views/form/step2.php'; ?>
                        <input type="button"  class="previous btn btn-secondary" value="Previous" />
                        <input type="button"  class="next btn btn-info" value="Next" />
                    
                </fieldset>
                <?php }?>

            </form>
            <br>          
        </div>
    </main>

<?php require 'views/footer.php'; ?>

<style type="text/css">
        #regiration_form fieldset:not(:first-of-type) {
            display: none;
        }
</style>

<script>
        $(document).ready(function () {
            var current = 1, current_step, next_step, steps;
            steps = $("fieldset").length;
            $(".next").click(function () {
                current_step = $(this).parent();
                next_step = $(this).parent().next();
                next_step.show();
                current_step.hide();
                setProgressBar(++current);
            });
            $(".previous").click(function () {
                current_step = $(this).parent();
                next_step = $(this).parent().prev();
                next_step.show();
                current_step.hide();
                setProgressBar(--current);
            });
            setProgressBar(current);
            // Change progress bar action
            function setProgressBar(curStep) {
                var percent = parseFloat(100 / steps) * curStep;
                percent = percent.toFixed();
                $(".progress-bar")
                        .css("width", percent + "%")
                        .html(percent + "%");
            }
        });
    </script>