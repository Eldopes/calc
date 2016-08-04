<?php
/*
 * Модель для сохранения расхода топлива и цены . Вызывается из FuelController-а
 *
 */

namespace app\models;

use Yii;
use yii\base\Model;

class FuelForm extends Model
{
  public $from;
  public $to;
  public $consumption;
  public $cost;


  public function rules()
  {
    return [

      [['cost', 'consumption'], 'required']

    ];
  }
}
