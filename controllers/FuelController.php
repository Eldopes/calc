<?php
/*
 *
 * Контроллер для рассчёта расхода топлива
 *
 **/

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\FuelForm; // подключаем форму для запроса расхода топлива

class FuelController extends Controller
{

  public function actionFuel() // Экшн для рендера страницы с формой
  {
      $from = 'Москва';
      $to = 'Париж';
      $distance = 2853;

       $model = new FuelForm(); // Новый экземпляр класса Fuelform, заданного в models/Fuelform.php

    //  if ($model->load(Yii::$app->request->post()) && $model->validate()) {

        return $this->render('fuel', [ // рендерит щаблон "fuel"

          'from' => $from, // передаёт переменные в шаблон
          'to' => $to,
          'distance' => $distance,
          'model' => $model //  используем модель  для валидации шаблона
        ]);


      /*    else{

        return $this->render('form', [ // рендерит щаблон "fuel"
          'startPoint' => $startPoint, // передаёт переменные в шаблон
          'endPoint' => $endPoint,
          'distance' => $distance,

        ]);
      }
    } */
  }

  public function actionPost() // Экшн для отправки формы
  {
    if(isset($_POST['name']) && isset($_POST['age'])) {
    $name = $_POST['name'];
    $age = $_POST['age'];
    return "Success, name is $name and age is $age.";
    } else {
    return 'Success, but we can not get the name and age.';
    }
  }




}
