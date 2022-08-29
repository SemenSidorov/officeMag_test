$(function(){
	$('.sale_test').click(function(){
		$.ajax({
			type: 'POST',
			url: '/ajax/sale_test.php',
			dataType: 'html',
			success: function(data) {
				$('.sale_test_result').html(data);
			},
		});
	});
});

$(function(){
	$('.sale_test_check').click(function(){
		$.ajax({
			type: 'POST',
			url: '/ajax/sale_test_check.php',
			data: {
				key: $('.sale_test_input').val()
			},
			dataType: 'html',
			success: function(data) {
				$('.sale_test_result').html(data);
				$('.sale_test_input').val('');
			},
		});
	});
});