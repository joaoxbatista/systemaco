create database if not exists omnidrink;

create table users(
	id int(11) auto_increment primary key,
	nome varchar(255) not null,
	sobrenome varchar(255) not null,
	email varchar(255) not null unique,
	cpf varchar(14) not null unique,
	data_nasc date not null,
	telefone varchar(255),
	senha varchar(255) not null,
	cep varchar(255)
);

create table bars(
	id int(11) auto_increment primary key,
	nome varchar(255) not null,
	estado varchar(255) not null,
	cidade varchar(255) not null,
	bairro varchar(255) not null,
	numero int(10),
	ponto_ref varchar(255),
	cep varchar(255) not null,
	telefone varchar(14) not null,
	email varchar(255) not null unique,
	cnpj varchar(20) not null,
	stars int(1) not null
);

create table providers(
	id int(11) auto_increment primary key,
	nome varchar(255) not null,
	estado varchar(255) not null,
	cidade varchar(255) not null,
	bairro varchar(255) not null,
	numero int(10),
	ponto_ref varchar(255),
	cep varchar(255) not null,
	telefone varchar(14) not null,
	email varchar(255) not null unique,
	cnpj varchar(20) not null
);

INSERT INTO providers (nome, estado, cidade, bairro, numero, ponto_ref, cep, telefone, email, cnpj)
VALUES ('Reds L. Wk', 'Alagoas', 'Arapiraca', 'Centro', 14, 'Próximo a praça da prefeitura', '1223312312', '1311112312', 'lbkw@lbkw.com', '341222312312');

#SELECIONAR BEBIDAS COM O NOME DA CATEGORIA
SELECT drinks.*, providers.nome as nome_fornecedor from drinks
INNER JOIN providers on drinks.id_fornecedor = providers.id GROUP BY nome_fornecedor;

#SELECIONAR AS BEBIDAS DE UM USUARIOS
SELECT drinks.nome, drinks.qtd_doses, users.nome as nome_dono from drinks
INNER JOIN users on drinks.id_usuario = users.id
ORDER BY nome_dono;