Create database if not exists FlighTravelAir;
drop database flightravelair;
Use FlighTravelAir;

DROP TABLE IF EXISTS users;

CREATE TABLE users (
  id int(11) NOT NULL AUTO_INCREMENT,
  nome varchar(80) NOT NULL,
  morada varchar(120) NOT NULL,
  email varchar(60) NOT NULL,
  nif varchar(9) NOT NULL,
  telefone varchar(9) NOT NULL,
  username varchar(30) NOT NULL,
  password varchar(30) NOT NULL,
  role varchar(15) NOT NULL,
  CONSTRAINT pk_id PRIMARY KEY (id),
  CONSTRAINT uk_users_nif UNIQUE KEY (nif)
) ENGINE=InnoDB;

drop table aeroporto;
CREATE TABLE aeroporto (
  idAeroporto int(11) NOT NULL AUTO_INCREMENT,
  nome varchar(45) DEFAULT NULL,
  localidade varchar(45) DEFAULT NULL,
  pais varchar(45) DEFAULT NULL,
  telefone varchar(45) DEFAULT NULL,
  CONSTRAINT pk_idAeroporto PRIMARY KEY (idAeroporto)
) ENGINE=InnoDB;

CREATE TABLE voo (
  idVoo int(11) NOT NULL AUTO_INCREMENT,
  preco int(3) DEFAULT NULL,
  idAeroporto int(11) not null,
  CONSTRAINT pk_idVoo PRIMARY KEY (idVoo),
  CONSTRAINT fk_idAeroporto FOREIGN KEY (idAeroporto) references aeroporto(idAeroporto)
) ENGINE=InnoDB;


CREATE TABLE escala (
  idEscala int(11) NOT NULL AUTO_INCREMENT,
  idAeroOrigem int(11) DEFAULT NULL,
  idAeroDestino int(11) DEFAULT NULL,
  idVoo int(11) DEFAULT NULL,
  dOrigem DATE DEFAULT NULL,
  dDestino DATE DEFAULT NULL,
  CONSTRAINT pk_idEscala PRIMARY KEY(idEscala),
  CONSTRAINT fk_idAeroOrigem FOREIGN KEY (idAeroOrigem) references aeroporto(idAeroporto),
  CONSTRAINT fk_idAeroDestino FOREIGN KEY (idAeroDestino) references aeroporto(idAeroporto)  
) ENGINE = InnoDB;

CREATE TABLE aviao (
  idAviao  int(11) NOT NULL AUTO_INCREMENT,
  referencia int(11) DEFAULT NULL,
  lotacao int(11) DEFAULT NULL,
  tipoAviao varchar(45) DEFAULT NULL,
  CONSTRAINT pk_idAviao PRIMARY KEY (idAviao)
) ENGINE = InnoDB;

