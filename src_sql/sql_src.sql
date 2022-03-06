create database if not exists `sistema-php`;


USE `sistema-php`;

-- TABLE DE USUARIO --
create table if not exists `usuario`(
	idusuario int not null auto_increment,
    login varchar (40) not null,
    senha varchar (30) not null,
    primary key(idusuario),
    unique index `login_UNIQUE` (`login` asc) visible,
    unique index `senha_UNIQUE` (`senha` asc) visible
)engine = InnoDB
default character set = utf8;


-- TABLE CLIENTE --
create table if not exists `cliente`(
    idCliente int not null auto_increment,
    nome varchar(100) not null,
    cpf bigint not null,
    rg bigint not null,
    dataNascimento date not null,
    primary key(idCliente)
)engine = InnoDB default character set = utf8;

-- TABLE ENDERECO --
create table if not exists `endereco`(
    idEndereco int not null auto_increment,
    idCliente int not null,
    cep int (8) not null,
    logradouro varchar(60) not null,
    complemento varchar(40) not null,
    bairro varchar (40) not null,
    cidade varchar (35) not null,
    numero int not null,
    uf varchar(3) not null,
    primary key (idEndereco),
    constraint fk_endereco_cliente foreign key (idCliente) references cliente(idCliente)  
)engine = InnoDB default character set = utf8;

-- QUERY DE INSERT NO BANCO --
insert into usuario (login, senha) values ('?', '?');

--  QUERY DE CONSULTA NO BANCO --
select * from usuario;

-- QUERY DE LOGIN --
select login, idusuario from usuario where senha = '?' and login = '?';

-- QUERY DE DELETE --
delete from usuario where idusuario = ?;

