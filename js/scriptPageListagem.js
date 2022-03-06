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
            let tbody = document.querySelector('#tbody');
            tbody.textContent = '';

            console.log(data);
            for(let i = 0;i<data.length;i++){
                let tr = tbody.insertRow();

                let td_id = tr.insertCell();
                let td_nome = tr.insertCell();
                let td_cpf = tr.insertCell();
                let td_logradouro = tr.insertCell();
                let td_cidade = tr.insertCell();
                let td_acoes = tr.insertCell();

                let imgDel = document.createElement('img');
                imgDel.src = 'img/lixeira.png';
                let ancorDel = document.createElement('a');
                ancorDel.href = '#';
                ancorDel.style = 'margin-right: 3px;';
                ancorDel.appendChild(imgDel);

                let imgEdit = document.createElement('img');
                imgEdit.src = 'img/lapis.png';
                let ancorEdit = document.createElement('a');
                ancorEdit.href = '#';
                ancorEdit.appendChild(imgEdit);

                td_id.textContent = data[i].idCliente;
                td_nome.textContent = data[i].nome;
                td_cpf.textContent = data[i].cpf;
                td_logradouro.textContent = data[i].logradouro;
                td_cidade.textContent = data[i].cidade;
                td_acoes.appendChild(ancorDel);
                td_acoes.appendChild(ancorEdit);
                
            }
            document.querySelector('#cont').textContent = `Resultados: ${data.length}`;
        })
    })

})