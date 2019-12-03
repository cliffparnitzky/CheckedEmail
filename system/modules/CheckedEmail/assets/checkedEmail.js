window.addEvent('domready', function() {
	var checkedEmail = $$('.checkedEmail');
	
	Array.each(submissionAreas, function(element){
		element.removeClass('widget');
	});
});