<?php

namespace ColdTrick\EntityAttachments\Menus;

use Elgg\Menu\MenuItems;

/**
 * Add menu items to the entity menu
 */
class Entity {
	
	/**
	 * Moves the delete action to a primary action (outside the dropdown)
	 *
	 * @param \Elgg\Event $event 'register', 'menu:entity'
	 *
	 * @return void
	 */
	public static function makeDeletePrimaryAction(\Elgg\Event $event): void {
		if (!$event->getEntityParam() instanceof \EntityAttachment) {
			return;
		}
		
		/* @var $menu MenuItems */
		$menu = $event->getValue();
		
		$delete = $menu->get('delete');
		if (!$delete instanceof \ElggMenuItem) {
			return;
		}
		
		$delete->setSection('_first');
	}
}
