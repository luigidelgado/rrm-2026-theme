function modalSteps($){
    //https://codepen.io/shahrilamrias/pen/vdQXmL?editors=1010
	let lastTab = $(".tab-pane:last-child").attr("id");

	$(".back, .first").hide();

	$(".next").click(function() {
		let nextId = $(".tab-pane.active")
			.next()
			.attr("id");

		$('[href="#' + nextId + '"]').tab("show");

		$(".back, .first").css("display", "unset");
		if (nextId == lastTab) {
			$(".next").hide();
			// show submit button
		}
		return false;
	});

	$(".back").click(function() {
		let backId = $(".tab-pane.active")
			.prev()
			.attr("id");
		// alert(backId);
		$('[href="#' + backId + '"]').tab("show");

		$(".next").css("display", "unset");
		if (backId === "step1") {
			$(".back, .first").css("display", "none");
		}
		return false;
	});

	$(".nav-tabs li:first-child").click(function() {
		$(".back, .first").css("display", "none");
		$(".next").css("display", "unset");
	});

	$(".nav-tabs li:not(:first-child)").click(function() {
		$(".back, .first").css("display", "unset");
	});

	$(".nav-tabs li:last-child").click(function() {
		$(".next").css("display", "none");
	});

	$(".nav-tabs li:not(:last-child)").click(function() {
		$(".next").css("display", "unset");
	});
}


export{
    modalSteps
}
