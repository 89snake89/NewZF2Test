jQuery(function($){
	$('#album-table').on('click', 'a.remove-link', function(event){
		event.preventDefault();
		var row = $(this);
		var row_id = $(this).attr('id');
		var id = row_id.replace("remove-","");
		$.post("/album/delete", {
			id: id
		})
		.done(function(){
			$("#rowid-"+id).remove();
		})
		.fail(function(){
			console.log('Fail! Delete row id ' + id);
		});
	});
});