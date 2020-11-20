create database agenda;
use agenda;

CREATE TABLE medico
(
	id 	  	       int auto_increment primary key,
	email 		   varchar(80)  not null,
	nome  	       varchar(100) not null,
	senha 		   text         not null,
	data_criacao   timestamp    default current_timestamp,
	data_alteracao timestamp    default current_timestamp
);

CREATE TABLE horario
(
	# horario_agendado = 0 -> liberado
	# horario_agendado = 1 -> ocupado
	
	id 		 	     int       auto_increment primary key,
	id_medico 	     int 	   not null,
	data_horario     datetime  not null,
	horario_agendado int 	   default 0,
	data_criacao     timestamp default current_timestamp,
	data_alteracao   timestamp default current_timestamp,
	FOREIGN KEY (id_medico) REFERENCES medico(id)
);