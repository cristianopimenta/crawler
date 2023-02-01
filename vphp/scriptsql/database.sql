CREATE DATABASE db_git DEFAULT CHARACTER SET utf8 DEFAULT COLLATE utf8_general_ci;

//selecione o banco de dados
USE db_git;

CREATE TABLE cad_perfil
(
id int not null primary key auto_increment,
nome varchar(100) not null,
url_git varchar(200) not null
);


