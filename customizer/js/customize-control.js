jQuery( document ).ready( function($) {

	/* === Sortable Multi-CheckBoxes === */

	/* Make it sortable. */
	jQuery( "body" ).on( 'hover', '.manang-multicheck-sortable-handle', function() {
		$( 'ul.manang-multicheck-sortable-list' ).sortable({
			handle: '.manang-multicheck-sortable-handle',
			axis: 'y',
			update: function( e, ui ){
				$('input.manang-multicheck-sortable-item').trigger( 'change' );
			}
		});
	});

	/* On changing the value. */
	jQuery( "body" ).on( 'change', 'input.manang-multicheck-sortable-item', function() {

		/* Get the value, and convert to string. */
		this_checkboxes_values = $( this ).parents( 'ul.manang-multicheck-sortable-list' ).find( 'input.manang-multicheck-sortable-item' ).map( function() {
			var active = '0';
			if( $(this).prop("checked") ){
				var active = '1';
			}
			return this.name + ':' + active;
		}).get().join( ',' );

		/* Add the value to hidden input. */
		$( this ).parents( 'ul.manang-multicheck-sortable-list' ).find( 'input.manang-multicheck-sortable' ).val( this_checkboxes_values ).trigger( 'change' );

	});

});
