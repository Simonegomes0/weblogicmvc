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
  CONSTRAINT pk_id PRIMARY KEY (id)
) ENGINE=InnoDB;

insert into aeroportos(id, nome, localidade, pais, telefone)
values
(default, 'Aeroporto Luz', 'Lisboa', 'Portugal', '262541983'),
(default, 'Aeroporto Escuro', 'Madrid', 'Espanha', '262544983'),
(default, 'Kingdom Airport', 'London', 'England', '243675876'),
(default, 'Dubai Internacional Airport', 'Dubai', 'Arabes United', '787432564');



CREATE TABLE voos (
  id int(11) NOT NULL AUTO_INCREMENT,
  descricao varchar(100) DEFAULT NULL,
  preco decimal(7,2) DEFAULT NULL,
  idaeroportoorigem int(11) DEFAULT NULL,
  idaeroportodestino int(11) DEFAULT NULL,
  PRIMARY KEY (id),
  KEY fk_voos_idAeroportoOrigem (idaeroportoorigem),
  KEY fk_voos_idAeroportoDestino (idaeroportodestino),
  CONSTRAINT fk_voos_idaeroportoorigem FOREIGN KEY (idaeroportoorigem) REFERENCES aeroportos (id),
  CONSTRAINT fk_voos_idaeroportodestino FOREIGN KEY (idaeroportodestino) REFERENCES aeroportos (id)
) ENGINE=InnoDB;


insert into voos(id, descricao, preco, idaeroportoorigem, idaeroportodestino)
values
(1,'Lisboa-Madrid',265.00,1,2),
(2,'Londres-Dubai',679.00,3,4);


CREATE TABLE escalas (
  idEscala int(11) NOT NULL AUTO_INCREMENT,
  idaeroportoorigem int(11) DEFAULT NULL,
  idaeroportodestino int(11) DEFAULT NULL,
  idVoo int(11) DEFAULT NULL,
  distancia double NOT NULL,
  dataorigem date NOT NULL,
  datadestino DATE NOT NULL,
  CONSTRAINT pk_idEscala PRIMARY KEY(idEscala),
  CONSTRAINT fk_escalas_idaeroportoorigem FOREIGN KEY (idaeroportoorigem) references aeroportos(id),
  CONSTRAINT fk_escalas_idaeroportodestino FOREIGN KEY (idaeroportodestino) references aeroportos(id),
  CONSTRAINT fk_escalas_idVoo FOREIGN KEY (idVoo) references voos(id)
) ENGINE = InnoDB;

insert into escalas(idEscala, idaeroportoorigem, idaeroportodestino, idVoo, distancia, dataorigem, datadestino)
values
(1, 1, 2, 1, 1382, 1980-12-17, 1990-12-17),
(2, 3, 4, 2, 5076, 2000-12-17, 210-12-17);

CREATE TABLE aviao (
  idAviao  int(11) NOT NULL AUTO_INCREMENT,
  referencia int(11) DEFAULT NULL,
  lotacao int(11) DEFAULT NULL,
  tipoAviao varchar(45) DEFAULT NULL,
  CONSTRAINT pk_idAviao PRIMARY KEY (idAviao)
) ENGINE = InnoDB;



