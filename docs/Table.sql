Create database if not exists FlighTravelAir;
Use FlighTravelAir;
drop database flightravelair;

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
(4, 'Sofia', 'null', 'null', 300128765, 917623789, 'gestormarketing', 'gestormarketing', 'opmarketing');

drop table aeroportos;
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
(default, 'Dubai Internacional Airport', 'Dubai', 'Arabes United', '787432564'),
(default, 'Miami Air', 'Miamai', 'United States of America', '87831263'),
(default, 'LosAngeles Airport', 'Los Angeles', 'United States of America', '87856213'),
(default, 'Paris Internacional Air', 'Paris', 'France', '91956253');


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
(1, 'Lisboa-Madrid',265.00,1,2),
(2, 'Londres-Dubai',679.00,3,4),
(3, 'Miami-LosAngeles', 450.99, 5, 6),
(4, 'Paris-Lisboa', 300.00, 7, 1),
(5, 'Lisboa-Londres', 519.00, 1, 3),
(6, 'Dubai-Miami', 1559.00, 4, 5),
(7, 'Madrid-LosAngeles', 1309.00, 2, 6),
(8, 'Londres-Paris', 240.00, 3, 7),
(9, 'Miami-Lisboa', 2559.00, 5, 1);


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
(1, 1, 2, 1, 1382,'2021-06-21', '2021-06-21', 200),
(2, 3, 4, 2, 5076, '2021-06-23', '2021-06-23', 250),
(3, 3, 4, 3, 5076, '2021-06-24', '2021-06-24', 500),
(4, 3, 1, 4, 2074, '2021-06-25', '2021-06-25', 340),
(5, 4, 2, 4, 374, '2021-06-25', '2021-06-25', 120),
(6, 5, 3, 4, 1222, '2021-06-25', '2021-06-25', 140),
(7, 7, 6, 5, 891, '2021-06-26', '2021-06-26', 224),
(8, 6, 7, 5, 2891, '2021-06-26', '2021-06-26', 224),
(9, 2, 7, 6, 1241, '2021-06-27', '2021-06-27', 530),
(10, 6, 4, 6, 8711, '2021-06-27', '2021-06-27', 300),
(11, 7, 2, 6, 1091, '2021-06-28', '2021-06-28', 530),
(12, 3, 6, 7, 670, '2021-06-29', '2021-06-29', 130),
(13, 3, 1, 7, 1191, '2021-06-29', '2021-06-30', 450),
(14, 7, 2, 8, 2748, '2021-06-30', '2021-06-30', 1230),
(15, 4, 3, 8, 248, '2021-06-30', '2021-06-30', 430),
(16, 2, 7, 8, 835, '2021-07-01', '2021-07-02', 961),
(17, 2, 3, 9, 3754, '2021-07-02', '2021-07-02', 914),
(18, 4, 2, 9, 1853, '2021-07-02', '2021-07-03', 173);


CREATE TABLE aviaos (
  idAviao  int(11) NOT NULL AUTO_INCREMENT,
  referencia varchar(45) DEFAULT NULL,
  lotacao int(11) DEFAULT NULL,
  tipoAviao varchar(45) DEFAULT NULL,
  CONSTRAINT pk_idAviao PRIMARY KEY (idAviao)
) ENGINE = InnoDB;	
 
 