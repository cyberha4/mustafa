<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\models\FILES;
use yii\helpers\Url;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    /*NavBar::begin([
        'brandLabel' => 'My Company',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Home', 'url' => ['/site/index']],
            ['label' => 'About', 'url' => ['/site/about']],
            ['label' => 'Contact', 'url' => ['/site/contact']],
            Yii::$app->user->isGuest ? (
                ['label' => 'Login', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
    NavBar::end();*/
    ?>

    <style>
    ul{height:40px; padding:0; margin:0; list-style:none}
  li{ display:table; height:40px; width:150px; margin-right:1%; background:orange;}
  li[class='horiz'] {float:left;}
  li[class='vertical']{ margin-bottom: 20px; color:red; width:150px; background:yellow;}
    a{display:table-cell; color:#303CCE; text-decoration:none; vertical-align:middle; text-align:center; font: 0.8em/1.25 Tahoma}
    div #main_menu{margin-bottom: 50px;}
</style>
    


    <div class="container">
    <div id = "main_menu">
    <ul>
        <li class = 'horiz'><a href="#">Лабораторный материал!</a></li>
        <li  class = 'horiz'><a href="#">Лабораторные задания</a></li>
        <li class = 'horiz'><a href="#">Специализированное програмное обеспечение</a></li>
        <li class = 'horiz'><a href="#">Настройка протоколов</a></li>
        <?= !Yii::$app->user->isGuest ? '<button href="'.Url::toRoute(['site/add', 'category' => 'documents']).'">Добавить док</button>':'' ?>
        <?= !Yii::$app->user->isGuest ? Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton('Выйти') . Html::endForm()
            :'' ?>

    </ul>
    </div>
    
    <?= Url::base(true); ?>

    <div class="row">
        <div class="col-md-2 col-sm-3 col-xs-4">
        <ul>
            <li class = 'vertical'><a href="<?= Url::toRoute(['site/files', 'category' => 'documents']) ?>">Справочник команд</a></li>
            <li  class = 'vertical'><a href="<?= Url::toRoute(['site/files', 'category' => 'commands']) ?>">Документация</a></li>
            <li class = 'vertical'><a href="#">Примеры подключения коммутаторов</a></li>
        </ul>
        </div>
        
        <div class="col-md-10 col-sm-9 col-xs-8">
        <?= $content ?>
        </div>
    </div>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right">!</p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
