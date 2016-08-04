<?php
// Шаблон содержит главную страницу для расчёта стоимости поездки
use yii\helpers\Html;
use yii\widgets\ActiveForm; // Этот виджет извлекает правила валидации, определённые в EntryForm, трансформирует в javascript, и использует для валидации

use yii\web\JsExpression; // (copy / paste)
use yii\helpers\Url;


$this->registerJsFile("https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js");
$this->registerJsFile('@web/js/fuel/fuel.js'); // подключаем js файл
$this->registerCssFile('@web/css/fuel/fuel.css');
?>


<div class="fuel">
<h1>Calculate trip fuel cost based on distance</h1>
<hr />

  <div class="fuel-input">

    <?php $form = ActiveForm::begin(); ?> <!-- Используем готовый виджет ActiveForm для создания HTML-формы  -->

      <?= $form->field($model, 'from') ->label("From") ->textInput(array('placeholder' => $from)) ?>
      <?= $form->field($model, 'to') ->label('To') ->textInput(array('placeholder' => $to)) ?>

      <div class="form-group">
        <?= Html::Button('Calculate distance', ['class' => 'btn btn-primary', 'id' => 'calculate-distance']) ?> <!-- Генерим кнопку Calculate distance -->
      </div>

        <div class="distance">
          <b>Distance: </b> <span id="distance-number"></span>
        </div>

        <hr />

      <?= $form->field($model, 'consumption') ->label("Consumption") ?> <!-- Используем готовый метод field(), который генерит инпуты  -->
      <?= $form->field($model, 'cost') ->label('Fuel cost') ?>

      <div class="form-group">
        <?= Html::submitButton('Calculate cost', ['class' => 'btn btn-primary', 'id' => 'calculate-cost', 'onclick'=>'js:sendDistance()']) ?> <!-- Генерим кнопку Calculate cost -->
      </div>

      <hr />
      <div class="calculation-result">
        <b>Total trip cost: </b>
          <p class="result-number">
             23
          </p>
      </div>

    <?php ActiveForm::end(); ?>


  </div>


</div>
