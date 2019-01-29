<?php
namespace app\commands;

use Yii;

use yii\console\Controller;

class RbacController extends Controller
{
    public function actionInit()
    {

        //attendance  -посещаемость

        $auth = Yii::$app->authManager;

        // добавляем добавление посещаемости"
        $createAttendance = $auth->createPermission('createAttendance');
        $createAttendance->description = 'Добавление посещаемости';
        $auth->add($createAttendance);

        // добавляем разрешение " обновление результатов посещаемости"
        $updateAttendance = $auth->createPermission('updateAttendance');
        $updateAttendance->description = 'Обновление посещаемости';
        $auth->add($updateAttendance);

        // добавляем разрешение " удаление результатов посещаемости"
        $deleteAttendance = $auth->createPermission('deleteAttendance');
        $deleteAttendance->description = 'Удаление посещаемости';
        $auth->add($deleteAttendance);
		
	// просмотр "  результатов посещаемости"
        $viewAttendance = $auth->createPermission('viewAttendance');
        $viewAttendance->description = 'Просмотр посещаемости';
        $auth->add($viewAttendance);

	//******************************************************************************************************
	
        // добавляем роль "note"   тот кто отмечает пропуски
        $note = $auth->createRole('note');
        $auth->add($note);
        $auth->addChild($note,$createAttendance);
        $auth->addChild($note,$updateAttendance);
        $auth->addChild($note,$viewAttendance);

        // добавляем роль "admin" и даём роли разрешение "updatePost"
        // а также все разрешения роли "author"
        $admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin, $deleteAttendance);
        $auth->addChild($admin, $note);

        // Назначение ролей пользователям. 1 и 2 это IDs возвращаемые IdentityInterface::getId()
        // обычно реализуемый в модели User.
        $auth->assign($note, 2);
        $auth->assign($admin, 1);
    }
}