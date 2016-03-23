<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View            $this
 * @var yii\widgets\ActiveForm  $form
 * @var app\models\BookSearch   $model
 * @var array                   $authors
 */
?>

<div class="book-search">

    <?php $form = ActiveForm::begin([
        'id' => 'filter-form',
        'action' => ['index'],
        'method' => 'get',
    ]); ?>


        <div class="panel panel-info">
            <div class="panel-heading">
                Фильтр
            </div>
            <div class="panel-body">

                <table class="table">

                    <tr>
                        <td>
                            <?= $form->field($model, 'name') ?>
                        </td>
                        <td>
                            <?= $form->field($model, 'author_id')->dropDownList($authors, ['prompt'=>'Select...']) ?>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <?= $form->field($model, 'date_start')->textInput(['type' => 'date']) ?>
                        </td>
                        <td>
                            <?= $form->field($model, 'date_end')->textInput(['type' => 'date']) ?>
                        </td>
                    </tr>

                </table>

            </div>
            <div class="panel-footer" style="float: right">
                <?= Html::submitButton('Фильтр', ['class' => 'btn btn-primary']) ?>
            </div>
        </div>


    <?php ActiveForm::end(); ?>

</div>