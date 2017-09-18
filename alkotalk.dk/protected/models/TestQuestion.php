<?php

/**
 * This is the model class for table "test_question".
 *
 * The followings are the available columns in table 'test_question':
 * @property integer $test_id
 * @property integer $question_id
 * @property integer $answer_id
 *
 * The followings are the available model relations:
 * @property Answer $answer
 * @property Test $test
 * @property Question $question
 */
class TestQuestion extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'test_question';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('test_id, question_id, answer_id', 'required'),
			array('test_id, question_id, answer_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('test_id, question_id, answer_id, answer_text', 'safe', 'on'=>'search'),
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
			'answer' => array(self::BELONGS_TO, 'Answer', 'answer_id'),
			'test' => array(self::BELONGS_TO, 'Test', 'test_id'),
			'question' => array(self::BELONGS_TO, 'Question', 'question_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'test_id' => 'Test',
			'question_id' => 'Question',
			'answer_id' => 'Answer',
                        'answer_text' => 'Answer Text',
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

		$criteria->compare('test_id',$this->test_id);
		$criteria->compare('question_id',$this->question_id);
		$criteria->compare('answer_id',$this->answer_id);
                $criteria->compare('answer_text',$this->answer_text);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
        public static function getAnswers($test_id, $question_id) {
            $models = TestQuestion::model()->findAll('test_id = :test_id AND question_id = :question_id', [':test_id' => $test_id, ':question_id' => $question_id]);
            $answer_array = [];
            foreach ($models as $model) {
                $answer_array[] = $model->answer->text;
            }
            return (implode('; ',$answer_array));
        }

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TestQuestion the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
