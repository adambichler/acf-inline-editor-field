/**
 * Included when acf_inline_editor_field fields are rendered for editing by publishers.
 */
 ( function( $ ) {
	/**
	 * Initializes the field.
	*/
	function initialize_field( ) {

		$(document).find('.medium-editor-field.init').each(function(index, el) {
			if($(this).parents('.acf-clone').length > 0){
				return;
			}
			//init a new medium editor for every single field
			$(this).removeClass('init'); //remove the class to make sure it is only initialized once
			var buttons = []; //store the buttons that should be shown in the toolbar

			//get all the settings from the data attributes of the field
			var placeholder = $(this).attr('placeholder');
			if ($(this).data('bold-button') == 1) {
				buttons.push('bold');
			}
			if ($(this).data('italic-button') == 1) {
				buttons.push('italic');
			}
			if ($(this).data('underline-button') == 1) {
				buttons.push('underline');
			}
			if ($(this).data('anchor-button') == 1) {
				buttons.push('anchor');
			}
			if ($(this).data('h1-button') == 1) {
				buttons.push('h1');
			}
			if ($(this).data('h2-button') == 1) {
				buttons.push('h2');
			}
			if ($(this).data('h3-button') == 1) {
				buttons.push('h3');
			}
			if ($(this).data('quote-button') == 1) {
				buttons.push('quote');
			}
			if ($(this).data('ul-button') == 1) {
				buttons.push('unorderedlist');
			}
			if ($(this).data('ol-button') == 1) {
				buttons.push('orderedlist');
			}

			var autolist = new AutoList(); //initialize the autolist extension
			
			//initialize the medium editor
			var editor = new MediumEditor(this, {
				extensions: {
					'autolist': autolist //add the autolist extension
				}, 
				toolbar: {
					buttons: buttons //set the buttons that should be shown in the toolbar
				},
				placeholder: {
					text: placeholder, //set the placeholder text
					hideOnClick: false //do not hide the placeholder text when the editor is clicked
				},
				paste: {
					forcePlainText: true //force plain text pasting, defualt ist true
				}
			});
			//trigger the change event when the editor content changes
			editor.subscribe('editableInput', function(event, editable) {
				// Do some work
				jQuery(editable).trigger('change');
			});
		})
	}

	if( typeof acf.add_action !== 'undefined' ) {
		/**
		 * Run initialize_field when existing fields of this type load,
		 * or when new fields are appended via repeaters or similar.
		 */
		acf.add_action( 'ready_field/type=acf_inline_editor_field', initialize_field );
		acf.add_action( 'append_field/type=acf_inline_editor_field', initialize_field );
	}
} )( jQuery );
