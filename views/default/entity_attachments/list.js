define(['jquery', 'elgg', 'elgg/Ajax'], function($, elgg, Ajax) {
	
	var initSorting = function() {
		$('.entity-attachments').sortable({
			containment: 'parent',
			axis: 'y',
			forceHelperSize: true,
			forcePlaceholderSize: true,
			update: function() {
				var ajax = new Ajax();
				
				var order = $('.entity-attachments').sortable('serialize', {key: 'order[]'});

				ajax.action('entity_attachments/sort?' + order);
			},
		});
	};
	
	$(document).on('change', '.elgg-form-entity-attachments-add .elgg-input-radio[name="type"]', function() {
		$('.entity-attachments-type').hide();
		$('.entity-attachments-type-' + $(this).val()).show();
		
		$(window).trigger('resize.lightbox');
	});

	$(document).on('submit', '.elgg-form-entity-attachments-add', function(event) {
		event.preventDefault();
	
		var ajax = new Ajax();
		ajax.action('entity_attachments/add', {
			data: ajax.objectify(this),
		}).success(function(output, statusText, jqXHR) {
			if (jqXHR.AjaxData.status !== -1) {
				$('.elgg-listing-full[data-guid="1046"] .elgg-module-entity_attachments > .elgg-body').html(output);
				initSorting();
			}
			
			$.colorbox.close();
		});
	});
	
	initSorting();
});
