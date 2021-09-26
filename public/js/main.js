$(function(){
	if ($("#new_task").length) {
		$("#new_task").click(function() {
			$( ".form_top" ).slideToggle();
		});
	}

	if ($(".complated").length) {
		$(".complated").click(function() {
			var id = $(this).val();
			var check = '0';
			if ($(this).prop('checked')) {
				check = 1;
			}

			$.ajax({
			  url: '/status',
			  type: "POST",
			  data: {id: id, val: check },
			  success: function(){
				  location.reload();
			  },
			});
		});
	}
});
