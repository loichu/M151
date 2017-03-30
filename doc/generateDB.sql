SET default_storage_engine=InnoDB;

SET FOREIGN_KEY_CHECKS = 0;

CREATE TABLE IF NOT EXISTS eleve
(
    id INT NOT NULL AUTO_INCREMENT,
    nom VARCHAR(50),
    prenom VARCHAR(50),
    fkClasse INT NOT NULL,
    PRIMARY KEY (id),
    CONSTRAINT fkEleveClasse FOREIGN KEY (fkClasse) REFERENCES classe(id)
);

CREATE TABLE IF NOT EXISTS activite
(
    id INT NOT NULL AUTO_INCREMENT,
    nomActivite VARCHAR(50),
    PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS classe
(
    id INT NOT NULL AUTO_INCREMENT,
    nomClasse VARCHAR(50),
    PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS inscrire
(
    fkEleve INT NOT NULL,
    fkActivite INT NOT NULL,
    ordrePref INT NOT NULL,
    CONSTRAINT fkEleveInscrire FOREIGN KEY (fkEleve)
        REFERENCES eleve(id),
    CONSTRAINT fkActiviteInscrire FOREIGN KEY (fkActivite)
        REFERENCES activite(id)
);

CREATE TABLE IF NOT EXISTS users
(
    id INT NOT NULL AUTO_INCREMENT,
    username VARCHAR(25),
    password VARCHAR(50),
    PRIMARY KEY (id)
);

SET FOREIGN_KEY_CHECKS = 1;