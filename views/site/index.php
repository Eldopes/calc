<?php
/*
 * ШАБЛОН ЗАГЛАВНОЙ СТРАНИЦЫ САЙТА.
 *
 */

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<style>
.btn-default{
  margin-top: 30px;
}
</style>

<div class="site-index">

    <div class="jumbotron">
        <h1>Eldo Calc</h1>

        <p class="lead">User-designed calculators for any needs</p>

      <!--  <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p> -->
    </div>
    <hr  />
    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>Transport</h2>

                <p>Fuel cost calculation and so much more..</p>

                <p><a class="btn btn-default" href="">Browse &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Gaming</h2>

                <p>Use these to calculate stats in your favourite games</p>

                <p><a class="btn btn-default" href="">Browse &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Other</h2>

                <p>In development..</p>

                <p><a class="btn btn-default" href="">Browse &raquo;</a></p>
            </div>
        </div>

    </div>
  <hr  />
</div>
