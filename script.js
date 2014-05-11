// Check if should load readme from dev branch
if (window.location.search === '?dev') {
	var branch = 'dev';
} else {
	var branch = 'master';
}

// Load readme content
$.ajax({
	url: "https://rawgit.com/richjenks/teepee/"+branch+"/readme.md",
	dataType: 'text',
	success: function(data) {
		
		// Convert readme from markdown to html
		var converter = new Markdown.Converter();

		// Show html
		$(".wrapper").html(converter.makeHtml(data));
	
	}
});