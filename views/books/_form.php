<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Books */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="books-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'image')->fileInput(); ?>

   
    <?= \kartik\date\DatePicker::widget([
    'name' => 'check_issue_date',
    'value' => date("Y-m-d H:i:s", $model->date),
    'options' => ['placeholder' => 'Select issue date ...'],
    'pluginOptions' => [
    'format' => 'dd-M-yyyy',
    'todayHighlight' => true
    ]
    ]);?>

    <?= $form->field($model, 'author_id')->dropDownList($authors) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
