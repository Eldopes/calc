<?php
/*
 * Шаблон вызывается из SiteController функцией  actionEntry()
 * Показывает юзеру форму с полями для ввода
 *
 **/

use yii\helpers\Html;
use yii\widgets\ActiveForm; // Этот виджет извлекает правила валидации, определённые в EntryForm, трансформирует в javascript, и использует для валидации
?>

<?php $form = ActiveForm::begin(); ?> <!-- Используем готовый виджет ActiveForm для создания HTML-формы  -->

  <?= $form->field($model, 'name') ->label('Your Name') ?> <!-- Используем готовый метод field(), который генерит инпуты  -->

  <?= $form->field($model, 'email') ->label('Your Email') ?>

  <div class="form-group">
    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?> <!-- Генерим кнопку Submit -->
  </div>

<?php ActiveForm::end(); ?>
