-- ------------- BASE DE DONNEES ------------------
CREATE SCHEMA IF NOT EXISTS MON_PROJET_GARAGE;

-- ------------- TABLE DU PERSONNEL ---------------

CREATE TABLE IF NOT EXISTS PERSONNEL(
   IDENTIFIANT 			INT 		NOT NULL PRIMARY KEY AUTO_INCREMENT,
   NOM 					VARCHAR(50) NOT NULL,
   PRENOM 				VARCHAR(50) NOT NULL,
   ADRESSE_COURRIEL 	VARCHAR(50) NOT NULL UNIQUE,
   MOT_DE_PASSE			VARCHAR(50) NOT NULL,
   EST_ADMINISTRATEUR	BOOLEAN		NOT NULL DEFAULT FALSE
);

-- Insertion des données

INSERT INTO PERSONNEL
(NOM, PRENOM, ADRESSE_COURRIEL, MOT_DE_PASSE, EST_ADMINISTRATEUR)
VALUES ("Parrot", "Vincent", "v.parrot@garage.parrot.fr", PASSWORD("v.parrot"), true);

INSERT INTO PERSONNEL
(NOM, PRENOM, ADRESSE_COURRIEL, MOT_DE_PASSE, EST_ADMINISTRATEUR)
VALUES ("Dupont", "Jose", "j.dupont@garage.parrot.fr", PASSWORD("j.dupont"), false);

INSERT INTO PERSONNEL
(NOM, PRENOM, ADRESSE_COURRIEL, MOT_DE_PASSE, EST_ADMINISTRATEUR)
VALUES ("Iourive", "Kenny", "k.iourive@garage.parrot.fr", PASSWORD("k.iourive"), false);

INSERT INTO PERSONNEL
(NOM, PRENOM, ADRESSE_COURRIEL, MOT_DE_PASSE, EST_ADMINISTRATEUR)
VALUES ("Hingue", "Carla", "c.hingue@garage.parrot.fr", PASSWORD("c.hingue"), false);

INSERT INTO PERSONNEL
(NOM, PRENOM, ADRESSE_COURRIEL, MOT_DE_PASSE, EST_ADMINISTRATEUR)
VALUES ("Heinchtaine", "Albert", "a.heinchtaine@garage.parrot.fr", PASSWORD("a.heinchtaine"), false);

-- Permet d'avoir la description de la table créée
-- DESC PERSONNEL;

-- Affiche le contenu de la table
-- SELECT * FROM PERSONNEL;

-- Supprime la table
-- DROP TABLE PERSONNEL;

-- ------------- TABLE DES VEHICULES ---------------

CREATE TABLE IF NOT EXISTS VEHICULE(
   IDENTIFIANT			INT			NOT NULL PRIMARY KEY,
   MARQUE				VARCHAR(50)	NOT NULL,
   MODELE				VARCHAR(50)	NOT NULL,
   PRIX 				INT 		NOT NULL,
   KILOMETRAGE			INT			NOT NULL,
   MOTORISATION			VARCHAR(20) NOT NULL,
   ANNEE 				SMALLINT	NOT NULL,
   NOMBRE_DE_PORTES 	TINYINT		NOT NULL,
   URLMINIATURE 		VARCHAR(150)	NOT NULL,
   MISE_EN_AVANT1 		VARCHAR(20)	NOT NULL,
   MISE_EN_AVANT2 		VARCHAR(20)	NOT NULL,
   MISE_EN_AVANT3 		VARCHAR(20)	NOT NULL,
   MISE_EN_AVANT4 		VARCHAR(20),
   MISE_EN_AVANT5		   VARCHAR(20)
);

-- Insertion des données
   
INSERT INTO VEHICULE
(IDENTIFIANT, MODELE, MARQUE, PRIX, KILOMETRAGE, MOTORISATION, ANNEE, NOMBRE_DE_PORTES, URLMINIATURE, MISE_EN_AVANT1, MISE_EN_AVANT2, MISE_EN_AVANT3)
VALUES (1, 'OPEL', 'CORSA', 30000, 35000, 'Diesel', 2016, 3, '/assets/photo voiture à vendre/opel/opel1.jpg', '4 places', 'TDI', 'Climatisation');

INSERT INTO VEHICULE
(IDENTIFIANT, MODELE, MARQUE, PRIX, KILOMETRAGE, MOTORISATION, ANNEE, NOMBRE_DE_PORTES, URLMINIATURE, MISE_EN_AVANT1, MISE_EN_AVANT2, MISE_EN_AVANT3)
VALUES (2, 'RENAULT', 'MEGANE', 41000, 65000, 'Essence', 2017, 5, '/assets/photo voiture à vendre/RENAULT CLIO ET MEGANE/MEGANE/megane2.jpg', '5 places', 'Intérieur "Premium"', 'Climatisation');
			
INSERT INTO VEHICULE
(IDENTIFIANT, MODELE, MARQUE, PRIX, KILOMETRAGE, MOTORISATION, ANNEE, NOMBRE_DE_PORTES, URLMINIATURE, MISE_EN_AVANT1, MISE_EN_AVANT2, MISE_EN_AVANT3)
VALUES (3, 'RENAULT', 'CLIO', 19000, 12000, 'Essence', 2006, 3, '/assets/photo voiture à vendre/RENAULT CLIO ET MEGANE/CLIO/clio4.jpg', '4 places', 'Carnet d\'entretien', 'Non Fumeur');
						
INSERT INTO VEHICULE
(IDENTIFIANT, MODELE, MARQUE, PRIX, KILOMETRAGE, MOTORISATION, ANNEE, NOMBRE_DE_PORTES, URLMINIATURE, MISE_EN_AVANT1, MISE_EN_AVANT2, MISE_EN_AVANT3)
VALUES (4, 'AUDI', 'QUATRO', 37000, 100000, 'Essence', 2016, 5, '/assets/photo voiture à vendre/voiture a/audi 1.jpg', '5 places', 'Familliale', 'Carbu Double Corps');

INSERT INTO VEHICULE
(IDENTIFIANT, MODELE, MARQUE, PRIX, KILOMETRAGE, MOTORISATION, ANNEE, NOMBRE_DE_PORTES, URLMINIATURE, MISE_EN_AVANT1, MISE_EN_AVANT2, MISE_EN_AVANT3)
VALUES (5, 'TESLA', 'MODEL-X', 50000, 110000, 'Electrique', 2016, 5, '/assets/photo voiture à vendre/voiture a/audi 1.jpg', '7 places', '0-100km en 5s', 'Attelage');

-- INSERT INTO VEHICULE
-- VALUES (6, );

-- INSERT INTO VEHICULE
-- VALUES (7, );

-- INSERT INTO VEHICULE
-- VALUES (8,);

-- INSERT INTO VEHICULE
-- VALUES (9, );

-- INSERT INTO VEHICULE
-- VALUES (10,);

-- Permet d'avoir la description de la table créée
-- DESC VEHICULE;

-- Affiche le contenu de la table
-- SELECT * FROM VEHICULE;

-- Supprime la table
-- DROP TABLE VEHICULE;

-- ------------- TABLE DETAIL DES VEHICULES ---------------

CREATE TABLE IF NOT EXISTS DETAIL_VEHICULE(
   IDENTIFIANT			INT			NOT NULL PRIMARY KEY,
   EQUIPEMENT1			VARCHAR(60) NOT NULL,
   EQUIPEMENT2			VARCHAR(60) NOT NULL,
   EQUIPEMENT3			VARCHAR(60) NOT NULL,
   EQUIPEMENT4			VARCHAR(60) NOT NULL,
   EQUIPEMENT5			VARCHAR(60) NOT NULL,
   EQUIPEMENT6			VARCHAR(60),
   EQUIPEMENT7			VARCHAR(60),
   EQUIPEMENT8			VARCHAR(60),
   EQUIPEMENT9			VARCHAR(60),
   EQUIPEMENT10			VARCHAR(60),
   COMMENTAIRE_VEHICULE	TEXT NOT NULL,
   FOREIGN KEY (IDENTIFIANT)
   REFERENCES VEHICULE(IDENTIFIANT)
   ON DELETE CASCADE
);

-- Insertion des données

INSERT INTO DETAIL_VEHICULE
VALUES (1, 'Equipement1', 'Equipement2', 'Equipement3', 'Equipement4', 'Equipement5',
'Equipement6', 'Equipement7', 'Equipement8', 'Equipement9', 'Equipement10',
"Super véhicule trop classe de ouf !!");

INSERT INTO DETAIL_VEHICULE
VALUES (2, 'Equipement1', 'Equipement2', 'Equipement3', 'Equipement4', 'Equipement5',
'Equipement6', 'Equipement7', 'Equipement8', 'Equipement9', 'Equipement10',
"Super véhicule trop classe de ouf !!");

INSERT INTO DETAIL_VEHICULE
VALUES (3, 'Equipement1', 'Equipement2', 'Equipement3', 'Equipement4', 'Equipement5',
'Equipement6', 'Equipement7', 'Equipement8', 'Equipement9', 'Equipement10',
"Super véhicule trop classe de ouf !!");

INSERT INTO DETAIL_VEHICULE
VALUES (4, 'Equipement1', 'Equipement2', 'Equipement3', 'Equipement4', 'Equipement5',
'Equipement6', 'Equipement7', 'Equipement8', 'Equipement9', 'Equipement10',
"Super véhicule trop classe de ouf !!");

INSERT INTO DETAIL_VEHICULE
VALUES (5, 'Equipement1', 'Equipement2', 'Equipement3', 'Equipement4', 'Equipement5',
'Equipement6', 'Equipement7', 'Equipement8', 'Equipement9', 'Equipement10',
"Super véhicule trop classe de ouf !!");

-- INSERT INTO DETAIL_VEHICULE
-- VALUES (6, );

-- INSERT INTO DETAIL_VEHICULE
-- VALUES (7, );

-- INSERT INTO DETAIL_VEHICULE
-- VALUES (8,);

-- INSERT INTO DETAIL_VEHICULE
-- VALUES (9, );

-- INSERT INTO DETAIL_VEHICULE
-- VALUES (10,);

-- Permet d'avoir la description de la table créée
-- DESC DETAIL_VEHICULE;

-- Affiche le contenu de la table
-- SELECT * FROM DETAIL_VEHICULE;

-- Supprime la table
-- DROP TABLE DETAIL_VEHICULE;

-- ------------- TABLE VISUEL DES VEHICULES ---------------

CREATE TABLE IF NOT EXISTS VISUEL_VEHICULE(
   IDENTIFIANT			  INT			NOT NULL PRIMARY KEY,
   IDENTIFIANT_VEHICULE   int			NOT NULL,
   URL_VISUEL             VARCHAR(150)	NOT NULL,
   FOREIGN KEY (IDENTIFIANT_VEHICULE)
   REFERENCES DETAIL_VEHICULE(IDENTIFIANT)
   ON DELETE CASCADE
);

-- Insertion des données
INSERT INTO VISUEL_VEHICULE
VALUES (1, 1, "/assets/photo voiture à vendre/opel/opel1.jpg");

INSERT INTO VISUEL_VEHICULE
VALUES (2, 1, "/assets/photo voiture à vendre/opel/opel2.jpg");

INSERT INTO VISUEL_VEHICULE
VALUES (3, 1, "/assets/photo voiture à vendre/opel/opel3.jpg");

INSERT INTO VISUEL_VEHICULE
VALUES (4, 1, "/assets/photo voiture à vendre/opel/opel4.jpg");

INSERT INTO VISUEL_VEHICULE
VALUES (5, 1, "/assets/photo voiture à vendre/opel/opel5.jpg");

INSERT INTO VISUEL_VEHICULE
VALUES (6, 2, "/assets/photo voiture à vendre/RENAULT CLIO ET MEGANE/MEGANE/megane1.jpg");

INSERT INTO VISUEL_VEHICULE
VALUES (7, 2, "/assets/photo voiture à vendre/RENAULT CLIO ET MEGANE/MEGANE/megane2.jpg");

INSERT INTO VISUEL_VEHICULE
VALUES (8, 2, "/assets/photo voiture à vendre/RENAULT CLIO ET MEGANE/MEGANE/megane3.jpg");

INSERT INTO VISUEL_VEHICULE
VALUES (9, 2, "/assets/photo voiture à vendre/RENAULT CLIO ET MEGANE/MEGANE/megane4.jpg");

INSERT INTO VISUEL_VEHICULE
VALUES (10, 3, "/assets/photo voiture à vendre/RENAULT CLIO ET MEGANE/CLIO/clio1.jpg");

INSERT INTO VISUEL_VEHICULE
VALUES (11, 3, "/assets/photo voiture à vendre/RENAULT CLIO ET MEGANE/CLIO/clio2.jpg");

INSERT INTO VISUEL_VEHICULE
VALUES (12, 3, "/assets/photo voiture à vendre/RENAULT CLIO ET MEGANE/CLIO/clio3.jpg");

INSERT INTO VISUEL_VEHICULE
VALUES (13, 3, "/assets/photo voiture à vendre/RENAULT CLIO ET MEGANE/CLIO/clio4.jpg");

INSERT INTO VISUEL_VEHICULE
VALUES (14, 3, "/assets/photo voiture à vendre/RENAULT CLIO ET MEGANE/CLIO/clio5.jpg");

INSERT INTO VISUEL_VEHICULE
VALUES (15, 4, "/assets/photo voiture à vendre/voiture a/audi 1.jpg");

INSERT INTO VISUEL_VEHICULE
VALUES (16, 4, "/assets/photo voiture à vendre/voiture a/audi 2.jpg");

INSERT INTO VISUEL_VEHICULE
VALUES (17, 4, "/assets/photo voiture à vendre/voiture a/audi 3.jpg");

INSERT INTO VISUEL_VEHICULE
VALUES (18, 4, "/assets/photo voiture à vendre/voiture a/audi 4.jpg");

-- INSERT INTO VISUEL_VEHICULE
-- VALUES (1, 1,);

-- INSERT INTO VISUEL_VEHICULE
-- VALUES (2, 1,);

-- INSERT INTO VISUEL_VEHICULE
-- VALUES (3, 1,);

-- INSERT INTO VISUEL_VEHICULE
-- VALUES (4, 1,);

-- INSERT INTO VISUEL_VEHICULE
-- VALUES (5, 1,);

-- INSERT INTO VISUEL_VEHICULE
-- VALUES (6, 2,);

-- INSERT INTO VISUEL_VEHICULE
-- VALUES (7, 2, );

-- Permet d'avoir la description de la table créée
-- DESC VISUEL_VEHICULE;

-- Affiche le contenu de la table
-- SELECT * FROM VISUEL_VEHICULE;

-- Supprime la table
-- DROP TABLE VISUEL_VEHICULE;

-- ------------- TABLE CORDONNEES ---------------
CREATE TABLE IF NOT EXISTS COORDONNEES(
   IDENTIFIANT								INT			NOT NULL PRIMARY KEY,
   TELEPHONE								VARCHAR(14) NOT NULL,
   ADRESSE_RUE1								VARCHAR(50) NOT NULL,
   ADRESSE_RUE2								VARCHAR(50) NOT NULL,
   CODE_POSTAL								INT         NOT NULL,
   VILLE									VARCHAR(50)	NOT NULL
);

INSERT INTO COORDONNEES
VALUES (1, '0970543233', '220 chemin long', '', 31004, 'Toulouse');

-- Permet d'avoir la description de la table créée
-- DESC CONTENU_SITE;

-- Affiche le contenu de la table
-- SELECT * FROM CONTENU_SITE;

-- Supprime la table
-- DROP TABLE CONTENU_SITE;

-- ------------- TABLE JOURS D'OUVERTURE ---------------
CREATE TABLE IF NOT EXISTS JOUR_OUVERTURE(
   IDENTIFIANT          INT NOT NULL PRIMARY KEY,
   NOM_JOUR             VARCHAR(8) NOT NULL,
   POSITION_JOUR        SMALLINT NOT NULL,
   OUVERT               BOOLEAN NOT NULL DEFAULT FALSE
);

INSERT INTO JOUR_OUVERTURE
VALUES (1, 'Lundi', 1, TRUE);

INSERT INTO JOUR_OUVERTURE
VALUES (2, 'Mardi', 2, TRUE);

INSERT INTO JOUR_OUVERTURE
VALUES (3, 'Mercredi', 3, TRUE);

INSERT INTO JOUR_OUVERTURE
VALUES (4, 'Jeudi', 4, TRUE);

INSERT INTO JOUR_OUVERTURE
VALUES (5, 'Vendredi', 5, TRUE);

INSERT INTO JOUR_OUVERTURE
VALUES (6, 'Samedi', 6, TRUE);

INSERT INTO JOUR_OUVERTURE
VALUES (7, 'Dimanche', 7, FALSE);

-- ------------- TABLE HORAIRES D'OUVERTURE ---------------
CREATE TABLE IF NOT EXISTS HORAIRE_OUVERTURE(
   IDENTIFIANT          INT NOT NULL PRIMARY KEY,
   HEURE_OUVERTURE      TIME NOT NULL,
   HEURE_FERMETURE      TIME NOT NULL
);

INSERT INTO HORAIRE_OUVERTURE
VALUES (1, '09:00', '12:00');

INSERT INTO HORAIRE_OUVERTURE
VALUES (2, '14:00', '19:00');

INSERT INTO HORAIRE_OUVERTURE
VALUES (3, '13:00', '20:00');

-- ------------- TABLE ASSOCIATION JOUR ET HORAIRES D'OUVERTURE ---------------
CREATE TABLE IF NOT EXISTS JOUR_HORAIRE(
   ID_JOUR              INT NOT NULL,
   ID_HORAIRE           INT NOT NULL,
   FOREIGN KEY (ID_JOUR)
   REFERENCES JOUR_OUVERTURE(IDENTIFIANT)
   ON DELETE CASCADE,
   FOREIGN KEY (ID_HORAIRE)
   REFERENCES HORAIRE_OUVERTURE(IDENTIFIANT)
   ON DELETE CASCADE,
   PRIMARY KEY (ID_JOUR, ID_HORAIRE)
);

INSERT INTO JOUR_HORAIRE
VALUES (1, 1);

INSERT INTO JOUR_HORAIRE
VALUES (1, 2);

INSERT INTO JOUR_HORAIRE
VALUES (2, 1);

INSERT INTO JOUR_HORAIRE
VALUES (2, 2);

INSERT INTO JOUR_HORAIRE
VALUES (3, 1);

INSERT INTO JOUR_HORAIRE
VALUES (3, 2);

INSERT INTO JOUR_HORAIRE
VALUES (4, 1);

INSERT INTO JOUR_HORAIRE
VALUES (4, 2);

INSERT INTO JOUR_HORAIRE
VALUES (5, 1);

INSERT INTO JOUR_HORAIRE
VALUES (5, 2);

INSERT INTO JOUR_HORAIRE
VALUES (6, 1);

INSERT INTO JOUR_HORAIRE
VALUES (6, 3);


-- ------------- TABLE CONTENU DU SITE ---------------

CREATE TABLE IF NOT EXISTS CONTENU_SITE(
   IDENTIFIANT								INT			NOT NULL PRIMARY KEY,
   ZONE_SITE1								TEXT		NOT NULL,
   ZONE_SITE2								TEXT		NOT NULL,
   ZONE_SITE3								TEXT		NOT NULL,
   ZONE_SITE4								TEXT		NOT NULL,
   TELEPHONE								VARCHAR(50) NOT NULL,
   ADRESSE_RUE1								VARCHAR(20) NOT NULL,
   ADRESSE_RUE2								VARCHAR(50) NOT NULL,
   CODE_POSTAL								INT         NOT NULL,
   VILLE									VARCHAR(50)	NOT NULL
);

-- Insertion des données

-- INSERT INTO CONTENU_SITE (
-- HORAIRE_OUVERTURE_LUNDI_MATIN, HORAIRE_OUVERTURE_LUNDI_APRES_MIDI, 
-- HORAIRE_OUVERTURE_MARDI_MATIN, HORAIRE_OUVERTURE_MARDI_APRES_MIDI,
-- HORAIRE_OUVERTURE_MERCREDI_MATIN, HORAIRE_OUVERTURE_MERCREDI_APRES_MIDI,
-- HORAIRE_OUVERTURE_JEUDI_MATIN, HORAIRE_OUVERTURE_JEUDI_APRES_MIDI ...)
-- VALUES (value1, value2, value3, ...);

-- UPDATE CONTENU_SITE
-- SET column1 = value1, column2 = value2, ...
-- WHERE condition; 

-- INSERT INTO CONTENU_SITE
-- VALUES (1,);

-- INSERT INTO CONTENU_SITE
-- VALUES (2,);

-- INSERT INTO CONTENU_SITE
-- VALUES (3, );

-- INSERT INTO CONTENU_SITE
-- VALUES (4, );

-- INSERT INTO CONTENU_SITE
-- VALUES (5, );

-- INSERT INTO CONTENU_SITE
-- VALUES (6, );

-- INSERT INTO CONTENU_SITE
-- VALUES (7, );

-- INSERT INTO CONTENU_SITE
-- VALUES (8, );

-- INSERT INTO CONTENU_SITE
-- VALUES (9, );

-- INSERT INTO CONTENU_SITE
-- VALUES (10, );

-- INSERT INTO CONTENU_SITE
-- VALUES (11, );

-- INSERT INTO CONTENU_SITE
-- VALUES (12, );

-- INSERT INTO CONTENU_SITE
-- VALUES (13, );

-- INSERT INTO CONTENU_SITE
-- VALUES (14, );

-- INSERT INTO CONTENU_SITE
-- VALUES (15, );

-- INSERT INTO CONTENU_SITE
-- VALUES (16, );

-- INSERT INTO CONTENU_SITE
-- VALUES (17, );

-- INSERT INTO CONTENU_SITE
-- VALUES (18, );

-- INSERT INTO CONTENU_SITE
-- VALUES (19, );

-- Permet d'avoir la description de la table créée
-- DESC CONTENU_SITE;

-- Affiche le contenu de la table
-- SELECT * FROM CONTENU_SITE;

-- Supprime la table
-- DROP TABLE CONTENU_SITE;

-- ------------- TABLE COMMENTAIRES ---------------

   CREATE TABLE IF NOT EXISTS COMMENTAIRES(
   IDENTIFIANT					INT			NOT NULL PRIMARY KEY AUTO_INCREMENT,
   NOM_AUTEUR_COMMENTAIRE		VARCHAR(50)	NOT NULL,         
   PRENOM_AUTEUR_COMMENTAIRE	VARCHAR(50)	NOT NULL, 
   COURRIEL_AUTEUR				VARCHAR(50)	NOT NULL,
   NIVEAU_SATISFACTION			INT 		NOT NULL,
   TEXTE_COMMENTAIRE			TEXT		NOT NULL,
   EST_VALIDE					BOOLEAN		NOT NULL DEFAULT FALSE
);
   
-- Insertion des données
INSERT INTO COMMENTAIRES
VALUES (1, "Garcia", "José", "jose.garcia@yahoo.fr", 5, "Très satisfait de ce garage. Equipe au top", true );

INSERT INTO COMMENTAIRES
VALUES (2, "Petit", "Caroline", "c.petit@free.fr", 5, "Je recommande ce garage. Ma voiture a été réoarée très rapidement", true );

INSERT INTO COMMENTAIRES
VALUES (3, "Dubard", "Robert", "robert.dubard@orange.fr", 4, "Satisfait, rapide et pas trop cher.", true);

-- Permet d'avoir la description de la table créée
-- DESC COMMENTAIRES;

-- Affiche le contenu de la table
-- SELECT * FROM COMMENTAIRES;

-- Supprime la table
-- DROP TABLE COMMENTAIRES;

-- ------------- TABLE SUJET DU CONTACT ---------------
-- Création de la table
CREATE TABLE IF NOT EXISTS SUJET_CONTACT(
   IDENTIFIANT			    INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
   LIBELLE_SUJET              VARCHAR(50)	NOT NULL
);

-- Insertion des données
INSERT INTO SUJET_CONTACT (LIBELLE_SUJET)
VALUES ('Achat véhicule occasion'), ('Réparation carrosserie'), ('Réparation véhicule'), ('Demande de contrôle technique');

INSERT INTO SUJET_CONTACT
VALUES (2000000, 'Autre');
-- VALUES (1, "José", "Garcia", "jose.garcia@yahoo.fr", "Très satisfait de ce garage. Equipe au top", true );


-- ------------- TABLE FORMULAIRE DE CONTACT ---------------
-- Création de la table
CREATE TABLE IF NOT EXISTS FORMULAIRE_CONTACT(
   IDENTIFIANT			    INT	NOT NULL PRIMARY KEY AUTO_INCREMENT,
   NOM_AUTEUR              VARCHAR(50)	NOT NULL,      
   PRENOM_AUTEUR            VARCHAR(50) NOT NULL,
   COURRIEL_AUTEUR          VARCHAR(50) NOT NULL,
   TELEPHONE_AUTEUR         VARCHAR(10) NOT NULL,
   ID_SUJET                  INT NOT NULL,
   TEXTE_FORMULAIRE         TEXT		NOT NULL,
   A_ETE_TRAITE             BOOLEAN		NOT NULL DEFAULT FALSE,
   FOREIGN KEY (ID_SUJET)
   REFERENCES SUJET_CONTACT(IDENTIFIANT)
   ON DELETE NO ACTION 
);

-- Insertion des données
-- INSERT INTO FORMULAIRE_CONTACT
-- VALUES (1, "José", "Garcia", "jose.garcia@yahoo.fr", "Très satisfait de ce garage. Equipe au top", true );

-- INSERT INTO FORMULAIRE_CONTACT
-- VALUES (2, "Caroline", "Petit", "c.petit@free.fr", "Je recommande ce garage. Ma voiture a été réoarée très rapidement", true );

-- INSERT INTO FORMULAIRE_CONTACT
-- VALUES (3, "Robert", "Dubard", "robert.dubard@orange.fr", "Satisfait, rapide et pas trop cher.", true);

-- Permet d'avoir la description de la table créée
-- DESC FORMULAIRE_CONTACT;

-- Affiche le contenu de la table
-- SELECT * FROM FORMULAIRE_CONTACT;

-- Supprime la table
-- DROP TABLE FORMULAIRE_CONTACT;



-- ------------- TABLE CONTACT TRAITE PAR ---------------
-- Création de la table
--
-- Rajouter une table pour faire le lien entre les salariés et les commentaires qu'ils ont traités
