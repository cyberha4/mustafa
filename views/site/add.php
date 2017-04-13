<?php

/* @var $this yii\web\View */
/* @var $model app\models\UploadForm */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <?php
    use app\models\Files;
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
    ?>

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

    <?= $form->field($model, 'imageFile')->fileInput() ?>

    <?= $form->field($model, 'fileName') ?>

    <?= $form->field($model, 'category')->DropDownList(Files::getCategoriesArray()) ?>

    <?= Html::submitButton('submit', ['class' => 'btn btn-primary']) ?>

    <?php ActiveForm::end() ?>

</div>
