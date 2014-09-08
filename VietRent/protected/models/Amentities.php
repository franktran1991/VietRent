<?php

/**
 * This is the model class for table "{{amentities}}".
 *
 * The followings are the available columns in table '{{amentities}}':
 * @property integer $amentity_id
 * @property integer $amentity_property_id
 * @property integer $amentity_wifi
 * @property integer $amentity_kitchen
 */
class Amentities extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{amentities}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('amentity_property_id, amentity_wifi, amentity_kitchen', 'required'),
			array('amentity_property_id, amentity_wifi, amentity_kitchen', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('amentity_id, amentity_property_id, amentity_wifi, amentity_kitchen', 'safe', 'on'=>'search'),
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
			'amentity_id' => 'Amentity',
			'amentity_property_id' => 'Amentity Property',
			'amentity_wifi' => 'Amentity Wifi',
			'amentity_kitchen' => 'Amentity Kitchen',
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

		$criteria->compare('amentity_id',$this->amentity_id);
		$criteria->compare('amentity_property_id',$this->amentity_property_id);
		$criteria->compare('amentity_wifi',$this->amentity_wifi);
		$criteria->compare('amentity_kitchen',$this->amentity_kitchen);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Amentities the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
