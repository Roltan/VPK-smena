window.addEventListener('click', function(event){
    if(event.target.hasAttribute('data-link')){
    for(let i = 1; i < 1000; i++){
      document.getElementById(`albom${i}`).style.display = 'none';
      if(event.target.dataset.link == i){
        let n = i;
        document.getElementById(`albom${n}`).style.display = 'block';
        document.getElementById('welcome-text').style.display = 'none'
        hide();
      }
    }
}
})



function hide(){
    for (let i = 1; i < 1000; i++) {
        document.getElementById(`card${i}`).style.display = 'none';
    }
}