<?php
use yii\bootstrap\Modal;
use yii\web\JsExpression;

?>
<h1>mobile/index</h1>

<p>
    You may change the content of this page by modifying
    the file <code><?= __FILE__; ?></code>.
</p>

<?if (\Yii::$app->user->can('admin')): ?>
да

    <?
$JSEventClick=<<<EVENTCLICK

function(calEvent, jsEvent, view) {
  $('#modal-dialog').modal('show');
                $(this).css('border-color', 'red');
 /*
                $.get('index.php?r=mobile/update',{'id':calEvent.id}, function(data){
                    $('#modal-dialog').modal('show')
                    .find('#modelContent')
                    .html(data);
                })*/
            }

EVENTCLICK;

$JSEDayClick=<<<DAYCLICK
function(date, jsEvent, view) {
        var clickDate = date.format();
      
        $('#modal-dialog').modal('show');
        
         $('#modal-dialog').find('#modelContent')
                    .html(data);
        
        
        }
DAYCLICK;


    echo  yii2fullcalendar\yii2fullcalendar::widget([
        'options' => [
            'lang' => 'ru',
            //... more options to be defined here!
        ],
        // 'events' => Url::to(['/timetrack/default/jsoncalendar'])
        'events' =>$events,
        'eventClick' => new JsExpression($JSEventClick),
        'dayClick'=>new JsExpression($JSEDayClick),




    ]);
    ?>
<? else: ?>
нет
<? endif; ?>



<?php
Modal::begin([
    'id'=>'modal-dialog',
    'header' => '<h2>Hello world</h2>',
    'toggleButton' => ['label' => 'click me'],
    'footer' => 'Низ окна',
]);

echo 'Say hello...';

Modal::end();

?>