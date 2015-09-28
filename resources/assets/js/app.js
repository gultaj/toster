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

	$('[role="panel-list-opening"]').click(function() {
		$(this).parents('.panel').toggleClass('panel_opened');
	});

	$('.btn_like').click(function() {
		event.stopPropagation();
		var btn = this;
		$.ajax({url: $(btn).attr('href')}).done(function(response) {
			$(btn).toggleClass('btn_like_liked');
			if (response.type === 'like') {
				$(btn).html('Вам нравится<span class="like_count">'+response.count+'</span>');
			} else {
				$(btn).html('Нравится<span class="like_count">'+response.count+'</span>');
			}
		});
		event.preventDefault();
	});
});