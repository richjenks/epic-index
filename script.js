// Load readme content
$.ajax({
	url: "https://rawgit.com/richjenks/teepee/master/readme.md",
	dataType: 'text',
	success: function(data) {
		
		// Convert readme from markdown to html
		var converter = new Markdown.Converter();
		$(".wrapper").html(converter.makeHtml(data));
	
	}
});