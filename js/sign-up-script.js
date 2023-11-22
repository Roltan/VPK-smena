let output = 0
function chekInput(){
    let f1 = form1.value
    let f2 = form2.value
    let f3 = form3.value
    let f4 = form4.value
    let f5 = form5.value
    let f6 = Number(form6.value)
    let f7 = form7.checked
    let paternName = /^[А-Я||A-Z||а-я||a-z][а-я||a-z]+$/
    let paternTel = /^[\d\+][\d\(\)\ -]{4,14}\d$/
    let paternEmail = /^[\w-\.]+@[\w-]+\.[a-z]{2,4}$/i
    let C1 = 1
    let C2 = 1
    let C3 = 1
    let C4 = 1
    let C5 = 1
    let C6 = 1

    // проверяем поля на пустоту
    if(f1 == ''){
        errorOUT.innerHTML = 'не все поля заполнены'
        C1 = 0
    }
    if(f2 == ''){
        errorOUT.innerHTML = 'не все поля заполнены'
        C2 = 0
    }
    if(f3 == ''){
        errorOUT.innerHTML = 'не все поля заполнены'
        C3 = 0
    }
    if(f4 == ''){
        errorOUT.innerHTML = 'не все поля заполнены'
        C4 = 0
    }
    if(f5 == ''){
        errorOUT.innerHTML = 'не все поля заполнены'
        C5 = 0
    }
    if(f6 == ''){
        errorOUT.innerHTML = 'не все поля заполнены'
        C6 = 0
    }
    if(f7 == ''){
        errorOUT.innerHTML = 'не все поля заполнены'
    }

    // проверяем поля на коректность заполнения
    let veribName = paternName.test(f1)
    if(!veribName && form1.value != ''){
        errorOUT.innerHTML = 'ошибочный ввод'
        C1 = 0
    }

    veribName = paternName.test(f2)
    if(!veribName && form2.value != ''){
        errorOUT.innerHTML = 'ошибочный ввод'
        C2 = 0
    }

    veribName = paternName.test(f3)
    if(!veribName && form3.value != ''){
        errorOUT.innerHTML = 'ошибочный ввод'
        C3 = 0
    }

    let validTel = paternTel.test(f4)
    if(!validTel && form4.value != ''){
        errorOUT.innerHTML = 'ошибочный ввод'
        C4 = 0
    }

    let validEmail = paternEmail.test(f5)
    if(!validEmail && form5.value != ''){
        errorOUT.innerHTML = 'ошибочный ввод'
        C5 = 0
    }
    
    if(!f6 && form6.value != ''){
        errorOUT.innerHTML = 'ошибочный ввод'
        C6 = 0
    }
    if((f6 < 0 || f6 > 99) && form6.value != ''){
        errorOUT.innerHTML = 'ошибочный ввод'
        C6 = 0
    }

    // проверка верности по полям, без вывода
    if(C1 || C2 || C3 || C4 || C5 || C6){
        if(C1){
            mark1.style.color = '#1B1B1B'
        }
        if(C2){
            mark2.style.color = '#1B1B1B'
        }
        if(C3){
            mark3.style.color = '#1B1B1B'
        }
        if(C4){
            mark4.style.color = '#1B1B1B'
        }
        if(C5){
            mark5.style.color = '#1B1B1B'
        }
        if(C6){
            mark6.style.color = '#1B1B1B'
        }
        if(C1 && C2 && C3 && C4 && C5 && C6 && f7){
            errorOUT.style.color = '#1B1B1B'
            buton.disabled = false
        }
    }

    // неверный ввод
    if(!C1 || !C2 || !C3 || !C4 || !C5 || !C6){
        errorOUT.style.color = 'red'
        if(!C1 && (output == 1 || output == 0)){
            mark1.style.color = 'red'
        }
        if(!C2 && (output == 2 || output == 0)){
            mark2.style.color = 'red'
        }
        if(!C3 && (output == 3 || output == 0)){
            mark3.style.color = 'red'
        }
        if(!C4 && (output == 4 || output == 0)){
            mark4.style.color = 'red'
        }
        if(!C5 && (output == 5 || output == 0)){
            mark5.style.color = 'red'
        }
        if(!C6 && (output == 6 || output == 0)){
            mark6.style.color = 'red'
        }
    }
}



// функции изменения поля
window.addEventListener("change", function(event){ 
    if(event.target.hasAttribute('data-focus')){ 
        if(event.target.dataset.focus === '1'){ 
            output = 1
        }
        else if(event.target.dataset.focus === '2'){ 
            output = 2
        } 
        else if(event.target.dataset.focus === '3'){ 
            output = 3
        } 
        else if(event.target.dataset.focus === '4'){ 
            output = 4
        } 
        else if(event.target.dataset.focus === '5'){ 
            output = 5
        } 
        else if(event.target.dataset.focus === '6'){ 
            output = 6
        }
        else if(event.target.dataset.focus === '7'){ 
            output = 7
        }
        chekInput()
    } 
})