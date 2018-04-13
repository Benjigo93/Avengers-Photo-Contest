var cinemas = document.querySelector('.cinemas')

const getLocation = () => {
	if (navigator.geolocation) {
		navigator.geolocation.getCurrentPosition(showPosition, errorPosition, {
			timeout: 5000
		});;
	} else {
		document.innerHTML = "Geolocation is not supported by this browser.";

	}
}

const showPosition = (position) => {
	let $position = position.coords.latitude + "," + position.coords.longitude;
	let $url = 'http://localhost/E12_P2021_H2_T2/final/dist/views/includes/pages/cinemas.php?position=' + $position
	$url.replace(/\s+/g, '');
	window.location = $url;

}

const errorPosition = () => {
	let $url = 'http://localhost/E12_P2021_H2_T2/final/dist/views/includes/pages/cinemas.php?'
	$url.replace(/\s+/g, '');
	window.location = $url;
}

cinemas.addEventListener('click', () => {
	getLocation();
})