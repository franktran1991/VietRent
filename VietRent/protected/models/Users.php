<?php

/**
 * This is the model class for table "{{users}}".
 *
 * The followings are the available columns in table '{{users}}':
 * @property integer $user_id
 * @property string $user_first_name
 * @property string $user_last_name
 * @property string $user_mobile
 * @property string $user_email
 * @property string $user_DOB
 * @property string $user_profile_pic_url
 * @property string $user_create_time
 * @property string $user_update_time
 */
class Users extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{users}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_first_name, user_last_name, user_mobile, user_email, user_DOB, user_profile_pic_url, user_create_time, user_update_time', 'required'),
			array('user_first_name, user_last_name', 'length', 'max'=>30),
			array('user_mobile', 'length', 'max'=>15),
			array('user_email', 'length', 'max'=>80),
			array('user_profile_pic_url', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('user_id, user_first_name, user_last_name, user_mobile, user_email, user_DOB, user_profile_pic_url, user_create_time, user_update_time', 'safe', 'on'=>'search'),
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
			'user_id' => 'User',
			'user_first_name' => 'User First Name',
			'user_last_name' => 'User Last Name',
			'user_mobile' => 'User Mobile',
			'user_email' => 'User Email',
			'user_DOB' => 'User Dob',
			'user_profile_pic_url' => 'User Profile Pic Url',
			'user_create_time' => 'User Create Time',
			'user_update_time' => 'User Update Time',
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

		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('user_first_name',$this->user_first_name,true);
		$criteria->compare('user_last_name',$this->user_last_name,true);
		$criteria->compare('user_mobile',$this->user_mobile,true);
		$criteria->compare('user_email',$this->user_email,true);
		$criteria->compare('user_DOB',$this->user_DOB,true);
		$criteria->compare('user_profile_pic_url',$this->user_profile_pic_url,true);
		$criteria->compare('user_create_time',$this->user_create_time,true);
		$criteria->compare('user_update_time',$this->user_update_time,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Users the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
