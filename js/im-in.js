function check(){
    let login = form1.value
    let password = form2.value

    if(login == 'admin' && password == 'admin'){
        document.location.href = 'choice.html'
    }
}