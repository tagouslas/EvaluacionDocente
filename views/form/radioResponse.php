
<br>
<p><strong><?php echo $question->value ?></strong></p>

<div class="custom-control custom-radio">
  <input type="radio" id="r<?php echo $i; ?>" name="response<?php echo $i; ?>" class="custom-control-input" value="Totalmente de acuerdo" required>
  <label class="custom-control-label" for="r<?php echo $i; ?>">Totalmente de acuerdo</label>
</div>

<div class="custom-control custom-radio">
  <input type="radio" id="r<?php echo $i+10000; ?>" name="response<?php echo $i; ?>" class="custom-control-input" value="De acuerdo" required>
  <label class="custom-control-label" for="r<?php echo $i+10000; ?>">De acuerdo</label>
</div>

<div class="custom-control custom-radio">
  <input type="radio" id="r<?php echo $i+20000; ?>" name="response<?php echo $i; ?>" class="custom-control-input" value="Ni de acuerdo ni en desacuerdo" required>
  <label class="custom-control-label" for="r<?php echo $i+20000; ?>">Ni de acuerdo ni en desacuerdo</label>
</div>

<div class="custom-control custom-radio">
  <input type="radio" id="r<?php echo $i+30000; ?>" name="response<?php echo $i; ?>" class="custom-control-input" value="En desacuerdo" required>
  <label class="custom-control-label" for="r<?php echo $i+30000; ?>">En desacuerdo</label>
</div>

<div class="custom-control custom-radio">
  <input type="radio" id="r<?php echo $i+40000; ?>" name="response<?php echo $i; ?>" class="custom-control-input" value="Totalmente en desacuerdo" required>
  <label class="custom-control-label" for="r<?php echo $i+40000; ?>">Totalmente en desacuerdo</label>
</div>


<?php $i++; ?>
