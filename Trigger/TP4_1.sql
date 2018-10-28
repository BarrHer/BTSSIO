TP TRIGGER 4.1

2. 
DELIMITER $$
CREATE TRIGGER placeParking BEFORE INSERT ON logements FOR EACH ROW
BEGIN
  IF ((NEW.placeParking_log LIKE 0) AND (NEW.prixParking_log NOT LIKE 0)) THEN
    SET NEW.prixParking_log = NULL;
  END IF;
END; $$
DELIMITER $$;

3.
DELIMITER $$
CREATE TRIGGER superficieTotale AFTER INSERT ON piece FOR EACH ROW
BEGIN
  UPDATE logements 
  SET superficie_log = (SELECT sum(superficie_pce) FROM piece,logements WHERE logement_pce = NEW.logements.num_log)
  WHERE logement_pce = NEW.logements.num_log;
END;
DELIMITER $$;

