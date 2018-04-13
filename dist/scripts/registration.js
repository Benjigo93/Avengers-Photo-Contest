let $limit = 5
let $checkboxes = document.querySelectorAll('.checkbox-limit')
let $checked = 0;
const $body = document.querySelector('body')
const $selectedHero = document.querySelector('.selected-hero')



for (let i = 0; i < $checkboxes.length; i++) {
	$checkboxes[i].addEventListener('click', () => {
		if ($checkboxes[i].checked) {
			$checked++
			$body.style.backgroundImage = $checkboxes[i].style.backgroundImage
			$selectedHero.innerHTML = $checkboxes[i].dataset.name
			if ($checked > $limit) {
				$checkboxes[i].checked = false
				$checked = $limit
			}
		} else {
			$checked--

		}
	})
}