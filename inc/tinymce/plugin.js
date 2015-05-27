( function() {
	tinymce.PluginManager.add( 'eytg', function( editor, url ) {

		// Add a button that opens a window
		editor.addButton( 'eytg_shortcode', {
			tooltip: 'Easy YouTube Gallery',
			icon: 'eytg',
			// text: 'EYTG',
			onclick: function() {
				// Open window
				editor.windowManager.open( {
					title: 'Easy YouTube Gallery',

					buttons: [
						{
							text: 'Insert Shortcode',
							onclick: 'submit',
							classes: 'widget btn primary',
							minWidth: 130
						},
						{
							text: 'Cancel',
							onclick: 'close'
						}
					],
					body: [
						{
							type: 'textbox',
							multiline: true,
							minHeight: 70,
							minWidth: 300,
							name: 'id',
							label: 'YouTube Video ID\'s',
							value: 'EbYfwzmCVJI',
							tooltip: 'Separate multiple ID\'s with comma, like \"EbYfwzmCVJI,PZAE0HkPiCI\"'
						},
						{
							type: 'listbox',
							name: 'cols',
							label: 'Columns',
							tooltip: 'Number of columns to distribute thumbnails.',
							values : [
								{text: 'One', value: '1'},
								{text: 'Two', value: '2'},
								{text: 'Three', value: '3', selected: true},
								{text: 'Four', value: '4'},
								{text: 'Five', value: '5'},
								{text: 'Six', value: '6'},
								{text: 'Seven', value: '7'},
								{text: 'Eight', value: '8'}
							]
						},
						{
							type: 'listbox',
							name: 'ar',
							label: 'Aspect Ratio',
							tooltip: 'Ratio for inline thumbnails.',
							values : [
								{text: 'Widescreen (16:9)', value: '16_9', selected: true},
								{text: 'Standard TV (4:3)', value: '4_3'},
								{text: 'Square (1:1)', value: 'square'}
							]
						},
						{
							type: 'listbox',
							name: 'thumbnail',
							label: 'YouTube Thumbnail',
							tooltip: 'YouTube thumbnail name. Please note that \"sddefault\" and \"maxresdefault\" does not exists for low resolution videos.',
							values : [
								{text: '0 - 480x360px', value: '0'},
								{text: '1 - 120x90px (first frame)', value: '1'},
								{text: '2 - 120x90px (middle frame)', value: '2'},
								{text: '3 - 120x90px (last frame)', value: '3'},
								{text: 'default - 120x90px (Default Quality)', value: 'default'},
								{text: 'mqdefault - 320x180px (Medium Quality)', value: 'mqdefault'},
								{text: 'hqdefault - 480x360px (High Quality)', value: 'hqdefault', selected: true},
								{text: 'sddefault - 640x480px (Standard Definition)', value: 'sddefault'},
								{text: 'maxresdefaul - 1920x1080px (Full HD)', value: 'maxresdefault'},
							]
						},
						{
							type: 'checkbox',
							minWidth: 300,
							name: 'controls',
							label: 'Show Player Controls',
							tooltip: 'Disable this option to hide playback options from lightbox video player.',
							checked: true
						},
						{
							type: 'textbox',
							minWidth: 300,
							name: 'class',
							label: 'Custom Class Name',
							tooltip: 'Set custom class for EYTG to target custom styling.',
							value: ''
						}
					],
					onsubmit: function( e ) {
						// Insert content when the window form is submitted
						var shortcode = '[easy_youtube_gallery';
						shortcode += ' id=' + e.data.id +'';
						shortcode += ' cols=' + e.data.cols + '';
						shortcode += ' ar=' + e.data.ar + '';
						shortcode += ' thumbnail=' + e.data.thumbnail + '';
						if ( ! e.data.controls ) shortcode += ' controls=0';
						if ( e.data.class ) shortcode += ' class=' + e.data.class + '';
						shortcode += ']';

						editor.insertContent( shortcode );
					} // onsubmit alert

				} );
			} // onclick alert

		} );

	} );

} )();