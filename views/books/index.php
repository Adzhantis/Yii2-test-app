<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;

?>
<div class="books-index">

    <?php echo $this->render('_search', [
        'model' => $searchModel,
        'authors' => $authors
    ]); ?>

<!--    <p>--><?//= Html::a('Create Books', ['update'], ['class' => 'btn btn-success']) ?><!--</p>-->

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => \app\models\Books::getGridColumns(),
    ]);

    Modal::begin(['id' => 'view-book']);
    Modal::end();


?>

</div>
