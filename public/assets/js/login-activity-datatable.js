(function($) {

	'use strict';

	/*
	* Login Activity DataTable List
	*/
	var listDataTableInit = function(url) {

		var $listTable = $('.table');

		$listTable.dataTable({
			dom: '<"row justify-content-between"<"col-auto"><"col-auto">><"table-responsive"t>ip',
            bProcessing: true,
			sAjaxSource: $listTable.data('url'),
			columnDefs: [
				{
					targets: [4],
					orderable: false
				}
			],
			pageLength: 12,
			order: [],
			language: {
				paginate: {
					previous: '<i class="fas fa-chevron-left"></i>',
					next: '<i class="fas fa-chevron-right"></i>'
				}
			},
			drawCallback: function() {
				
				// Move dataTables info to footer of table
				$listTable
					.closest('.dataTables_wrapper')
					.find('.dataTables_info')
					.appendTo( $listTable.closest('.datatables-header-footer-wrapper').find('.results-info-wrapper') );

				// Move dataTables pagination to footer of table
				$listTable
					.closest('.dataTables_wrapper')
					.find('.dataTables_paginate')
					.appendTo( $listTable.closest('.datatables-header-footer-wrapper').find('.pagination-wrapper') );
				
				$listTable.closest('.datatables-header-footer-wrapper').find('.pagination').addClass('pagination-modern pagination-modern-spacing justify-content-center');

			}
		});

		// Link "Show" select for change the "pageLength" of dataTable
		$(document).on('change', '.results-per-page', function(){
			var $this = $(this),
				$dataTable = $this.closest('.datatables-header-footer-wrapper').find('.dataTable').DataTable();

			$dataTable.page.len( $this.val() ).draw();
		});

		// Link "Search" field to show results based in the term entered (the "Filter By" is considered to filter the results)
		$(document).on('keyup', '.search-term', function(){
			var $this = $(this),
				$filterBy = $this.closest('.datatables-header-footer-wrapper').find('.filter-by'),
				$dataTable = $this.closest('.datatables-header-footer-wrapper').find('.dataTable').DataTable();

			if( $filterBy.val() == 'all' ) {
				$dataTable.search( $this.val() ).draw();
			} else {
				$dataTable.column( parseInt( $filterBy.val() ) ).search( $this.val() ).draw();
			}
		});

		// Trigger "keyup" event when "filter-by" changes
		$(document).on('change', '.filter-by', function(){
			var $this = $(this),
				$searchField = $this.closest('.datatables-header-footer-wrapper').find('.search-term');

			$searchField.trigger('keyup');
		});

		// Select All
		$listTable.find( '.select-all' ).on('change', function(){
			if( this.checked ) {
				$listTable.find( 'input[type="checkbox"]:not(.select-all)' ).prop('checked', true);
			} else {
				$listTable.find( 'input[type="checkbox"]:not(.select-all)' ).prop('checked', false);
			}
		})

	};

	listDataTableInit();

}(jQuery));