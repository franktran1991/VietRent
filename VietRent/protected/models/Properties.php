<?php

/**
 * This is the model class for table "{{properties}}".
 *
 * The followings are the available columns in table '{{properties}}':
 * @property integer $property_id
 * @property integer $property_owner_id
 * @property integer $property_room_type
 * @property integer $property_max_persons
 * @property integer $property_bed_rooms
 * @property string $property_desc
 * @property string $property_available_date
 * @property double $property_cost
 * @property integer $property_create_time
 * @property integer $property_update_time
 */
class Properties extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{properties}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('property_owner_id, property_room_type, property_max_persons, property_bed_rooms, property_desc, property_available_date, property_cost, property_create_time, property_update_time', 'required'),
			array('property_owner_id, property_room_type, property_max_persons, property_bed_rooms, property_create_time, property_update_time', 'numerical', 'integerOnly'=>true),
			array('property_cost', 'numerical'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('property_id, property_owner_id, property_room_type, property_max_persons, property_bed_rooms, property_desc, property_available_date, property_cost, property_create_time, property_update_time', 'safe', 'on'=>'search'),
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
			'property_id' => 'Property',
			'property_owner_id' => 'Property Owner',
			'property_room_type' => 'Property Room Type',
			'property_max_persons' => 'Property Max Persons',
			'property_bed_rooms' => 'Property Bed Rooms',
			'property_desc' => 'Property Desc',
			'property_available_date' => 'Property Available Date',
			'property_cost' => 'Property Cost',
			'property_create_time' => 'Property Create Time',
			'property_update_time' => 'Property Update Time',
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

		$criteria->compare('property_id',$this->property_id);
		$criteria->compare('property_owner_id',$this->property_owner_id);
		$criteria->compare('property_room_type',$this->property_room_type);
		$criteria->compare('property_max_persons',$this->property_max_persons);
		$criteria->compare('property_bed_rooms',$this->property_bed_rooms);
		$criteria->compare('property_desc',$this->property_desc,true);
		$criteria->compare('property_available_date',$this->property_available_date,true);
		$criteria->compare('property_cost',$this->property_cost);
		$criteria->compare('property_create_time',$this->property_create_time);
		$criteria->compare('property_update_time',$this->property_update_time);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Properties the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
