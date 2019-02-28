<?php

namespace ColdTrick\EntityAttachments;

class Views {
	
	/**
	 * Set the attachments vars
	 *
	 * @param \Elgg\Hook $hook 'view_vars', 'object/elements/full'
	 *
	 * @return []
	 */
	public static function addAttachments(\Elgg\Hook $hook) {
		
		$vars = $hook->getValue();
		if (isset($vars['attachments'])) {
			return;
		}
		
		$entity = elgg_extract('entity', $vars);
		if (!$entity instanceof \ElggObject) {
			return;
		}
		
		$attachments = elgg_view('entity_attachments/list', ['entity' => $entity]);
		if (empty($attachments)) {
			return;
		}
		
		$vars['attachments'] = $attachments;
		
		return $vars;
	}
}
