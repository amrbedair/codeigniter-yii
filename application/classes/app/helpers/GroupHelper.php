<?php
/**
 * 
 * @author amrbedair
 *
 */
class GroupHelper {
	
	/**
	 * Helper function to return a dropdown list data items
	 * @return array
	 */
	public static function getGroupsDataList() {
		
		$dataList = CHtml::listData(Group::model()->findAll(), 'id', 'description');
		// $dataList+=[''=>'-select-'];
		// sort alphabetically:
		asort($dataList);
		return $dataList;
	}
}