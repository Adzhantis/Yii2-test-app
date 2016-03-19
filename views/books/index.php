<?php

use yii\helpers\Html;
use yii\grid\GridView;

?>
<div class="books-index">

    <p>
        <?= Html::a('Create Books', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            [
                'attribute' => 'preview',
                'format'    => 'raw',
                'value'     => function ($model) {
                    return "<a href='$model->preview' rel='lightbox'>
                                <img width='20' height='20' src='$model->preview'>
                            </a>";
                },
            ],
            [
                'attribute' => 'date_create',
                'format'    => 'date',
            ],
            [
                'attribute' => 'date_update',
                'format'    => 'date',
            ],
            // 'date',
            // 'author_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
