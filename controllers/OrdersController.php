<?php

namespace app\controllers;

use Yii;
use app\models\Orders;
use app\models\User;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * OrdersController implements the CRUD actions for Orders model.
 */
class OrdersController extends Controller
{
    /**
     * @inheritdoc
     */
//    public function behaviors()
//    {
//        return [
//            'verbs' => [
//                'class' => VerbFilter::className(),
//                'actions' => [
//                    'delete' => ['POST'],
//                ],
//            ],
//        ];
//    }


    public function beforeAction($action)
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect('/site/login');
        }
        return parent::beforeAction($action);
    }


    /**
     * @return string
     */
    public function actionIndex()
    {


        $dataProvider = new ActiveDataProvider([
            'query' => Orders::find()->andWhere([
                ((Yii::$app->user->identity->role == 'CUSTOMER') ? 'id_customer' : 'id_executor' )    => Yii::$app->user->id]),
        ]);
        return $this->render(((Yii::$app->user->identity->role == 'CUSTOMER') ? 'index' : 'indexEc' ), [
            'dataProvider' => $dataProvider,
        ]);





        $role = Yii::$app->user->identity->role;

        if ($role == 'CUSTOMER')
        {
            $f1 = 'id_customer';
            $f2 = 'index';
        }else{
            $f1 = 'id_exe';
            $f2 = 'indexEx';
        }

        $dataProvider = new ActiveDataProvider([
            'query' => Orders::find()->andWhere([$f1=> Yii::$app->user->id]),
        ]);
        return $this->render($f2, [
            'dataProvider' => $dataProvider,
        ]);

    }

    public function actionTest(){
        $user = Yii::$app->user->identity;
        echo '<pre>';
        print_r($user);
        exit();
    }

    /**
     * Displays a single Orders model.
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


    public function actionCreate()
    {
        $model = new Orders();

        if ($model->load(Yii::$app->request->post())) {
            $model->id_customer = Yii::$app->user->id;
            $model->status = 'free';
            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }

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

        public function actionDelete($id)
        {
            $this->findModel($id)->delete();

            return $this->redirect(['index']);
        }

        protected function findModel($id)
        {
            if (($model = Orders::findOne($id)) !== null) {
                return $model;
            }

            throw new NotFoundHttpException('The requested page does not exist.');
        }
}