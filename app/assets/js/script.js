// Show overlay & spinner when clicking a link
$("table a").click(function() {
	$(".overlay").css("display", "block");
	$(".overlay-spinner").css("display", "block");
});