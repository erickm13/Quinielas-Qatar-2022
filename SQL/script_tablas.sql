CREATE TABLE quinielas.equipos(
	id_equipo SERIAL PRIMARY KEY,
	nombre varchar(50),
	goles_favor integer DEFAULT 0,
	goles_contra integer DEFAULT 0,
	puntos integer DEFAULT 0,
	partidos_ganados integer DEFAULT 0,
	partidos_empatados integer DEFAULT 0,
	partidos_perdidos integer DEFAULT 0,
	id_grupo varchar(1));
	
CREATE TABLE quinielas.partidos(
	id_partido SERIAL PRIMARY KEY,
	fecha_hora timestamp,
	estadio varchar(100),
	id_equipo1 integer,
	id_equipo2 integer,
	goles_equipo1 integer,
	goles_equipo2 integer,
	tarjetasamarillas_equipo1 integer DEFAULT 0,
	tarjetasamarillas_equipo2 integer DEFAULT 0,
	tarjetasrojas_equipo1 integer DEFAULT 0,
	tarjetasrojas_equipo2 integer DEFAULT 0,
	fase_de_partido varchar(50),
	FOREIGN KEY (id_equipo1) REFERENCES quinielas.equipos,
	FOREIGN KEY (id_equipo2) REFERENCES quinielas.equipos);
	
CREATE TABLE quinielas.usuarios(
	password varchar(50),
	user_login varchar(50),
	nombre varchar(50),
	administrador boolean,
	punteo integer,
	PRIMARY KEY(user_login));

CREATE TABLE quinielas.quiniela(
	user_login varchar(50),
	id_partido integer,
	goles_equipo1 integer,
	goles_equipo2 integer,
	PRIMARY KEY(user_login,id_partido),
	FOREIGN KEY(user_login) REFERENCES quinielas.usuarios,
	FOREIGN KEY(id_partido) REFERENCES quinielas.partidos);