$(document).on("scroll", function() {

	if($(document).scrollTop()>100) {
		$("header").removeClass("large").addClass("small");
		document.getElementById("sfondo").style.opacity=0.5;
	} else {
		$("header").removeClass("small").addClass("large");
		document.getElementById("sfondo").style.opacity=1;
	}
	
});