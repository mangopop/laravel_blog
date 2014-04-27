// Foundation JavaScript
// Documentation can be found at: http://foundation.zurb.com/docs
$(document).foundation();

$(document).ready(function() {
	$('#draft_check').change(function(){
	     $(this).val(this.checked ? 0 : 1);
		console.log($(this).val());
	});
});


