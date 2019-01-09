<?php
/**
 * Created by PhpStorm.
 * User: Виктория
 * Date: 22.12.2018
 * Time: 21:16
 */

namespace app\controllers;


use yii\web\Controller;
use app\models\Tasks;

class TaskController extends Controller
{

    public $enableCsrfValidation = false;

    public function actionAddtask()
    {
        if(!\Yii::$app->request->post('task')){
            return $this->render('add');
        }
        else{
            $NewTask = new Tasks();
            $NewTask->task=\Yii::$app->request->post('task');
            $NewTask->date= time();
            $NewTask->save();
            return $this->render('view');
        }

    }
    public function actionView($id)
    {
        $task = Tasks::find()
            ->andWhere('id='.$id)
            ->one();

        if( !$task ){
            echo 'error';
            exit();
        }

        return $this->render('view',[
            'task' => $task
        ]);
    }
    public function actionDelete($id)
    {
        $task = Tasks::find()
            ->andWhere('id='.$id)
            ->one();

        if( !$task ){
            return $this->redirect('index');
        }

        $task->delete();

        return $this->redirect('index');
    }
}