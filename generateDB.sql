CREATE TABLE T_Eleve
(
    idEleve INT NOT NULL AUTO_INCREMENT,
    nom VARCHAR(50),
    prenom VARCHAR(50),
    PRIMARY KEY (idEleve)
);

CREATE TABLE T_Activite
(
    idActivite INT NOT NULL AUTO_INCREMENT,
    nomActivite VARCHAR(50),
    PRIMARY KEY (idActivite)
);

CREATE TABLE T_Classe
(
    idClasse INT NOT NULL AUTO_INCREMENT,
    nomClasse VARCHAR(50),
    PRIMARY KEY (idClasse)
);

CREATE TABLE inscrire
(
    fkEleve INT NOT NULL,
    fkActivite INT NOT NULL,
    ordrePref INT
);

CREATE TABLE faire_partie
(
    fkEleve INT NOT NULL,
    fkClasse INT NOT NULL
);

ALTER TABLE inscrire
(
    ADD CONSTRAINT fkEleveInscrire FOREIGN KEY (fkEleve)
    REFERENCES T_Eleve(idEleve),
    ADD CONSTRAINT fkActiviteInscrire FOREIGN KEY (fkActivite)
    REFERENCES T_Activite(idActivite)
);

ALTER TABLE faire_partie
(
    ADD CONSTRAINT fkEleveFairePartie FOREIGN KEY (fkEleve)
    REFERENCES T_Eleve(idEleve),
    ADD CONSTRAINT fkClasseFairePartie FOREIGN KEY (fkClasse)
    REFERENCES T_Classe(idClasse)
);