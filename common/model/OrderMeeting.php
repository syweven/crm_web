<?php

/**
 * This is the model class for table "order_meeting".
 *
 * The followings are the available columns in table 'order_meeting':
 * @property integer $id
 * @property integer $account_id
 * @property integer $order_id
 * @property integer $company_id
 * @property integer $company_linkman_id
 * @property integer $layout_id
 * @property string $update_time
 */
class OrderMeeting extends InitActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'order_meeting';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('account_id, order_id, company_id, layout_id, update_time', 'required'),
			array('account_id, order_id, company_id,  layout_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, account_id, order_id, company_id,  layout_id, update_time', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'account_id' => 'Account Id',
			'order_id' => 'Order',
			'company_id' => 'Company',
			'company_linkman' => 'Company Linkman',
			'layout_id' => 'Layout',
			'update_time' => 'Update Time',
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
		$criteria->compare('account_id',$this->account_id);
		$criteria->compare('order_id',$this->order_id);
		$criteria->compare('company_id',$this->company_id);
		$criteria->compare('company_linkman_id',$this->company_linkman_id);
		$criteria->compare('layout_id',$this->layout_id);
		$criteria->compare('update_time',$this->update_time,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return OrderMeeting the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
