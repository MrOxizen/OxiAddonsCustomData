jQuery( function(){

			jQuery( document ).on( "beforecreate.offcanvas", function( e ){
				var dataOffcanvas = jQuery( e.target ).data('offcanvas-component');
				console.log(dataOffcanvas);
				dataOffcanvas.onInit =  function() {
					console.log(this);
				};
			} );

			jQuery( document ).on( "create.offcanvas", function( e ){
				var dataOffcanvas = jQuery( e.target ).data('offcanvas-component');
				console.log(dataOffcanvas.options);
				dataOffcanvas.onOpen =  function() {
					console.log('Callback onOpen');
				};
				dataOffcanvas.onClose =  function() {
					console.log('Callback onClose');
				};
			} );

			jQuery( document ).on( "clicked.offcanvas-trigger clicked.offcanvas", function( e ){
				var dataBtnText = jQuery( e.target ).text();
				console.log(e.type + '.' + e.namespace + ': ' + dataBtnText);
			} );

			jQuery( document ).on( "open.offcanvas", function( e ){
				var dataOffcanvasID = jQuery( e.target ).attr('id');
				console.log(e.type + ': #' + dataOffcanvasID);
			} );

			jQuery( document ).on( "resizing.offcanvas", function( e ){
				var dataOffcanvasID = jQuery( e.target ).attr('id');
				console.log(e.type + ': #' + dataOffcanvasID);
			} );

			jQuery( document ).on( "close.offcanvas", function( e ){
				var dataOffcanvasID = jQuery( e.target ).attr('id');
				console.log(e.type + ': #' + dataOffcanvasID);
			} );

			jQuery( document ).on( "destroy.offcanvas", function( e ){
				var dataOffcanvasID = jQuery( e.target ).attr('id');
				console.log(e.type + ': #' + dataOffcanvasID);
			} );

			jQuery( '#bottom' ).on( "create.offcanvas", function( e ){
				var api = jQuery(this).data('offcanvas-component');

				console.log(api);
				jQuery('.sa-destroy').on('click', function () {
					api.destroy();
					//jQuery( '#top' ).data('offcanvas-component').destroy();
					console.log(api);
					console.log( jQuery( '#top' ).data() );
				});
			} );

			jQuery( '#left' ).offcanvas( {
                            
				modifiers: "left,overlay",
				triggerButton: '.sa-offcanvas-trigger-left'
			} );

			jQuery('.sa-enhance').on('click', function () {
				console.log('enhance');
				jQuery( document ).trigger( "enhance" );
			});

			jQuery( document ).trigger( "enhance" );
		});