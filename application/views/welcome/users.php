<h4>Users List</h4>
<hr>
<?php
$this->load->widget('CGridView', [
	'id' => 'users-grid',
	'dataProvider' => $dataProvider,
	'filter' => $model,
	'columns' => [
		'id',
		[
			'name' => 'username',
			'value' => function($data) {
				return $data->username;
			}
		],
		[
			'name' => 'email',
		],
		[
			'name' => 'birthdate',
		],
		[
			'name' => '_groups',
			'filter' => GroupHelper::getGroupsDataList(),
		],
		[
			'name' => 'gender',
			'filter' => array('MALE' => 'Male', 'FEMALE' => 'Female'),
		],
	]	
]);
