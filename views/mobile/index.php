<?php



?>
<h1>mobile/index</h1>

<p>
    You may change the content of this page by modifying
    the file <code><?= __FILE__; ?></code>.
</p>

<?if (\Yii::$app->user->can('admin')): ?>
да
<? else: ?>
нет
<? endif; ?>
