import $ from 'jquery';
import fix from 'object-fit-images';

export default () => {
	$( document ).ready( function() {
		fix( null, { watchMQ: true } );
	} );
};
