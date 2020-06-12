<?php

echo elgg_view_field([
	'#type' => 'userpicker',
	'#help' => elgg_echo('entity_attachments:picker:help'),
	'name' => 'params[linked_user][entity_guid]',
	'limit' => 1,
	'subtype' => get_registered_entity_types('object'),
	'required' => true,
]);
