<?php

/**
 * This is the model class for table "{{dictionary}}".
 *
 * The followings are the available columns in table '{{dictionary}}':
 * @property integer $dictionary_id
 * @property integer $dictionary_key
 * @property integer $dictionary_value
 */
class Dictionary extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{dictionary}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('dictionary_key, dictionary_value', 'required'),
			array('dictionary_key, dictionary_value', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('dictionary_id, dictionary_key, dictionary_value', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'dictionary_id' => 'Dictionary',
			'dictionary_key' => 'Dictionary Key',
			'dictionary_value' => 'Dictionary Value',
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

		$criteria->compare('dictionary_id',$this->dictionary_id);
		$criteria->compare('dictionary_key',$this->dictionary_key);
		$criteria->compare('dictionary_value',$this->dictionary_value);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Dictionary the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
