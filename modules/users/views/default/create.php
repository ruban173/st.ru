<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\entities\UsersProfiles */

$this->title = 'Создать ';
$this->params['breadcrumbs'][] = ['label' => 'Профили ', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users-profiles-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
