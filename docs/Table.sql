Create database if not exists FlighTravelAir;
Use FlighTravelAir;


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


insert into users values
(1, 'Jorge', 'null', 'null', 123455432, 987654321, 'admin', 'admin', 'admin'),
(2, 'Carlos', 'null', 'null', 123443215, 987654321, 'gestorvoo', 'gestorvoo', 'gestorvoo'),
(3, 'Maria', 'null', 'null', 543214321, 987654321, 'opcheckin', 'opcheckin', 'opcheckin'),
(4, 'Sofia', 'null', 'null', 300128765, 917623789, 'gestormarketing', 'gestormarketing', 'gestormarketing');

CREATE TABLE aeroportos (
  id int(11) NOT NULL AUTO_INCREMENT,
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

drop table escalas;
CREATE TABLE escalas (
  id int(11) NOT NULL AUTO_INCREMENT,
  idaeroportoorigem int(11) DEFAULT NULL,
  idaeroportodestino int(11) DEFAULT NULL,
  idVoo int(11) DEFAULT NULL,
  distancia double NOT NULL,
  dataorigem date NOT NULL,
  datadestino DATE NOT NULL,
  custo decimal(7,2) DEFAULT NULL,
  CONSTRAINT pk_id PRIMARY KEY(id),
  CONSTRAINT fk_escalas_idaeroportoorigem FOREIGN KEY (idaeroportoorigem) references aeroportos(id),
  CONSTRAINT fk_escalas_idaeroportodestino FOREIGN KEY (idaeroportodestino) references aeroportos(id),
  CONSTRAINT fk_escalas_idVoo FOREIGN KEY (idVoo) references voos(id)
) ENGINE = InnoDB;

insert into escalas(id, idaeroportoorigem, idaeroportodestino, idVoo, distancia, dataorigem, datadestino, custo)
values
(1, 1, 2, 1, 1382,'2021-06-21', '2021-06-24', 20),
(2, 3, 4, 2, 5076, '2021-06-22', '2021-06-26', 50);

CREATE TABLE aviao (
  idAviao  int(11) NOT NULL AUTO_INCREMENT,
  referencia int(11) DEFAULT NULL,
  lotacao int(11) DEFAULT NULL,
  tipoAviao varchar(45) DEFAULT NULL,
  CONSTRAINT pk_idAviao PRIMARY KEY (idAviao)
) ENGINE = InnoDB;



