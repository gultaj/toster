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
			if (response.type === 'like') {
				$(btn).html('Вам нравится<span class="like_count">'+response.count+'</span>');
			} else {
				$(btn).html('Нравится<span class="like_count">'+response.count+'</span>');
			}
			$(btn).toggleClass('btn_like_liked');
		});
		event.preventDefault();
	});

	$('.btn_subscribe').click(function() {
		event.stopPropagation();
		var btn = this;
		$.ajax({
			url: $(btn).attr('href')
     	}).done(function(response) {
			if (response.type === 'subscribe') {
				if($(btn).parent().hasClass('btn_box')) {
					$(btn).html('Вы подписаны');
					$(btn).after('<span class="subscribe_count"><i class="icon-cog"></i></span>');
				} else {
					$(btn).html('Вы подписаны<span class="subscribe_count">'+response.count+'</span>');
				}
			} else {
				if($(btn).parent().hasClass('btn_box')) {
					$(btn).html('Подписаться');
					$(btn).next().remove();
				} else {
					$(btn).html('Подписаться<span class="subscribe_count">'+response.count+'</span>');
				}
				
			}
			if($(btn).parent().hasClass('btn_box')) {
				var counter = $('a.mini-counter')[0];
				$(counter).find('.mini-counter__count').text(response.count);
				$(counter).find('.mini-counter__value').text(response.title);
				$(btn).parent().toggleClass('btn_blue');
			} else {
				$(btn).toggleClass('btn_subscribe-active')
			}
		});
		event.preventDefault();
	});
});