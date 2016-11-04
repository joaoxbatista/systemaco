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