$(function() {

    $('#tyre-search-link').click(function(e) {
		$("#tyre-form").delay(100).fadeIn(100);
 		$("#branch-form").fadeOut(100);
 		$("#max-form").fadeOut(100);
 		$("#comment-form").fadeOut(100);
		$(this).addClass('active');
		e.preventDefault();
	});
	$('#branch-search-link').click(function(e) {
		$("#branch-form").delay(100).fadeIn(100);
 		$("#tyre-form").fadeOut(100);
 		$("#max-form").fadeOut(100);
 		$("#comment-form").fadeOut(100);
		$(this).addClass('active');
		e.preventDefault();
	});
	$('#comment-link').click(function(e) {
		$("#comment-form").delay(100).fadeIn(100);
 		$("#tyre-form").fadeOut(100);
 		$("#branch-form").fadeOut(100);
 		$("#max-form").fadeOut(100);
		$(this).addClass('active');
		e.preventDefault();
	});
	$('#max-link').click(function(e) {
		$("#max-form").delay(100).fadeIn(100);
 		$("#tyre-form").fadeOut(100);
 		$("#branch-form").fadeOut(100);
 		$("#comment-form").fadeOut(100);
		$(this).addClass('active');
		e.preventDefault();
	});
});