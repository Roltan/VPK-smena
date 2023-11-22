function chekCarusel(){
    if(window.innerWidth <= "767"){
        carouselExampleAutoplaying.classList.add('w-75')
        carouselExampleAutoplaying.classList.remove('w-50')
    }
    else{
        carouselExampleAutoplaying.classList.add('w-50')
        carouselExampleAutoplaying.classList.remove('w-75')
    }
}
setInterval(chekCarusel, 1000)



// if(window.innerWidth <= "767"){
//     carouselExampleAutoplaying.classList.add('w-75')
//     carouselExampleAutoplaying.classList.remove('w-50')
// }