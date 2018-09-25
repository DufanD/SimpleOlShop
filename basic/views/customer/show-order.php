<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CustomerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Order History';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customer-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php
    $dataProvider2 = new \yii\data\ActiveDataProvider([
        'query' => $dataProvider,
        'pagination' => [
            'pageSize' => 20,
        ],
    ]);
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider2,
        'filterModel' => $searchModel,
        'columns' => [
            'id',
            'date:datetime',
            'customer.nama',
            [
                'label' => 'Daftar Items',
                'class' => 'yii\grid\DataColumn',
                'format' => 'html',
                'value' => function($data) {
                    $value="<ul>";
                    foreach ($data->orderItems as $orderItem) {
                        $value .= "<li>".$orderItem->item->name."</li>";
                    }
                    $value.="</ul>";
                    return $value;
                },
            ],
            /*['class' => 'yii\grid\ActionColumn'],*/
        ],
    ]);

    ?>
</div>