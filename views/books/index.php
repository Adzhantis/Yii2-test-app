<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;

?>
<div class="books-index">

    <p>
        <?= Html::a('Create Books', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => \app\models\Books::getGridColumns()
    ]);

    Modal::begin(['id' => 'view-book']);
    Modal::end();


?>

</div>
