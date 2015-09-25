$(function(){
	$('.navbar-toggle').click(function(){
		$('body').toggleClass('show-drawer');
	});

	$('.btn-search').on('click', function(e){
		$('#nav-search-form').toggle();
		e.preventDefault();
	});
});