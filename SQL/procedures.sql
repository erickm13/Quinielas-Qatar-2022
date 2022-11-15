CREATE OR REPLACE PROCEDURE quinielas.actualizarvictorias  
(  
	id integer,  
	favor integer,  
	contra integer
)  
LANGUAGE plpgsql AS  
$$  
BEGIN         
   UPDATE quinielas.equipos 
	SET goles_favor = goles_favor + favor,
		goles_contra = goles_contra + contra,
		puntos = puntos + 3,
		partidos_ganados = partidos_ganados + 1
	WHERE id_equipo = id;  
END  
$$;  
	
CREATE OR REPLACE PROCEDURE quinielas.actualizarderrotas  
    (  
        id integer,  
        favor integer,  
        contra integer
    )  
    LANGUAGE plpgsql AS  
    $$  
    BEGIN         
       UPDATE quinielas.equipos 
		SET goles_favor = goles_favor + favor,
			goles_contra = goles_contra + contra,
			partidos_perdidos = partidos_perdidos + 1
		WHERE id_equipo = id;  
    END  
    $$;  

CREATE OR REPLACE PROCEDURE quinielas.actualizarempates  
    (  
        id1 integer,  
		id2 integer,  
        goles integer  
    )  
    LANGUAGE plpgsql AS  
    $$  
    BEGIN         
       UPDATE quinielas.equipos 
		SET goles_favor = goles_favor + goles,
			goles_contra = goles_contra + goles,
			partidos_empatados = partidos_empatados + 1,
			puntos=puntos+1
		WHERE id_equipo = id1 OR id_equipo = id2;  
    END  
    $$; 	