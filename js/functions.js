( function( $ ) {

	$( 'input:not( :checkbox ):not( :radio ):not( :button ):not( :submit ), textarea, select' ).addClass( 'form-control input-sm' );
    $( '.row' ).addClass( 'form-group form-group-sm' );
    $( 'button, input[type="submit"]' ).addClass( 'btn btn-outline-dark' );
    $( 'table' ).addClass( 'table table-responsive' );
	$( 'thead' ).addClass( 'thead-light' );

} )( jQuery );