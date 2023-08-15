if ( window.jQuery ) {
	jQuery( document ).ready( function ($) {
		'use strict';

		$('.lgx_color_picker').each(function(){
			$(this).wpColorPicker();
		});




		function lgxLogoSliderImageUploadButton() {
			if ( lgxLogoShowcaseWpMedia === undefined ) {
				lgxLogoShowcaseWpMedia = wp.media(
					{
						title: 'Choose Icon/Image',
						library: {
							type: [ 'icon', 'image' ]
						},
						multiple: false,
						button: {
							text: 'Choose'
						}
					}
				);

				lgxLogoShowcaseWpMedia.on( 'select', function () {
					let mediaFile = lgxLogoShowcaseWpMedia.state().get( 'selection' );

					/*console.log( mediaFile );
					console.log( mediaFile.toArray() );
					console.log( mediaFile.first() );*/

					mediaFile.toArray().forEach( function (item) {
						let iconFieldName = $lgx_icon_image_button.data( 'iconFieldName' );
						let iconImgId = $lgx_icon_image_button.data( 'iconImgId' );
						let itemInfo = item.attributes;
						//let itemUrl = ( itemInfo.sizes.hasOwnProperty('medium') ) ? itemInfo.sizes.medium.url : itemInfo.sizes.full.url;
						$( 'input[name="' + iconFieldName + '"]' ).val( itemInfo.sizes.full.url );
						$( '#' + iconImgId ).attr( 'src', itemInfo.sizes.full.url );
					} );



				} );
			}

			lgxLogoShowcaseWpMedia.open();
		}

		function lgxNavigationTab(parentSelector) {
			let $lgx_logo_slider_nav_tab_wrapper = $( parentSelector ).find( '.lgx_logo_slider_nav_tab_wrapper' );
			$lgx_logo_slider_nav_tab_wrapper.each( function ( index, element ) {
				//console.log( index );
				//console.log( element );
				$( element ).find( '.lgx_logo_slider_nav_tab' ).on( 'click', function (event) {
					event.preventDefault();
					let $this = $( this );
					let dataValue = $this.data();


					//console.log( 'I am clicked' )

					//if the button already active just return
					if ( $this.hasClass( 'lgx_active' ) ) {
						return;
					}

					//Make active tabbed button
					$this.parent().find( '.lgx_logo_slider_nav_tab.lgx_active' ).removeClass( 'lgx_active' );
					$this.addClass( 'lgx_active' );

					$( element ).siblings( '.lgx_logo_slider_tab_content_wrapper' ).find( '.lgx_logo_slider_tab_content' ).removeClass( 'lgx_active' );
					$( element ).siblings( '.lgx_logo_slider_tab_content_wrapper' ).find( '[data-tab-id="' + dataValue.activeTab + '"]' ).addClass( 'lgx_active' );

					//lgx_logo_slider_tab_content
					//console.log( $this );
				} );
			} );//End Logo Slider Navigation Tab
		}



		let lgxLogoShowcaseWpMedia;
		let $lgx_logo_slider_copy_button = $( '.lgx_logo_slider_copy_button' );
		let $lgx_icon_image_button = $( '.lgx_icon_image_button' );
		let $lgx_icon_image_button_clear = $( '.lgx_icon_image_button_clear' );
		let $lgx_logo_slider_showcase_type = $( '.lgx_logo_slider_showcase_type' );
		let $lgx_logo_slider_layout = $( '.lgx_logo_slider_layout' );

		let $lgx_logo_slider_list_copy_input = $( '.lgx_logo_slider_list_copy_input' );


		$lgx_logo_slider_list_copy_input.on( 'click', function (event) {

			event.preventDefault();
			let $this = $( this );

			$this.select();
			document.execCommand( 'copy' );

			if ( 'object' === typeof alertify ) {
				alertify.success( '<i class="lgxicon lgx-icon-copy"></i> Copy to clipboard successfully' );
			}
		} );

		$lgx_logo_slider_copy_button.on( 'click', function (event) {
			event.preventDefault();
			let $this = $( this );

			let shortCodeString = $this.siblings( '.lgx_logo_slider_short_code' ).text();
			const element = document.createElement('textarea' );
			//console.log( shortCodeString );

			element.value = shortCodeString;
			element.setAttribute( 'readonly', '' );
			element.style.position = 'absolute';
			element.style.left = '-9999px';
			document.body.appendChild( element );
			element.select();
			document.execCommand( 'copy' );
			document.body.removeChild( element );

			$this.html( '<i class="lgxicon lgx-icon-copy"></i> Copied' );

			if ( 'object' === typeof alertify ) {
				alertify.success( '<i class="lgxicon lgx-icon-copy"></i> Copy to clipboard successfully' );
			}

		} );


		$lgx_icon_image_button.on( 'click', function (event) {
			event.preventDefault();
			let $this = $( this );
			lgxLogoSliderImageUploadButton();
		} );//End Logo Slider Insert Image Button

		$lgx_icon_image_button_clear.on( 'click', function (event) {
			event.preventDefault();
			let $this = $( this );
			let iconFieldName = $this.data( 'iconFieldName' );
			let iconImgId = $this.data( 'iconImgId' );

			$( 'input[name="' + iconFieldName + '"]' ).val( '' );
			$( '#' + iconImgId ).attr( 'src', '' );
		} );



		lgxNavigationTab( '.lgx_logo_slider_info_box' );


		// Item Sorting


		let $wpListTable = $( 'table.wp-list-table tbody' );

		$wpListTable.sortable( {
			placeholder: 'placeholder-highlight',
			start: function(event, ui) {
			},
			sort: function(event, ui) {
				ui.item[0].style.backgroundColor = 'white';
			},
			stop: function(event, ui) {
				ui.item.removeAttr( 'style' );
				//console.log( ui.item )
				//console.log( wpnpaddon )
				$.ajax( {
					type : 'post',
					dataType : 'json',
					url : wpnpaddon.ajax_url,
					data : {
						action: 'lgx_ls_admin_lswp_reorder',
						post_id_serialize : $( '#the-list' ).sortable( 'serialize' ),
						nonce: wpnpaddon.check_nonce
					},
					success: function(response) {
						if( response.type === 'success' ) {
							//jQuery("#vote_counter").html(response.vote_count)
						}
						else {
							alert( response.message )
						}
					}
				} )
			}
		} );

		$lgx_logo_slider_showcase_type.on( 'change', function (event) {
			event.preventDefault();
			let $this = $( this );
			let logoSliderLayout = $this.find( 'option:selected' ).data( 'logo-slider-layout' );
			let $lgx_logo_slider_tab_inner = $( '.lgx_logo_slider_tab_inner' );
			$lgx_logo_slider_tab_inner.hide();
			$( 'div.lgx_logo_slider_tab_inner_layout_' + logoSliderLayout ).fadeIn(1000);

			switch (logoSliderLayout) {
				case 'carousel':
					$lgx_logo_slider_layout.html( '<i class="dashicons dashicons-images-alt2"></i> Carousel' );
					break;

				case 'grid':
					$lgx_logo_slider_layout.html( '<i class="dashicons dashicons-grid-view"></i> Grid' );
					break;

				case 'masonry':
					$lgx_logo_slider_layout.html( '<i class="dashicons dashicons-tagcloud"></i> Masonry' );
					break;

				case 'vertical':
					$lgx_logo_slider_layout.html( '<i class="dashicons dashicons-filter"></i> Vertical' );
					break;

				case 'filter':
					$lgx_logo_slider_layout.html( '<i class="dashicons dashicons-filter"></i> Filter' );
					break;

				default:
					break
			}
		} );

		// Item Sorting End



	} );// Init jQuery
} else {
	console.log( 'jQuery not loaded.' )
}
