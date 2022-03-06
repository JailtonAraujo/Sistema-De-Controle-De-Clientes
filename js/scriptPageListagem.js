const btnReturnHomePage = document.querySelector('#btn-modific');
const ancorModific = document.querySelector('#ancor-modific');

ancorModific.href = 'pageCadastro.php';
btnReturnHomePage.textContent = 'CADASTRAR CLIENTE';

const btnBuscar = document.querySelector('#btn-busca');

btnBuscar.addEventListener('click',e=>{
    e.preventDefault();

    let busca = document.querySelector('#txt-busca').value;

    const options ={
        method:'GET',
        Headers:{"Content-Type":'application/json'},
    }

    fetch(`processing.php?acao=buscarFetch&buscar=${busca}`,options)
    .then(response =>{response.json()
        .then(function(data){
            console.log(data);
        })
    })

})