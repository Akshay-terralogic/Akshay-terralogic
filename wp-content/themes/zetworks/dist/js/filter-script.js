jQuery(function($){
 
	/*
	 * Filter
	 */
	$('#filters').on('change', function(){
 
		$.ajax({
			url : loadmore_params.ajaxurl,
			data : $('#filters').serialize(), // form data
			dataType : 'json', // this data type allows us to receive objects from the server
			type : 'POST',
			beforeSend : function(xhr){
				$('#filters').find('button').text('Filtering...');
			},
			success:function(data){
				// change the button label back
				$('#filters').find('button').text('Apply filter');
 
				// insert the posts to the container
				$('#posts_wrap').html(data.content);
			}
		});
		// do not submit the form
		return false;
	});
 
});