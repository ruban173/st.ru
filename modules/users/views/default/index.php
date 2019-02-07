<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $searchModel app\models\entities\UsersProfilesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Профиль';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users-profiles-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать ', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::button('Загрузить несколько ', ['id' => 'btn-load-students', 'class' => 'btn btn-warning']) ?>
        <?= Html::a('Очистить ', ['create'], ['class' => 'btn btn-danger']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'first_name',
            'middle_name',
            'last_name',
            'birdthday',
            //'date_up',
            //'group',
            //'active',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
<?php

Modal::begin([
    'id' => 'modal-student',
    'header' => '<h2>Загрузка студентов</h2>',
    //  'footer' => 'Низ окна',
]);
echo Html::textarea('students',  '', ['id'=>'list-students','class' => 'form-control', 'rows' => 15]);

echo '<br>';
echo Html::button('Загрузить', ['id' => 'btn-load-students', 'class' => 'btn btn-warning']);


Modal::end();
?>
<?php
$js = <<<JS
     $('#btn-load-students').on('click', function(){
   var list = $('#list-students').val();
   $.ajax({
      url: '/users/listStudentAjax',
      type: 'POST',
      data: {list:list},
      success: function(res){
         console.log(res);
      },
      error: function(){
         alert('Error!');
      }
   });
   return false;
     });
JS;

$this->registerJs($js);
?>
