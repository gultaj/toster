(function() {
	var btn = document.body.querySelectorAll('.btn_comment-toogle');
	btnArray = [].slice.call(btn);
	btnArray.forEach(function(elem) {
		elem.addEventListener('click', function(event) {
			comments = event.target.parentNode.parentNode.nextElementSibling;
			if (comments) comments.classList.toggle('active');
			event.preventDefault();
		});
	});
	if (hash = window.location.hash) {
		var elem = document.body.querySelector(hash);
		elem.parentNode.classList.toggle('active');
	}
})();