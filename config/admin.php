<?php
	return [
		#post Home
		[
			'name' => 'Home',
			'route' => 'home',
			'permissions' => ['crud'],
			'parent' => 'Home'
		],
		# Post Permission
		[
			'name' => 'Post',
			'route' => 'post',
			'permissions' => ['crud', 'update-other', 'delete-other'],
			'parent' => 'Post'
		],
		# Category Permission
		[
			'name' => 'Category',
			'route' => 'category',
			'permissions' => ['crud'],
			'parent' => 'Categoy'
		],
		# Slider Permission
		[
			'name' => 'Slider',
			'route' => 'slider',
			'permissions' => ['crud', 'update-other', 'delete-other'],
			'parent' => 'Slide'
		],
		# User Permission
		[
			'name' => 'User',
			'route' => 'user',
			'permissions' => ['crud'],
			'parent' => 'User'
        ],
	];
