<?php

class User extends CActiveRecord {
	
	public $_groups;
	
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
	
	public function tableName() {
		return "{{users}}";
	}	
	
	public function rules() {
		return [
			array('id, username, password, email, birthdate, gender, _groups', 'safe'),
			array('id, username, password, email, birthdate, gender, _groups', 'safe', 'on'=>'search'),
		];
	}
	
	public function relations() {
		return [
			'groups' => [self::MANY_MANY, 'Group', 'tbl_users_groups(user_id, group_id)'],
		];
	}
	
	public function afterFind() {
	
		$groups = '';
		foreach ($this->groups as $group) {
			$groups[] = $group->description;
		}
		$this->_groups = implode($groups, ',<br>');
	
		return parent::afterFind();
	}
	
	public function search() {

		$criteria = new CDbCriteria();
		
		$criteria->compare('t.id', $this->id);
		$criteria->compare('t.username', $this->username, true);
		$criteria->compare('t.email', $this->email, true);
		$criteria->compare('t.gender', $this->gender);
		
		$criteria->together = true;
		if(isset($this->_groups)) {
			$criteria->with[] = 'groups';
			$criteria->compare('groups.id', $this->_groups);
		}
		
		return new CActiveDataProvider($this, [
			'criteria' => $criteria,
			'pagination' => [
				'pageSize' => 50
			],
		]);
	}
}