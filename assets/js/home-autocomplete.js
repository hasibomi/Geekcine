$('#auto-complete').keyup(function(e) {
	
	var input = $(this).val();
	
	input = $.trim(input);
	
	$("#auto-complete-container").html('');
	
	if (input == '' || input.length < 3)
	{
		$("#auto-complete-container").html('');
		$("#auto-complete-container").hide();
	}
	else
	{
		$.ajax({
			url: '/autocomplete',
			data: 'input='+input,
			success: function(data) {
				$("#auto-complete-container").html(data);
			}
		});
	}
	
	if (e.keyCode == 27)
	{
		$("#auto-complete-container").hide();
	}
	else
	{
		$("#auto-complete-container").show();
	}
});