<?php

/**
 * This is the model class for table "test".
 *
 * The followings are the available columns in table 'test':
 * @property integer $id
 * @property string $date_created
 * @property string $gender
 * @property integer $age
 * @property string $school
 *
 * The followings are the available model relations:
 * @property TestQuestion[] $testQuestions
 */
class Test extends CActiveRecord
{
        public $points;
		public $answer1;
		public $answer2;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'test';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('gender, age, school', 'required'),
			array('age', 'numerical', 'integerOnly'=>true),
			array('gender', 'length', 'max'=>1),
			array('school, email_phone', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, date_created, gender, age, school, email_phone', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'testQuestions' => array(self::HAS_MANY, 'TestQuestion', 'test_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'date_created' => 'Date Created',
			'gender' => 'Gender',
			'age' => 'Age',
			'school' => 'School',
			'answer1' => 'Answer 1',
                        'email_phone'=> 'Email / Phone'
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('date_created',$this->date_created,true);
		$criteria->compare('gender',$this->gender,true);
		$criteria->compare('age',$this->age);
		$criteria->compare('school',$this->school,true);
                $criteria->compare('email_phone',$this->email_phone,true);
                $criteria->order = 'id DESC';

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
        public function getResultPoints($id) {
                $result = Yii::app()->db->createCommand()
                    ->select('SUM(answer.points) as pointsSum')
                    ->from('test_question')
                    ->leftJoin('answer', 'test_question.answer_id=answer.id')
                    ->where('test_question.test_id='.$id)
                    ->group('test_question.test_id')
                    ->queryRow();
                return $result['pointsSum'];
        }
        
        public function getResultType($points){
                $result = Result::model()->find('score_min <= '.$points.' AND score_max >= '.$points);
                return $result;
        }
        
        public function getResultPriority($id) {
                if ($this->getResultType($this->getResultPoints($id))->id == 3) {
                    $result = Yii::app()->db->createCommand()
                        ->select('result_priority.priority AS resultPriority, result_priority.question AS resultQuestion, result_priority.answer AS resultAnswer')
                        ->from('test_question')
                        ->join('result_priority', 'test_question.answer_id = result_priority.answer_id AND test_question.question_id = result_priority.question_id')
                        ->where('test_question.test_id = '.$id)
                        ->order('result_priority.priority')
                        ->limit(1)
                        ->queryRow();    
                } else {
                    $result = false;
                }
                
                return $result;
                
        }
        
        public function getResultCalculation($id) {
                $result = Yii::app()->db->createCommand()
                    ->select('test_question.question_id AS resultQuestion, answer.points AS resultPoints, answer.extra_points_min AS resultExtraPointsMin, answer.extra_points_max AS resultExtraPointsMax')
                    ->from('test_question')
                    ->join('answer', 'test_question.answer_id = answer.id')
                    ->where('test_question.test_id = '.$id.' AND test_question.question_id IN ("1", "2", "8")')
                    ->queryAll();
                return $result;
                
        }
        
        public function getResultIndicatorPosition($points) {
            if ($points < 6) {
                $result = ($points/6)*100/3 - 1;
            } elseif ($points < 10) {
                $result = 100/3 + (($points-5)/4)*100/3 - 5;
            } else {
                $result = 200/3 + (($points-9)/7)*100/3 - 1;
            }
            return $result;
        }
        
        public function getWeeklyConsumption($gender,$age) {
                $criteria = new CDbCriteria;
                $criteria->condition = 'gender="'.$gender.'" AND age='.$age;
                $model = WeeklyConsumption::model()->find($criteria);
                return (int)$model->consumption;  
        }
		
		function updateExportFile($document_name) {
			$fh = fopen("documents/".$document_name.".csv","w+");
			$buffer = "";
			// write the header
			foreach ($this as $field_name => $field_value) {	
				$buffer .= '"' . Yii::t('messages',$this->getAttributeLabel($field_name)) . '";';
			}
			$buffer .= 'Points;';
			$buffer .= 'Answer 1;';
			$buffer .= 'Answer 2;';
			$buffer .= 'Answer 3;';
			$buffer .= 'Answer 4;';
			$buffer .= 'Answer 5;';
			$buffer .= 'Answer 6;';
			$buffer .= 'Answer 7;';
			$buffer .= 'Answer 8;';
                        $buffer .= 'Answer 9;';
                        $buffer .= 'Answer 10;';
                        $buffer .= 'Answer 11;';
                        $buffer .= 'Answer 12;';
                        $buffer .= 'Answer 13;';
                        $buffer .= 'Answer 14;';
                        $buffer .= 'Answer 15';
			//$buffer = substr($buffer, 0, -1);
			$buffer .= "\n";
			
			$tests = Yii::app()->db->createCommand()
                                ->select('test.*, test_question.question_id AS points, test_question.question_id AS answer1, test_question.question_id AS answer2, test_question.question_id AS answer3, test_question.question_id AS answer4, test_question.question_id AS answer5, test_question.question_id AS answer6, test_question.question_id AS answer7, test_question.question_id AS answer8, test_question.question_id AS answer9, test_question.question_id AS answer10, test_question.question_id AS answer11, test_question.question_id AS answer12, test_question.question_id AS answer13, test_question.question_id AS answer14, test_question.question_id AS answer15')
                                ->from('test')
                                ->join('test_question', 'test.id = test_question.test_id')
                                ->group('test.id')
                                ->queryAll();
					
			//$tests = Test::model()->findAll();
			foreach ($tests as $test) {
				foreach ($test as $field_name => $field_value) {
					
					if ($field_name == "id") {
						$buffer .= '"' . $test['id'] . '";';
					} else if ($field_name == "date_created") {
						$buffer .= '"' . ((isset($test['date_created']))? $test['date_created']: '') . '";';
					} else if ($field_name == "gender") {
						$buffer .= '"' . ((isset($test['gender']))? $test['gender']: '') . '";';
					} else if ($field_name == "age") {
						$buffer .= '"' . ((isset($test['age']))? $test['age']: '') . '";';
					} else if ($field_name == "school") {
						$buffer .= '"' . ((isset($test['school']))? $test['school']: '') . '";';
					} else if ($field_name == "points") {
						$buffer .= '"' . Test::model()->find('id ='.$test['id'])->points . '";';
					} else if ($field_name == "answer1") {
						$buffer .= '"' . TestQuestion::model()->find('test_id ='.$test['id'].' AND question_id = 1')->answer->text . '";';
					} else if ($field_name == "answer2") {
						$buffer .= '"' . TestQuestion::model()->find('test_id ='.$test['id'].' AND question_id = 2')->answer->text . '";';
					} else if ($field_name == "answer3") {
						$buffer .= '"' . TestQuestion::model()->find('test_id ='.$test['id'].' AND question_id = 3')->answer->text . '";';
					} else if ($field_name == "answer4") {
						$buffer .= '"' . TestQuestion::model()->find('test_id ='.$test['id'].' AND question_id = 4')->answer->text . '";';
					} else if ($field_name == "answer5") {
						$buffer .= '"' . TestQuestion::getAnswers($test['id'], 9) . '";';
					} else if ($field_name == "answer6") {
						$buffer .= '"' . TestQuestion::model()->find('test_id ='.$test['id'].' AND question_id = 5')->answer->text . '";';
                                        } else if ($field_name == "answer7") {
						$buffer .= '"' . TestQuestion::model()->find('test_id ='.$test['id'].' AND question_id = 6')->answer->text . '";';
					} else if ($field_name == "answer8") {
						$buffer .= '"' . TestQuestion::getAnswers($test['id'], 7) . '";';
					} else if ($field_name == "answer9") {
						$buffer .= '"' . TestQuestion::model()->find('test_id ='.$test['id'].' AND question_id = 8')->answer->text . '";';
					} else if ($field_name == "answer10") {
                                                $tq10 = TestQuestion::model()->find('test_id ='.$test['id'].' AND question_id = 10');
                                                $buffer .= '"' . (count($tq10) > 0 ? $tq10->answer->text : '') . '";';
                                        } else if ($field_name == "answer11") {
                                                $tq11 = TestQuestion::model()->find('test_id ='.$test['id'].' AND question_id = 11');
                                                $buffer .= '"' . (count($tq11) > 0 ? $tq11->answer->text : '') . '";';
                                        } else if ($field_name == "answer12") {
                                                $tq12 = TestQuestion::model()->find('test_id ='.$test['id'].' AND question_id = 12');
                                                $buffer .= '"' . (count($tq12) > 0 ? $tq12->answer->text : '') . '";';
                                        } else if ($field_name == "answer13") {
                                                $tq13 = TestQuestion::model()->find('test_id ='.$test['id'].' AND question_id = 13');
                                                $buffer .= '"' . (count($tq13) > 0 ? $tq13->answer->text : '') . '";';
                                        } else if ($field_name == "answer14") {
                                                $tq14 = TestQuestion::model()->find('test_id ='.$test['id'].' AND question_id = 14');
                                                $buffer .= '"' . (count($tq14) > 0 ? $tq14->answer->text : '') . '";';
                                        } else if ($field_name == "answer15") {
                                                $tq15 = TestQuestion::model()->find('test_id ='.$test['id'].' AND question_id = 15');
                                                $buffer .= '"' . (count($tq15) > 0 ? $tq15->answer->text : '') . '";';
                                        } else {
						$buffer .= '"' . $field_value . '";';
					}
				}
				$buffer = substr($buffer, 0, -1);
				$buffer .= "\n";
			}

			fwrite($fh, $buffer);
			fclose($fh);
		}

        public function beforeSave() {
            if(parent::beforeSave()) {
				if($this->isNewRecord) {
                    $this->date_created = date("Y-m-d H:i:s",strtotime("now"));
                }
                return true;
            } else {
				return false;
            }
        }
        
        public function afterFind() {
            if (isset($this->id)) {
                $this->points = $this->getResultPoints($this->id);
            }
        }

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Test the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
