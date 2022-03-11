function BuscarEndereco(){
    let cep = document.querySelector('#cep').value;

    var validacep = /^[0-9]{8}$/;

    if(validacep.test(cep)){

        const options = {
            method:'GET',
            mode:'cors',
            cache:'default'
        }

        fetch(`https://viacep.com.br/ws/${cep}/json/`,options)
        .then(response => {response.json()
            .then(data=>{
                console.log(data);
                document.querySelector('#alertCep').textContent = '';
                document.querySelector('#logradouro').value = data.logradouro;
                document.querySelector('#bairro').value = data.bairro;
                document.querySelector('#cidade').value = data.localidade;
                document.querySelector('#uf').value = data.uf;           
             })
        })
        .catch(function(){
            alert('Erro ao consultar Cep!');
        })

    }else{
        document.querySelector('#alertCep').textContent = 'Cep Inválido!';
        document.querySelector('#logradouro').value = '';
                document.querySelector('#bairro').value = '';
                document.querySelector('#cidade').value = '';
                document.querySelector('#uf').value = '';   
    }
}



function limparCampos(){
    elements = document.querySelector('#form-cadastro').elements;

    for(let i = 0; i <= elements.length; i++){
        elements[i].value = '';
    }

}
