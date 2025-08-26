create database biblioteca_db;
use biblioteca_db;

create table autores(
    id int not null primary key AUTO_INCREMENT,
    nome_autor varchar(100) not null,
    nacionalidade_autor varchar(50) not null,
    ano_nascimento_autor int not null    
);

create table livros(
    id int not null primary key AUTO_INCREMENT,
    genero_livro varchar(50) not null,
    ano_publicacao_livro int not null,
    id_autor INT not null,
    FOREIGN KEY (id_autor) REFERENCES autores(id)
    
);

create table leitores(
    id int not null primary key AUTO_INCREMENT,
    nome_leitor varchar(100) not null,
    email_leitor varchar(50) not null,
    telefone_leitor varchar (11) not null
);

create table emprestimos(
    id int not null primary key AUTO_INCREMENT,
    data_emprestimo date not null,
    data_devolucao date not null,
    id_livro INT not null,
    id_leitor INT not null,
    FOREIGN KEY (id_livro) REFERENCES livros(id),
    FOREIGN KEY (id_leitor) REFERENCES leitores(id)
);