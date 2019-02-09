<?php

namespace app\modules\users\controllers;

use Yii;
use app\models\entities\UsersProfiles;
use app\models\entities\UsersProfilesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DefaultController implements the CRUD actions for UsersProfiles model.
 */
class ProfileController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all UsersProfiles models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UsersProfilesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single UsersProfiles model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new UsersProfiles model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new UsersProfiles();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing UsersProfiles model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing UsersProfiles model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the UsersProfiles model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return UsersProfiles the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = UsersProfiles::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionListStudentAjax()
    {

  if (\Yii::$app->request->isAjax) {
            $list = Yii::$app->request->post('list');
            $students = explode("\n", $list);
            $result = false;
            foreach ($students as $student) {
                $student = preg_replace('|\s+|', ' ', $student);
                $student=explode(' ',$student);
                $profile = new UsersProfiles();
                $profile->first_name = (isset($student[0])) ? $student[0] : null;;
                $profile->middle_name = (isset($student[1])) ? $student[1] : null;
                $profile->last_name = (isset($student[2])) ? $student[2] : null;
                $profile->birdthday = (isset($student[3])) ? $student[3] : null;
                if ($profile->save()) $result = true;
                if ($result == false) return false;
            }
            return true;


 /*    if (\Yii::$app->request->isAjax) {
            $list = Yii::$app->request->post('list');
            $students = explode("\n", $list);
            $sqlBegin='INSERT INTO users_profiles(first_name, middle_name, last_name, birdthday) VALUES';
            $result = false;
            foreach ($students as $student) {
                $student = preg_replace('|\s+|', ' ', $student);
                $student=explode(' ',$student);
                $sqlBody.="('{$student[0]}','{$student[1]}','{$student[2]}','{$student[3]}'),";
            }
            $sqlBody=rtrim ($sqlBody , ",");
           // return $sqlBegin.$sqlBody;

            return     Yii::$app->db->createCommand($sqlBegin.$sqlBody)->execute();

*/

        }

        return $this->redirect(['index']);
        /*    if(\Yii::$app->request->isAjax){
                return 'Запрос принят!';
            }*/
        /*     if($form_model->load(\Yii::$app->request->post())){
                 var_dump($form_model);
             }
      */


        /* return $this->renderAjax('create-reminder', [
             'model' => $model,
             'comment' => $comment
         ]);
 */
    }

    public function actionTruncate(){
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['index']);
        }
         Yii::$app->db->createCommand('TRUNCATE TABLE users_profiles')->execute();
         return $this->redirect(['/users/']);
    }

}
