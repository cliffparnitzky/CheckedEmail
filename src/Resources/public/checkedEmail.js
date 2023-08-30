window.addEvent('domready', function() {
	var checkedEmailFields = $$('.checkedEmail');
	
	Array.each(checkedEmailFields, function(field){
		field.removeClass('widget');
	});
});