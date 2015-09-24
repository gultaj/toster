$(document).ready(function() {
	$('.btn_comment-toogle').each(function(i, elem) {
		$(elem).click(function(event) {
			event.stopPropagation();
			if (comments = $(this).parent().next()) {
				comments.toggleClass('active');
			}
			event.preventDefault();
		});
	});

	if (hash = window.location.hash) {
		$(hash).parent().toggleClass('active')
	}
});