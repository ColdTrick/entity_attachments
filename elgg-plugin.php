<?php

return [
	'plugin' => [
		'version' => '6.1',
	],
	'entities' => [
		[
			'type' => 'object',
			'subtype' => 'entity_attachment',
			'class' => \EntityAttachment::class,
			'capabilities' => [
				'commentable' => false,
			],
		],
	],
	'actions' => [
		'entity_attachments/add' => [],
		'entity_attachments/sort' => [],
	],
	'events' => [
		'register' => [
			'menu:entity' => [
				'ColdTrick\EntityAttachments\Menus\Entity::makeDeletePrimaryAction' => [],
			],
		],
		'seeds' => [
			'database' => [
				'ColdTrick\EntityAttachments\Seeder::register' => ['priority' => 600],
			],
		],
		'view_vars' => [
			'object/elements/full' => [
				'ColdTrick\EntityAttachments\Views::addAttachments' => [],
			],
		],
	],
	'view_extensions' => [
		'elgg.css' => [
			'entity_attachments/list.css' => [],
		],
	],
	'view_options' => [
		'forms/entity_attachments/add' => ['ajax' => true],
	],
];
