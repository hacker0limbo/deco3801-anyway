export function loadBackToTop() {
	const backToTop = document.querySelector(".back-to-top");

	backToTop.addEventListener("click", () => {
		window.scrollTo({ top: 0, behavior: "smooth" });
	});
	
	window.addEventListener("scroll", () => {
		if (
			document.body.scrollTop > 200 ||
			document.documentElement.scrollTop > 200
		) {
			backToTop.style.display = "block";
		} else {
			backToTop.style.display = "none";
		}
	});	
}
