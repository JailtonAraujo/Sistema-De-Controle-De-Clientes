const input_login = document.querySelector('input#login');
const input_senha = document.querySelector('input#senha');
const form = document.querySelector('form');

input_login.addEventListener('input', ()=>{
    
    let loginValue = input_login.value.trim();

    if(loginValue === ""){
        invalid(input_login, "Campo obrigatorio!");
        
        
    }else{
        valid(input_login, "Ok!");
    }
});


input_senha.addEventListener('input', (e)=>{
    let senhaValue = input_senha.value.trim();

    if(senhaValue === ""){
        invalid(input_senha, "Campo obrigatorio!");
        
        
    } 
    /*
    else if(senhaValue.length < 8){
        invalid(input_senha, "A senha deve ter mais que 8 carácteres!");
        
    }
    */
    else{
        valid(input_senha, "Ok!");
    }
});

form.addEventListener('submit', (e)=>{

    let loginValue = input_login.value.trim();
    let senhaValue = input_senha.value.trim();

    if(loginValue === "" && senhaValue === ""){

        e.preventDefault();
        invalid(input_login, "Campo obrigatorio!");
        invalid(input_senha, "Campo obrigatorio!");
    }else if(loginValue != "" && senhaValue === ""){
        e.preventDefault();
        valid(input_login, "Ok!");
        invalid(input_senha, "Campo obrigatorio!");
    }else if(loginValue === "" && senhaValue != ""){
        e.preventDefault();
        invalid(input_login, "Campo obrigatorio!");
        valid(input_senha, "Ok!");
    }
    
   

    
});



function invalid(input, msg){
    let form_control = input.parentElement;
    form_control.className = 'form-control invalid';
    const small = form_control.querySelector('small');
    small.innerText = msg;
    small.style.color = 'red';
    const img = form_control.querySelector('#icon img');
    img.src = 'img/error-icon.svg';
} 

function valid(input, msg){
    let form_control = input.parentElement;
    form_control.className = 'form-control valid';
    const small = form_control.querySelector('small');
    small.innerText = msg;
    small.style.color = 'green';
    const img = form_control.querySelector('#icon img');
    img.src = 'img/success-icon.svg';
}

