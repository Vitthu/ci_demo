
  $(function() {  
	 //----------Alphabets only-----------
	$(document).on("keyup blur","[class = 'alphaonly']", function(e)
	{
		var node = $(this);
		node.val(node.val().replace(/[^A-Za-z ]/g,'') );
	});
		
	//----------Numbers only-----------
	$(document).on("keyup blur","[class = 'numonly']", function(e)
	{
		var node = $(this);
		node.val(node.val().replace(/[^0-9]/g,'') );
	});	
	//----------Alphanumonly only-----------
	$(document).on("keyup blur","[class = 'alphanumonly']", function(e)
	{
		var node = $(this);
		node.val(node.val().replace(/[^A-Za-z0-9 ]/g,'') );
	});

});
  