CREATE database geo_junior;
USE geo_junior;
CREATE TABLE continent (
    id_continent INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255) not null,
    nombrePays int not null;
    image varchar(255)
);
create table pays (
    id_pays INT AUTO_INCREMENT PRIMARY KEY,
    nom varchar(255) not null,
    population bigint,
    langues varchar(255),
    id_continent int ,
    image varchar(255),
    FOREIGN KEY (id_continent) REFERENCES continent(id_continent) ON DELETE CASCADE ON UPDATE CASCADE
    );

create table ville (
    id_ville int auto_increment primary key ,
    nom varchar(255) not null,
    type enum('capitale','ville_importante', 'ville_historique', 'station_balnéaire', 'ville_industrielle', 'ville_rurale'),
    id_pays int ,
    image varchar(255),
    foreign key (id_pays) references pays(id_pays) on delete cascade on update cascade 
);

CREATE TABLE utilisateur (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100)  NOT NULL,
    email VARCHAR(200)  NOT NULL,
    image VARCHAR(250)  ,
    password VARCHAR(255) NOT NULL,
    role  ENUM('user' , 'admin') DEFAULT 'user'
);