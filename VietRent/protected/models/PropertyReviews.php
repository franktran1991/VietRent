<?php

/**
 * This is the model class for table "{{property_reviews}}".
 *
 * The followings are the available columns in table '{{property_reviews}}':
 * @property integer $review_id
 * @property integer $review_owner_id
 * @property integer $review_property_id
 * @property integer $review_star
 * @property string $review_content
 * @property string $review_create_time
 * @property string $review_update_time
 */
class PropertyReviews extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{property_reviews}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('review_owner_id, review_property_id, review_star, review_content, review_create_time, review_update_time', 'required'),
			array('review_owner_id, review_property_id, review_star', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('review_id, review_owner_id, review_property_id, review_star, review_content, review_create_time, review_update_time', 'safe', 'on'=>'search'),
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
			'review_id' => 'Review',
			'review_owner_id' => 'Review Owner',
			'review_property_id' => 'Review Property',
			'review_star' => 'Review Star',
			'review_content' => 'Review Content',
			'review_create_time' => 'Review Create Time',
			'review_update_time' => 'Review Update Time',
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

		$criteria->compare('review_id',$this->review_id);
		$criteria->compare('review_owner_id',$this->review_owner_id);
		$criteria->compare('review_property_id',$this->review_property_id);
		$criteria->compare('review_star',$this->review_star);
		$criteria->compare('review_content',$this->review_content,true);
		$criteria->compare('review_create_time',$this->review_create_time,true);
		$criteria->compare('review_update_time',$this->review_update_time,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return PropertyReviews the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
