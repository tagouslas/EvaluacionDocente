<?php require 'views/header.php'; ?>

    <main id="main">
    
        <div class="myform container">       
            <?php require 'views/form/step1.php'; ?>     
                    
        </div>
        <br>
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