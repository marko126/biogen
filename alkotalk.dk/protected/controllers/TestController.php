<?php

class TestController extends Controller
{
        public $css;
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'new' actions
				'actions'=>array('new','viewResult','setanswercookie','additional','createadditional','viewAdditionalResult'),
				'users'=>array('*'),
			),
			array('allow', // allow admin user to perform 'view' and 'admin' actions
				'actions'=>array('view','admin','export'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}
        
        /**
	 * Displays a result to user.
	 * @param integer $id the ID of the model not to be displayed
	 */
        public function actionViewResult()
	{
                if (!Yii::app()->user->getState('testId')) {
                    $this->redirect(array('/'));
                } else {
                    $id = Yii::app()->user->getState('testId');
                    
                    $model = $this->loadModel($id);
                    
                    // Number of points from test
                    $points = Test::model()->getResultPoints($id);
                    
                    // Result model by number of points
                    $resultType = Test::model()->getResultType($points);
                    
                    // Priority model for type 3
                    $resultPriority = Test::model()->getResultPriority($id);
                    
                    // Advanced calculations (money, weight, training)
                    $resultCalculation = Test::model()->getResultCalculation($id);
                    
                    // Position of yellow indicator
                    $resultIndicator = Test::model()->getResultIndicatorPosition($points);
                    
                    $q1 = (int)$resultCalculation[0]['resultExtraPointsMin'];
                    $q2 = $resultCalculation[1]['resultExtraPointsMin'];
                    $q8l = (int)$resultCalculation[2]['resultExtraPointsMin'];
                    $q8h = (int)$resultCalculation[2]['resultExtraPointsMax'];
                            
                    $mml = $q1*$q8l;
                    $mmh = $q1*$q8h;
                    $clm = $q1*$q2*130;
                    $kay = round($clm/1500, 1);
                    $xx = ($model->gender === "m")?round($clm*4.4/360, 1):round($clm*5.2/360, 1);
                    // Weekly consumption of user
                    $wc = round($q1*$q2/4, 0);
                    // Number that indicates which image is shown
                    $wcimg = ($wc > 21)?21:$wc;
                    // National data of weekly consumption based on gender and age
                    $ndwc = Test::model()->getWeeklyConsumption($model->gender, $model->age);
                    
                    $this->render('view-result', array(         
			'model' => $model,
                        'points' => $points,
                        'resultType' => $resultType,
                        'resultPriority' => $resultPriority,
                        'resultIndicator' => $resultIndicator,
                        'mml' => $mml,
                        'mmh' => $mmh,
                        'kay' => $kay,
                        'xx' => $xx,
                        'wc' => $wc,
                        'wcimg' => $wcimg,
                        'ndwc' => $ndwc
                    ));
                }
		//$this->render('view-result');
	}
        
        /**
	 * Displays a result to user.
	 * @param integer $id the ID of the model not to be displayed
	 */
        public function actionViewAdditionalResult()
	{
                if (!Yii::app()->user->getState('testId') || !Yii::app()->user->getState('testAnswer1')) {
                    $this->redirect(array('/'));
                } else {
                    $this->render('view-additional-result');
                }
	}
        
	/**
	 * Creates a new test.
	 * If creation is successful, the browser will be redirected to the 'viewResult' page.
	 */
	public function actionNew()
	{
		$model = new Test;
                $questions = Question::model()->findAll('type = "r" ORDER BY priority');
                
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Test']))
		{
			$model->attributes = $_POST['Test'];
                        $id = 0;
                        
                        if ($model->validate()) {
                            if(isset($_POST['TestQuestion']))
                            {
                                
                            	//var_dump($_POST['TestQuestion']['57']);exit();
                            	$k=1;
                                $valid = true;
                                foreach ($_POST['TestQuestion'] as $j=>$test_question) {
                                	if (isset($_POST['TestQuestion'][$j])) {
                                            if (is_array($test_question['answer_id'])) {
                                                foreach ($test_question['answer_id'] as $key => $value) {
                                                    $test_questions[$k] = new TestQuestion(); // if you had static model only
                                                    $test_questions[$k]->question_id = $test_question['question_id'];
                                                    $test_questions[$k]->answer_id = $value;
                                                    $test_questions[$k]->test_id = 50;
                                                    if (isset($_POST['answer_text'][$value])) {
                                                        //var_dump($_POST['TestQuestion'][$value]['answer_text']);exit();
                                                        $test_questions[$k]->answer_text = $_POST['answer_text'][$value];
                                                    }
                                                    $valid = $test_questions[$k]->validate() && $valid;
                                                    $k++;
                                                }
                                            } else {
                                                $test_questions[$k] = new TestQuestion(); // if you had static model only
                                                $test_questions[$k]->question_id = $test_question['question_id'];
                                                $test_questions[$k]->answer_id = $test_question['answer_id'];
                                                $test_questions[$k]->test_id = 50;
                                                $valid = $test_questions[$k]->validate() && $valid;
                                                $k++;
                                            }
                                	}
                                }
                                
                                // end test
                                if ($valid) {
                                    if ($model->save()) {
                                        foreach ($test_questions as $j=>$test_question) {
                                            $test_question->test_id = $model->id;
                                            $test_question->save();
                                        }
                                        Yii::app()->user->setState('testId', $model->id);
                                        $this->redirect(array('test/viewResult'));
                                    } else {
                                        var_dump($model->attributes);exit();
                                    }
                                } else {
                                    foreach ($_POST['TestQuestion'] as $key => $value) {
                                        echo $key . ' => ';
                                        var_dump($value);
                                        echo '<br>';
                                    }
                                    exit();
                                    throw new Exception("Nije validno TestQuestion", 404);
                                }
                            } else {
                                throw new Exception("Nije setovan TestQuestion", 404);
                            }
                        } else {
                            throw new Exception("Nije validno TEST", 404);
                        }
		}

		$this->render('new',array(
			'model'=>$model,
                        'questions'=>$questions
		));
                
	}
        
        /**
	 * Display an additional test.
	 * 
	 */
	public function actionAdditional()
	{
                if (!Yii::app()->user->getState('testId') || !Yii::app()->user->getState('testAnswer1')) {   
                    $this->redirect(array('/'));
                } else {
                    $test_id = Yii::app()->user->getState('testId');
                    $answer1 = Yii::app()->user->getState('testAnswer1');
                    
                    $emptyQuestion = ($answer1 == 58) ? 4 : 1;
                    
                    $model = Test::model()->findByPk($test_id);
                    if ($answer1 == 58) {
                        $questions = Question::model()->findAll('type = "a" AND id > 10 ORDER BY priority');
                        $view = 'additional_yes';
                    } else {
                        $questions = Question::model()->findAll('type = "a" AND id > 13 ORDER BY priority');
                        $view = 'additional_no';
                    }

                    // Uncomment the following line if AJAX validation is needed
                    // $this->performAjaxValidation($model);
                    
                    if(isset($_POST['Test']) || isset($_POST['TestQuestion']))
                    {
                            //var_dump($_POST['Test']);exit();
                    	    if (!empty($_POST['Test']['email_phone'][1])) {
                    	    	$model->email_phone = $_POST['Test']['email_phone'][1];
                    	    } elseif (!empty($_POST['Test']['email_phone'][3])) {
                    	    	$model->email_phone = $_POST['Test']['email_phone'][3];
                    	    } else {
                    	    	$model->email_phone = $_POST['Test']['email_phone'][4];
                    	    }
                            $model->update();
                            //var_dump($_POST['Test']);exit();
                                if(isset($_POST['TestQuestion']))
                                {
                                    $valid = true;
                                    $k = 1;
                                    foreach ($_POST['TestQuestion'] as $j=>$test_question) {
                                        if (isset($_POST['TestQuestion'][$j]) && $j != $emptyQuestion) {
                                            /*echo $j . '=>'; 
                                            var_dump($test_question); 
                                            echo '<br>';*/
                                            if (is_array($test_question['answer_id'])) {
                                                foreach ($test_question['answer_id'] as $key => $value) {
                                                    $test_questions[$k] = new TestQuestion(); // if you had static model only
                                                    $test_questions[$k]->question_id = $test_question['question_id'];
                                                    $test_questions[$k]->answer_id = $value;
                                                    $test_questions[$k]->test_id = $test_id;
                                                    if (isset($_POST['answer_text'][$value])) {
                                                        $test_questions[$k]->answer_text = $_POST['answer_text'][$value];
                                                    }
                                                    $valid = $test_questions[$k]->validate() && $valid;
                                                    $k++;
                                                }
                                            } else if(isset($test_question['answer_id'])) {
                                                $test_questions[$k] = new TestQuestion(); // if you had static model only
                                                $test_questions[$k]->question_id = $test_question['question_id'];
                                                $test_questions[$k]->answer_id = $test_question['answer_id'];
                                                $test_questions[$k]->test_id = $test_id;
                                                $valid = $test_questions[$k]->validate() && $valid;
                                                $k++;
                                            }
                                        }
                                    }
                                    //exit();
                                    if ($valid) {
                                            foreach ($test_questions as $j=>$test_question) {
                                                $test_question->test_id = $test_id;
                                                $test_question->save();
                                            }
                                            //Yii::app()->user->setState('testId', $model->id);
                                            $this->redirect(array('test/viewAdditionalResult'));
                                    } else {
                                        foreach ($_POST['TestQuestion'] as $key => $value) {
                                            echo $key . ' => ';
                                            var_dump($value);
                                            echo '<br>';
                                        }
                                        exit();
                                        throw new Exception("Nije validno TestQuestion", 404);
                                    }
                                } else {
                                    throw new Exception("Nije setovan TestQuestion", 404);
                                }
                    }
                    //($questions);exit();
                    $this->render('additional', array(
                            'model' => $model,
                            'questions' => $questions,
                            'test_id' => $test_id,
                            'answer1' => $answer1,
                            'additional_view' => $view
                    ));
                }
	}
        
        /**
	 * Creates an additional test - use data from ajax call.
	 * 
	 */
	public function actionCreateadditional()
	{
                if (!Yii::app()->user->getState('testId') || !Yii::app()->user->getState('testAnswer1')) {   
                    echo 'error';
                } else {
                    $test_id = Yii::app()->user->getState('testId');
                    $answer1 = Yii::app()->user->getState('testAnswer1');
                    
                    $emptyQuestion = ($answer1 == 58) ? 4 : 1;
                    
                    $test_question = new TestQuestion();
                    $test_question->question_id = 10;          
                    if ($answer1 == 58) {
                        $questions = Question::model()->findAll('type = "a" AND id > 10 ORDER BY priority');
                        $test_question->answer_id = 58;
                    } else {
                        $questions = Question::model()->findAll('type = "a" AND id > 13 ORDER BY priority');
                        $test_question->answer_id = 59;
                    }
                    $test_question->test_id = $test_id;
                    $test_question->save();
                    
                    $model = Test::model()->findByPk($test_id);
                    
                    if (Yii::app()->request->getParam('email_phone_1') !== NULL && Yii::app()->request->getParam('email_phone_1') !== '') {
                        $model->email_phone = Yii::app()->request->getParam('email_phone_1');
                    } elseif (Yii::app()->request->getParam('email_phone_3') !== NULL && Yii::app()->request->getParam('email_phone_3') !== '') {
                        $model->email_phone = Yii::app()->request->getParam('email_phone_3');
                    } elseif (Yii::app()->request->getParam('email_phone_4') !== NULL && Yii::app()->request->getParam('email_phone_4') !== '') {
                        $model->email_phone = Yii::app()->request->getParam('email_phone_4');
                    }
                    $model->update();
                    
                    foreach ($questions as $question) {
                        $valid = true;
                        $answers = Answer::model()->findAll(array("condition" => "question_id = ".$question->id));
                        foreach ($answers as $answer) {
                            if (Yii::app()->request->getParam('answer_'.$question->id.'_'.$answer->id) !== NULL && Yii::app()->request->getParam('answer_'.$question->id.'_'.$answer->id) !== '') {
                                $test_question = new TestQuestion();
                                $test_question->question_id = $question->id;
                                $test_question->answer_id = Yii::app()->request->getParam('answer_'.$question->id.'_'.$answer->id);
                                $test_question->test_id = $test_id;
                                if (Yii::app()->request->getParam('answer_text_'.$question->id.'_'.$answer->id) !== NULL) {
                                    $test_question->answer_text = Yii::app()->request->getParam('answer_text_'.$question->id.'_'.$answer->id);
                                }
                                if ($test_question->save()) {
                                    $valid = $valid && true;
                                } else {
                                    $valid = $valid && false;
                                }
                            }
                        }
                    }
                    if ($valid) {
                        echo 'success';
                    } else {
                        echo 'error';
                    }
                }
	}
        
	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Test('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Test']))
			$model->attributes=$_GET['Test'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
        
        public function actionSetanswercookie() {
            $id = Yii::app()->request->getParam('id');
            if ($id == '58' || $id == '59') {
                Yii::app()->user->setState('testAnswer1', $id);
                echo 'success';
            } else {
                echo 'error';
            }
        }
	
	public function actionExport()	{
		
		$model = new Test;
		
		$date = explode("-",date("Y-m-d"));
		$document_name = time().'_'.$date[2].$date[1].$date[0];
		ini_set('max_execution_time', 300);
		$model->updateExportFile($document_name);
		header('Content-disposition: attachment; filename='.$document_name.'.csv');
		header('Content-type: application/csv');
		header('Content-encoding: UTF-8');
		echo("\xEF\xBB\xBF");
		readfile("documents/".$document_name.".csv","w+");
		
		
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Test the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Test::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Test $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='test-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
