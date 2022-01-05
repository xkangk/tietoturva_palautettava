-- Poistaa ja luo tietokannan
drop database if exists n0jaka00;
create database n0jaka00;

use n0jaka00;


-- Luo käyttäjä-taulun
CREATE TABLE IF NOT EXISTS kayttaja(
        username varchar(50) NOT NULL UNIQUE,
        password varchar(150) NOT NULL,
        PRIMARY KEY (username)
);


-- Luo käyttäjän tiedot -taulun
create table tiedot (
    first_name varchar(255) not null,
    last_name varchar(255) not null,
    username varchar(255) not null, 
    email varchar(255) not null,
    phone CHAR(13) not null,
    PRIMARY KEY (email)
);