// Load readme content
$.ajax({
	url: "https://rawgit.com/richjenks/teepee/dev/readme.md",
	dataType: 'text',
	success: function(data) {
		
		// Convert readme from markdown to html
		var converter = new Markdown.Converter();

		// Show html
		$(".wrapper").html(converter.makeHtml(data));
	
	}
});