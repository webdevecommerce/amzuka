(function($, window, document){
  $(function(){
    if ( ! $.fn.dataTable ) return;
    var display_cms_pages = $('#display_cms_pages').dataTable({
        'paging':   true,  // Table pagination
        'ordering': true,  // Column ordering 
        //'info':     true,  // Bottom left status text
        // Text translation options
        // Note the required keywords between underscores (e.g _MENU_)
        oLanguage: {
            sSearch:      'Search all columns:',
            sLengthMenu:  '_MENU_ records per page',
            info:         'Showing the page _PAGE_ of _PAGES_',
            zeroRecords:  'Nothing found - sorry',
            infoEmpty:    'No records available',
            infoFiltered: '(filtered from _MAX_ total records)'
        }
    });
    var display_cms_pages = $('#display_plans').dataTable({
        'paging':   true,  // Table pagination
        'ordering': true,  // Column ordering 
        //'info':     true,  // Bottom left status text
        // Text translation options
        // Note the required keywords between underscores (e.g _MENU_)
        oLanguage: {
            sSearch:      'Search all columns:',
            sLengthMenu:  '_MENU_ records per page',
            info:         'Showing the page _PAGE_ of _PAGES_',
            zeroRecords:  'Nothing found - sorry',
            infoEmpty:    'No records available',
            infoFiltered: '(filtered from _MAX_ total records)'
        }
    });
    var inputSearchClass = 'datatable_input_col_search';
    var columnInputs = $('tfoot .'+inputSearchClass);

    // On input keyup trigger filtering
    columnInputs.keyup(function () {
          display_cms_pages.fnFilter(this.value, columnInputs.index(this));
    });
  });
	
	
	$('#login_form').submit(function(e){
		e.preventDefault();
		var submit = true;
		// you can put your own custom validations below

		// check all the rerquired fields
		if( !validator.checkAll( $(this) ) )
		submit = false;

		if( submit )
		this.submit();

		return false;
	})

}(jQuery, window, document));