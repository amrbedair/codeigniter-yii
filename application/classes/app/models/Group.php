<?php

class Group extends CActiveRecord {
	
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
	
	public function tableName() {
		return "{{groups}}";
	}	
	
	public function rules() {
		return [
			array('id, name, description', 'safe'),
			array('id, name, description', 'safe', 'on'=>'search'),
		];
	}
	
	public function relations() {
		return [
			'users' => [self::MANY_MANY, 'User', 'tbl_users_groups(user_id, group_id)'],
		];
	}
	
	public function search() {

		$criteria = new CDbCriteria();
		
		$criteria->compare('t.id', $this->id);
		$criteria->compare('t.name', $this->name, true);
		$criteria->compare('t.description', $this->description, true);
		
		return new CActiveDataProvider($this, [
			'criteria' => $criteria,
			'pagination' => [
				'pageSize' => 50
			],
		]);
	}
}