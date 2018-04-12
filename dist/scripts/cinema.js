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
	let $url = 'cinemas.php?position=' + $position
	$url.replace(/\s+/g, '');
	window.location = $url;

}

const errorPosition = () => {
	let $url = 'cinemas.php?'
	$url.replace(/\s+/g, '');
	window.location = $url;
}

cinemas.addEventListener('click', () => {
	getLocation();
})