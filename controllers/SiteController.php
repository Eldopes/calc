<?php
/* Рендерит вьюхи из директории site */
namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\EntryForm; // подключаем нашу дополнительную модель

class SiteController extends Controller
{
  public function behaviors()
  {
    return [
      'access' => [
        'class' => AccessControl::className(),
        'only' => ['logout'],
        'rules' => [
            [
              'actions' => ['logout'],
              'allow' => true,
              'roles' => ['@'],
            ],
        ],
      ],
      'verbs' => [
        'class' => VerbFilter::className(),
        'actions' => [
          'logout' => ['post'],
        ],
      ],
    ];
  }

  public function actions()
  {
    return [
      'error' => [
          'class' => 'yii\web\ErrorAction',
      ],
      'captcha' => [
          'class' => 'yii\captcha\CaptchaAction',
          'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
      ],
    ];
  }

  public function actionIndex()
  {
    return $this->render('index');
  }

  public function actionLogin()
  {
    if (!Yii::$app->user->isGuest) {
      return $this->goHome();
    }

    $model = new LoginForm();
    if ($model->load(Yii::$app->request->post()) && $model->login()) {
      return $this->goBack();
    }
    return $this->render('login', [
      'model' => $model,
    ]);
  }

  public function actionLogout()
  {
    Yii::$app->user->logout();

    return $this->goHome();
  }

  public function actionContact()
  {
    $model = new ContactForm();
    if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
      Yii::$app->session->setFlash('contactFormSubmitted');

      return $this->refresh();
    }
    return $this->render('contact', [
      'model' => $model,
    ]);
  }

  public function actionAbout()
  {
    return $this->render('about');
  }


  /* Далее - новые тестовые функции */

  public function actionSay($message = 'Hello'){
    // тестовая экшн функция - передаёт аргумент ( в данном случае сообщение $message - в шаблон 'say')
    return $this->render('say', ['message' => $message]);
  }

  public function actionGay(){
    // рендерит шаблон 'gay'
    return $this->render('gay');
  }

  public function actionEntry(){ // показывает юзеру инфу ввода, если введена правильно, или ошибки - если неправильно
    // Вызывает модель (создает EntryForm-объект)
    $model = new EntryForm();

      //пробуем заполнить $model из модели EntryForm (то есть из того. что ввёл юзер, если HTML-форма была submitted)
      if ($model->load(Yii::$app->request->post()) && $model->validate()) { // valid data received in $model

        // do something meaningful here about $model ...

        return $this->render('entry-confirm', ['model' => $model]); // если успешно, то юзеру показываем шаблон entry-confirm, где он увидит, что засубмитил успешно
      } else {
        return $this->render('entry', ['model' => $model]); // если проблема. то показываем другую модель, в которой показываем ошибки
      }

  }




}
