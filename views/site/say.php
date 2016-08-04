<?php
/*
 * Тестовый шаблон.
 *
 */
use yii\helpers\Html;


$num = 1;
  while ($num < 100):
    $num +=1;
?>
    <!-- чертим линии -->
    <hr />
  <?php endwhile; ?>

<?= Html::encode($message) ?>
 World
