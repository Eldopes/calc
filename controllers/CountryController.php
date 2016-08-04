<?php
/*
 *
 * Контроллер для отображения результатов вывода из таблицы Country (db yii2basic)
 *
 **/

namespace app\controllers;

use yii\web\Controller;
use yii\data\Pagination; // подключает Pagination для создания кнопок и постраничного вывода данных
use app\models\Country; // указывает на используемую контроллером модель

class CountryController extends Controller
{
    public function actionIndex()
    {
        $query = Country::find(); // Метод ActiveRecord, выполняет запрос и загружает данные из табл. Country

        $pagination = new Pagination([
            'defaultPageSize' => 5, // В зависимости от лимита отображения записей - идёт выборка нужного количества данных.
            'totalCount' => $query->count(), // если данных слишком много - виджет создаёт страницы со списком
        ]);

        $countries = $query->orderBy('name')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('index', [ // рендерит щаблон "index"
            'countries' => $countries, // передаёт переменные в шаблон
            'pagination' => $pagination,
        ]);
    }
}
