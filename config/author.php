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
			'permissions' => ['crud'],
			'parent' => 'Post'
		],
	];
