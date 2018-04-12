const $test = document.querySelectorAll('.click')
const $test2 = document.querySelectorAll('.yes')

for(let $i=0; $i<$test.length; $i++){
    $test[$i].addEventListener('click',()=>{
        $test2[$i].select()
        document.execCommand("Copy");
    })
}


