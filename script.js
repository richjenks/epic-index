// Load readme content
$.ajax({
	url: "https://cdn.rawgit.com/richjenks/teepee/v1.0/readme.md",
	dataType: 'text',
	success: function(data) {
		
		// Convert readme from markdown to html
		var converter = new Markdown.Converter();

		// Show html
		$(".wrapper").html(converter.makeHtml(data));
	
	}
});