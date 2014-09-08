<?php

/**
 * This is the model class for table "{{property_gallery}}".
 *
 * The followings are the available columns in table '{{property_gallery}}':
 * @property integer $gallery_id
 * @property integer $gallery_property_id
 * @property string $gallery_img1
 * @property string $gallery_img2
 * @property string $gallery_img3
 * @property string $gallery_img4
 * @property string $gallery_img5
 * @property string $gallery_img6
 * @property string $gallery_img7
 * @property string $gallery_img8
 */
class PropertyGallery extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{property_gallery}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('gallery_property_id, gallery_img1, gallery_img2, gallery_img3, gallery_img4, gallery_img5, gallery_img6, gallery_img7, gallery_img8', 'required'),
			array('gallery_property_id', 'numerical', 'integerOnly'=>true),
			array('gallery_img1, gallery_img2, gallery_img3, gallery_img4, gallery_img5, gallery_img6, gallery_img7, gallery_img8', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('gallery_id, gallery_property_id, gallery_img1, gallery_img2, gallery_img3, gallery_img4, gallery_img5, gallery_img6, gallery_img7, gallery_img8', 'safe', 'on'=>'search'),
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
			'gallery_id' => 'Gallery',
			'gallery_property_id' => 'Gallery Property',
			'gallery_img1' => 'Gallery Img1',
			'gallery_img2' => 'Gallery Img2',
			'gallery_img3' => 'Gallery Img3',
			'gallery_img4' => 'Gallery Img4',
			'gallery_img5' => 'Gallery Img5',
			'gallery_img6' => 'Gallery Img6',
			'gallery_img7' => 'Gallery Img7',
			'gallery_img8' => 'Gallery Img8',
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

		$criteria->compare('gallery_id',$this->gallery_id);
		$criteria->compare('gallery_property_id',$this->gallery_property_id);
		$criteria->compare('gallery_img1',$this->gallery_img1,true);
		$criteria->compare('gallery_img2',$this->gallery_img2,true);
		$criteria->compare('gallery_img3',$this->gallery_img3,true);
		$criteria->compare('gallery_img4',$this->gallery_img4,true);
		$criteria->compare('gallery_img5',$this->gallery_img5,true);
		$criteria->compare('gallery_img6',$this->gallery_img6,true);
		$criteria->compare('gallery_img7',$this->gallery_img7,true);
		$criteria->compare('gallery_img8',$this->gallery_img8,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return PropertyGallery the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
