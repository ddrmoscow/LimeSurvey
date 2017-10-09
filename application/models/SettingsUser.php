<?php

/**
 * This is the model class for table "{{settings_user}}".
 *
 * The followings are the available columns in table '{{settings_user}}':
 * @property integer $uid User id
 * @property string $entity Entity name
 * @property string $entity_id Entity ID
 * @property string $stg_name Setting name
 * @property string $stg_value Setting Value
 */
class SettingsUser extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{settings_user}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('uid, entity, entity_id, stg_name', 'required'),
			array('uid', 'numerical', 'integerOnly'=>true),
			array('entity', 'length', 'max'=>15),
			array('entity_id', 'length', 'max'=>31),
			array('stg_name', 'length', 'max'=>63),
			array('stg_value', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('uid, entity, entity_id, stg_name, stg_value', 'safe', 'on'=>'search'),
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
			'uid' => 'Uid',
			'entity' => 'Entity',
			'entity_id' => 'Entity',
			'stg_name' => 'Stg Name',
			'stg_value' => 'Stg Value',
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

		$criteria->compare('uid',$this->uid);
		$criteria->compare('entity',$this->entity,true);
		$criteria->compare('entity_id',$this->entity_id,true);
		$criteria->compare('stg_name',$this->stg_name,true);
		$criteria->compare('stg_value',$this->stg_value,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SettingsUser the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}