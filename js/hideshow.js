$(document).ready(function() {

	// append show/hide links to the element directly preceding the element with a class of "toggle"
	$('.toggle').prev().append(' <a class="toggleLink showDrop"></a>');

	// hide all of the elements with a class of 'toggle'
	$('.toggle').show();

	// capture clicks on the toggle links
	$('a.toggleLink').click(function() {

		if ($(this).hasClass("showDrop")) {
			$(this).removeClass("showDrop").addClass("hideDrop");
			$(this).parent().next('.toggle').slideUp(200);	
		}
		else {
			$(this).removeClass("hideDrop").addClass("showDrop");
			$(this).parent().next('.toggle').slideDown(200);
		}

	});
});