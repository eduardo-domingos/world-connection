#SET FOREIGN_KEY_CHECKS=0;
#SET FOREIGN_KEY_CHECKS=1;

CREATE DATABASE IF NOT EXISTS wc CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
USE wc;

CREATE TABLE IF NOT EXISTS admins (
    id_admin INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL COMMENT 'Nome do Admin do sistema',
    email VARCHAR(80) NOT NULL COMMENT 'Email do Admin do sistema',
    password VARCHAR(255) NOT NULL COMMENT 'Senha do Admin do sistema'
);


CREATE TABLE IF NOT EXISTS users (
    id_user INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL COMMENT 'Nome do usuário',
    email VARCHAR(50) NOT NULL UNIQUE COMMENT 'email do usuário',
    phone VARCHAR(15) NOT NULL COMMENT 'telefone do usuário',
    cpf_cnpj VARCHAR(18) NOT NULL UNIQUE COMMENT 'CNPJ ou CPF',
    password VARCHAR(255) NOT NULL COMMENT 'senha',
    type_person VARCHAR(4) NOT NULL COMMENT 'Tipo de pessoa, Física(CPF) ou Jurídica(CNPJ)'
)  ENGINE=INNODB CHARSET=UTF8MB4 COLLATE = UTF8MB4_0900_AI_CI;


CREATE TABLE IF NOT EXISTS projects (
    id_project INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    id_user INT UNSIGNED NOT NULL COMMENT 'Chave estrangeira, referência da tabela de users',
    FOREIGN KEY (id_user)
        REFERENCES users (id_user)
			ON DELETE CASCADE
			ON UPDATE CASCADE,
    title VARCHAR(50) NOT NULL COMMENT 'Título do projeto',
    team TEXT NOT NULL COMMENT 'Equipe do projeto',
    summary TEXT NOT NULL COMMENT 'Resumo sobre o projeto',
    date_start DATETIME NOT NULL COMMENT 'data de criação do projeto',
    video CHAR(11) COMMENT 'URL do projeto no youtube',
    image VARCHAR(50) NOT NULL COMMENT 'armazena o caminho da imagem salva no sistema',
    price DECIMAL(10 , 2 ) COMMENT 'Preço/Valor de investimento para o projeto em questão'
)  ENGINE=INNODB CHARSET=UTF8MB4 COLLATE = UTF8MB4_0900_AI_CI;


CREATE TABLE IF NOT EXISTS comments (
    id_comment INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    id_user INT UNSIGNED NOT NULL COMMENT 'Chave estrangeira, referência tabela users',
    FOREIGN KEY (id_user)
        REFERENCES users (id_user)
			ON DELETE CASCADE
			ON UPDATE CASCADE,
    id_project INT UNSIGNED NOT NULL COMMENT 'Chave estrangeira, referência tabela project',
    FOREIGN KEY (id_project)
        REFERENCES projects (id_project)
			ON DELETE CASCADE
			ON UPDATE CASCADE,
    comment TEXT NOT NULL COMMENT 'Comentário',
    date_comment DATETIME DEFAULT NOW() COMMENT 'Data de criação do comentário'
)  ENGINE=INNODB CHARSET=UTF8MB4 COLLATE = UTF8MB4_0900_AI_CI;


CREATE TABLE IF NOT EXISTS likes (
    id_like INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    id_project INT UNSIGNED NOT NULL COMMENT 'Chave estrangeira, referência tabela projects',
    FOREIGN KEY (id_project)
        REFERENCES projects (id_project)
        ON DELETE CASCADE ON UPDATE CASCADE,
    id_user INT UNSIGNED NOT NULL COMMENT 'Chave estrangeira, referência tabela users',
    FOREIGN KEY (id_user)
        REFERENCES users (id_user)
			ON DELETE CASCADE 
            ON UPDATE CASCADE,
    stars DECIMAL(2 , 2 ) NOT NULL COMMENT 'Quantidade de estrelas que o usuário atribui ao projeto'
)  ENGINE=INNODB CHARSET=UTF8MB4 COLLATE = UTF8MB4_0900_AI_CI;


CREATE TABLE IF NOT EXISTS financing(
    id_financing int unsigned primary key auto_increment,
    id_user int unsigned not null comment 'Chave estrangeira, referência a tabela users',
    foreign key (id_user) 
		references users(id_user)
			ON DELETE CASCADE 
            ON UPDATE CASCADE,
    id_project int unsigned not null comment 'Chave estrangeira, referência a tabela projects' ,
    foreign key (id_project) 
		references projects(id_project)
			ON DELETE CASCADE 
            ON UPDATE CASCADE,
    price decimal(10, 2) not null comment 'Preço/Valor do investimento no projeto',
    date_financing DATETIME default NOW() comment 'Data do financiamento'
) ENGINE=INNODB CHARSET=UTF8MB4 COLLATE = UTF8MB4_0900_AI_CI;


CREATE TABLE IF NOT EXISTS history_login (
    id_history_login INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    id_user INT UNSIGNED NOT NULL COMMENT 'referência do id do usuário, chave estrangeira',
    FOREIGN KEY (id_user)
        REFERENCES users (id_user)
			ON DELETE CASCADE
			ON UPDATE CASCADE,
    browser VARCHAR(100) NOT NULL COMMENT 'navegador utilizado para o login',
    ip VARCHAR(80) NOT NULL COMMENT 'ip do login',
    login_date DATETIME NOT NULL DEFAULT NOW() COMMENT 'data do login',
    attemp_login INT NOT NULL COMMENT 'tentativas de login',
    city VARCHAR(255) NOT NULL COMMENT 'cidade em que foi feito o login'
)  ENGINE=INNODB CHARSET=UTF8MB4 COLLATE = UTF8MB4_0900_AI_CI;