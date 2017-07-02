<?php 

namespace app\controllers;

use yii\rest\ActiveController;
use app\models\Todo;

class TodoController extends ActiveController {
	public $modelClass ='app\models\Todo';


	public function actions(){
		$actions = parent::actions();
		unset($actions['create']);
		return $actions ;
	}

	public function actionCreate(){
		$model = new Todo();
		
		$model->load(Yii::$app->request->post(),'');
		$model->status=10;
		$model->save();
		return $model;
	}

}

 ?>