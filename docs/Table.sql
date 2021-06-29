Create database if not exists FlighTravelAir;
Use FlighTravelAir;


DROP TABLE IF EXISTS `users`;
DROP TABLE IF EXISTS `aeroportos`; --
DROP TABLE IF EXISTS `escalaaviao`;
DROP TABLE IF EXISTS `escalas`; --
DROP TABLE IF EXISTS `passagemvenda`;
DROP TABLE IF EXISTS `aviao`; --
DROP TABLE IF EXISTS `users`; -- 
DROP TABLE IF EXISTS `voos`; --


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


CREATE TABLE aeroportos (
  idAeroporto int(11) NOT NULL AUTO_INCREMENT,
  nome varchar(45) DEFAULT NULL,
  localidade varchar(45) DEFAULT NULL,
  pais varchar(45) DEFAULT NULL,
  telefone varchar(45) DEFAULT NULL,
  CONSTRAINT pk_idAeroporto PRIMARY KEY (idAeroporto)
) ENGINE=InnoDB;

insert into aeroportos(idAeroporto, nome, localidade, pais, telefone)
values
(default, 'Aeroporto Luz', 'Lisboa', 'Portugal', '262541983'),
(default, 'Aeroporto Escuro', 'Madrid', 'Espanha', '262544983'),
(default, 'Kingdom Airport', 'London', 'England', '243675876'),
(default, 'Dubai Internacional Airport', 'Dubai', 'Arabes United', '787432564');



CREATE TABLE voos (
  id int(11) NOT NULL AUTO_INCREMENT,
  descricao varchar(100) DEFAULT NULL,
  preco decimal(7,2) DEFAULT NULL,
  idAeroOrigem int(11) DEFAULT NULL,
  idAeroDestino int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY fk_voos_idAeroOrigem (idAeroOrigem),
  KEY fk_voos_idAeroDestino (idAeroDestino),
  CONSTRAINT fk_voos_idAeroOrigem FOREIGN KEY (idAeroOrigem) REFERENCES aeroportos (idAeroporto),
  CONSTRAINT fk_voos_idAeroDestino FOREIGN KEY (idAeroDestino) REFERENCES aeroportos (idAeroporto)
) ENGINE=InnoDB;

insert into voos(id, descricao, preco, idAeroOrigem, idAeroDestino)
values
(1,'Lisboa-Paris',265.00,1,2),
(2,'Londres-Dubai',679.00,1,4);


CREATE TABLE escalas (
  idEscala int(11) NOT NULL AUTO_INCREMENT,
  idAeroOrigem int(11) DEFAULT NULL,
  idAeroDestino int(11) DEFAULT NULL,
  idVoo int(11) DEFAULT NULL,
  distancia double NOT NULL,
  dOrigem DATE DEFAULT NULL,
  dDestino DATE DEFAULT NULL,
  CONSTRAINT pk_idEscala PRIMARY KEY(idEscala),
  CONSTRAINT fk_escalas_idAeroOrigem FOREIGN KEY (idAeroOrigem) references aeroportos(idAeroporto),
  CONSTRAINT fk_escalas_idAeroDestino FOREIGN KEY (idAeroDestino) references aeroportos(idAeroporto),
  CONSTRAINT fk_escalas_idVoo FOREIGN KEY (idVoo) references voos(id)
) ENGINE = InnoDB;

insert into escalas(idEscala, idAeroOrigem, idAeroDestino, idVoo, distancia, dOrigem, dDestino)
values
(1, 1, 2, 1, 1382,'1980-12-17', '1990-12-17');

CREATE TABLE aviao (
  idAviao  int(11) NOT NULL AUTO_INCREMENT,
  referencia int(11) DEFAULT NULL,
  lotacao int(11) DEFAULT NULL,
  tipoAviao varchar(45) DEFAULT NULL,
  CONSTRAINT pk_idAviao PRIMARY KEY (idAviao)
) ENGINE = InnoDB;



