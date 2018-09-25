<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use app\models\User;

$this->title = 'Checkout';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php if (count(User::findOne(Yii::$app->user->id)->customer)>=1) { ?>
        <p>To Do : checkout page</p>

    <?php } else {
        echo Html::a('Create Customer first',['/customer/create'],['class'=>'btn btn-warning']);
    } ?>
</div>