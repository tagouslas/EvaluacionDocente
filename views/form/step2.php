<?php 
    include_once 'models/qcategory.php';
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
            include_once 'models/question.php';

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
            
        <input type="button"  class="previous btn btn-secondary" value="Previous" />
        <input type="button"  class="next btn btn-info" value="Next" />
    </fieldset>
<?php }?>