<?php

namespace frontend\controllers;

use common\models\User;
use frontend\models\Users;
use Yii;
use frontend\models\Comment;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use common\component\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CommentController implements the CRUD actions for Comment model.
 */
class UsersController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
//            'access'=> [
//                'class' => AccessControl::className(),
//                'only' => ['index'],
//                'rules' => [
//                    [
//                        'actions' => ['site/login'],
//                        'allow' => true,
//                        'roles' => ['?'],
//                    ],
//                    [
//                        'actions' => ['index'],
//                        'allow' => true,
//                        'roles' => ['@'],
//                    ],
//                ],
//            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Comment models.
     * @return mixed
     */
    public function actionIndex()
    {
        $query =  User::find(); ////////چرا بعد این نمیشه one زد؟؟؟؟؟؟////////////////
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);


        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionTest()
    {
        print "<pre>";
        print_r(Yii::$app->request->post());
    }

    public function actionRole_permission($id)
    {

        $item_role = [];
        $item_permission = [];
        $model = new Users();
        if($model->load(Yii::$app->request->post()))
        {
            $post = Yii::$app->request->post();
            $user_role = $post['Users']['role'];

            $pazh_id = $post['pazh_id'];


            $model->assign_role_to_user($user_role,$pazh_id);



            $model->role = $model->fetch_role_by_id($id);
            $model->permission = $model->fetch_permission_by_id($id);
            return $this->render('role_permission',['model'=>$model,'id'=>$id]);
        }

        $model->role = $model->fetch_role_by_id($id);
        $model->permission = $model->fetch_permission_by_id($id);
        return $this->render('role_permission',['model'=>$model,'id'=>$id]);
    }

//    /**
//     * Displays a single Comment model.
//     * @param string $id
//     * @return mixed
//     * @throws NotFoundHttpException if the model cannot be found
//     */
//    public function actionView($id)
//    {
//        return $this->render('view', [
//            'model' => $this->findModel($id)
//        ]);
//    }
//
//    /**
//     * Creates a new Comment model.
//     * If creation is successful, the browser will be redirected to the 'view' page.
//     * @return mixed
//     */
//    public function actionCreate()
//    {
//        $model = new Comment();
//
//        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            return $this->redirect(['view', 'id' => $model->comment_id]);
//        }
//
//        return $this->render('create', [
//            'model' => $model,
//        ]);
//    }
//
//    /**
//     * Updates an existing Comment model.
//     * If update is successful, the browser will be redirected to the 'view' page.
//     * @param string $id
//     * @return mixed
//     * @throws NotFoundHttpException if the model cannot be found
//     */
//    public function actionUpdate($id)
//    {
//        $model = $this->findModel($id);
//
//        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            return $this->redirect(['view', 'id' => $model->comment_id]);
//        }
//
//        return $this->render('update', [
//            'model' => $model,
//        ]);
//    }
//
//    /**
//     * Deletes an existing Comment model.
//     * If deletion is successful, the browser will be redirected to the 'index' page.
//     * @param string $id
//     * @return mixed
//     * @throws NotFoundHttpException if the model cannot be found
//     */
//    public function actionDelete($id)
//    {
//        $this->findModel($id)->delete();
//
//        return $this->redirect(['index']);
//    }
//
//    /**
//     * Finds the Comment model based on its primary key value.
//     * If the model is not found, a 404 HTTP exception will be thrown.
//     * @param string $id
//     * @return Comment the loaded model
//     * @throws NotFoundHttpException if the model cannot be found
//     */
    protected function findModel($id)
    {
        if (($model = Comment::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
