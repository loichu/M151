SET default_storage_engine=InnoDB;

CREATE TABLE eleve
(
    idEleve INT NOT NULL AUTO_INCREMENT,
    nom VARCHAR(50),
    prenom VARCHAR(50),
    fkClasse INT NOT NULL,
    PRIMARY KEY (idEleve)
);

CREATE TABLE activite
(
    idActivite INT NOT NULL AUTO_INCREMENT,
    nomActivite VARCHAR(50),
    PRIMARY KEY (idActivite)
);

CREATE TABLE classe
(
    idClasse INT NOT NULL AUTO_INCREMENT,
    nomClasse VARCHAR(50),
    PRIMARY KEY (idClasse)
);

CREATE TABLE inscrire
(
    fkEleve INT NOT NULL,
    fkActivite INT NOT NULL,
    ordrePref INT NOT NULL,
    CONSTRAINT fkEleveInscrire FOREIGN KEY (fkEleve)
        REFERENCES eleve(idEleve),
    CONSTRAINT fkActiviteInscrire FOREIGN KEY (fkActivite)
        REFERENCES activite(idActivite)
);

ALTER TABLE eleve
    ADD CONSTRAINT fkEleveClasse FOREIGN KEY (fkClasse)
    REFERENCES classe(idClasse)
;

CREATE TABLE users
(
    idUser INT NOT NULL AUTO_INCREMENT,
    username VARCHAR(25),
    password VARCHAR(50),
    PRIMARY KEY (idUser)
)