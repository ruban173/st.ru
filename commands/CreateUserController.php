<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;
use Yii;
use yii\console\Controller;
use yii\console\ExitCode;
use app\models\entities\User;

/**
 * This command echoes the first argument that you have entered.
 *
 * This command is provided as an example for you to learn how to create console commands.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class CreateUserController extends Controller
{
    /**
     * This command echoes what you have entered as the message.
     * @param string $message the message to be echoed.
     * @return int Exit code
     */
    public function actionIndex($message = 'done')
    {
        $user=new User();
        $user->login='admin';
        $user->password=Yii::$app->getSecurity()->generatePasswordHash('password');
        $user->save();

        $user=new User();
        $user->login='editor';
        $user->password=Yii::$app->getSecurity()->generatePasswordHash('password');
        $user->save();

        $user=new User();
        $user->login='user';
        $user->password=Yii::$app->getSecurity()->generatePasswordHash('password');
        $user->save();

    echo $message . "\n";

        return ExitCode::OK;
    }

}
