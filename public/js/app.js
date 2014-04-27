// Foundation JavaScript
// Documentation can be found at: http://foundation.zurb.com/docs
$(document).foundation();

$(document).ready(function() {
	$('#draft_check').change(function(){
	     $(this).val(this.checked ? 1 : 0);
		console.log($(this).val());
	});
});


