<?php

namespace ColdTrick\EntityAttachments;

/**
 * View related callbacks
 */
class Views {
	
	/**
	 * Set the attachments vars
	 *
	 * @param \Elgg\Event $event 'view_vars', 'object/elements/full'
	 *
	 * @return []
	 */
	public static function addAttachments(\Elgg\Event $event) {
		
		$vars = $event->getValue();
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
