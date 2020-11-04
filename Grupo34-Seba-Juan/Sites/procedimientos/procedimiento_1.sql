CREATE OR REPLACE FUNCTION 
generar_itinerario(array lista_ids)
RETURNS void AS
$$
DECLARE
    id int[];
BEGIN
    DROP TABLE IF EXISTS ciudades_tour;
    CREATE TABLE ciudades_tour(nombre_ciudad varchar);

    -- Este agrega a la tabla ciudades_tour 
    FOREACH id SLICE 1 in lista_ids LOOP
        INSERT INTO ciudades_tour( nombre_ciudad )
        SELECT DISTINCT nombre_ciudad FROM artistas 
        INNER JOIN obras ON nombre_artista_creador = nombre_artista 
        INNER JOIN lugares ON lugar_exhibicion = nombre_lugar WHERE id_artista = id
        ;
    END LOOP;
END
$$ language plpgsql;
