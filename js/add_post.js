var options = {
	type: 'POST',
	url: '/posts/p_add',
	beforeSubmit: function() {
		$('#results').html('Adding..');
	},
	success: function(results) {
		$('#results').html(results);
	}
}

$('form').ajaxForm(options);