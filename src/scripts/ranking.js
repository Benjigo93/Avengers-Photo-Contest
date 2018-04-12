const $shareButton = document.querySelectorAll('.shareButton')
const $shareLink = document.querySelectorAll('.shareLink')

for (let $i=0; $i<$shareButton.length; $i++){
    $shareButton[$i].addEventListener('click', () =>{
        $shareLink[$i].select();
        document.execCommand("Copy");
    })
}
