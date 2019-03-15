<?php

echo elgg_view_field([
	'#type' => 'userpicker',
	'name' => 'params[linked_user][entity_guid]',
	'limit' => 1,
	'subtype' => get_registered_entity_types('object'),
]);
