<?php

/**
 * EntityAttachment object class
 *
 * @property string $attachment_type type of the entity attachment
 * @property int    $entity_guid     linked entity GUID
 * @property string $href            URL to a resource
 * @property int    $order           order of the attachment
 */
class EntityAttachment extends \ElggObject {

	/**
	 * {@inheritDoc}
	 */
	protected function initializeAttributes() {
		parent::initializeAttributes();

		$this->attributes['subtype'] = 'entity_attachment';
		$this->attributes['access_id'] = ACCESS_PUBLIC;
	}

	/**
	 * {@inheritDoc}
	 */
	public function getURL(): string {
		return $this->href ?: parent::getURL();
	}
	
	/**
	 * {@inheritDoc}
	 */
	public function canEdit(int $user_guid = 0): bool {
		$result = parent::canEdit($user_guid);
		
		if ($result === true) {
			return $result;
		}
		
		$container = elgg_call(ELGG_IGNORE_ACCESS, function() {
			// some containers might be private (and not owned by logged in user)
			return $this->getContainerEntity();
		});
		
		if ($container instanceof \ElggEntity) {
			return $container->canEdit($user_guid);
		}
		
		return false;
	}
}
