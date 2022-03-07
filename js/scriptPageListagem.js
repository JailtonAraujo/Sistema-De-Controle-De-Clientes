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
            for(let i = 0;i<(data.length-1);i++){
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
            document.querySelector('#cont').textContent = `Resultados: ${(data.length-1)}`;

            let ul = document.querySelector('#ulPaginado');
            ul.textContent = '';

            console.log(data[(data.length-1)].total);
            let paginas = paginar(data[(data.length-1)].total);
            console.log(paginas);
            let url;
            for(let i = 0;i<paginas;i++){

                url = `processing.php?acao=buscarClientePaginado&buscar=${busca}&offset=${(i*5)}`;

                let Ancor = document.createElement('a');
                Ancor.classList.add('page-link');
                Ancor.onclick ="buscarClientePaginado(sasa);";
                Ancor.href ='#';
                Ancor.textContent = (i+1); 
                let li = document.createElement('li');
                li.classList.add('page-item');
                li.appendChild(Ancor);
                ul.appendChild(li);

            }
        })
    })

})

function paginar(total){
    
    totalPagina = (total/5);
    
    if(totalPagina>1 && totalPagina % 2 >0){
        totalPagina++;
    }


    return parseInt(totalPagina);
}

function buscarClientePaginado(url){
    alert(url);
}