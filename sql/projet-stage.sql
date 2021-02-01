#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: User
#------------------------------------------------------------

CREATE TABLE User(
        id           Int  Auto_increment  NOT NULL ,
        nom          Varchar (50) NOT NULL ,
        prenom       Varchar (50) NOT NULL ,
        droits       Enum ("administrateur","utilisateur") NOT NULL ,
        email        Varchar (100) NOT NULL ,
        mdp          Varchar (50) NOT NULL ,
        photo_profil Varchar (300) NOT NULL
	,CONSTRAINT User_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Projet
#------------------------------------------------------------

CREATE TABLE Projet(
        id             Int  Auto_increment  NOT NULL ,
        description    Varchar (1000) NOT NULL ,
        date_lancement Date NOT NULL ,
        pays           Varchar (30) NOT NULL ,
        ville          Varchar (40) NOT NULL ,
        budget         Float NOT NULL ,
        somme_collecte Float NOT NULL ,
        id_User        Int NOT NULL
	,CONSTRAINT Projet_PK PRIMARY KEY (id)

	,CONSTRAINT Projet_User_FK FOREIGN KEY (id_User) REFERENCES User(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Don
#------------------------------------------------------------

CREATE TABLE Don(
        id            Int  Auto_increment  NOT NULL ,
        montant       Float NOT NULL ,
        date          Date NOT NULL ,
        appreciation  Varchar (500) NOT NULL ,
        statut        Enum ("en_attente","annule","valide") NOT NULL ,
        mode_paiement Varchar (30) NOT NULL ,
        id_User       Int NOT NULL ,
        id_Projet     Int NOT NULL
	,CONSTRAINT Don_PK PRIMARY KEY (id)

	,CONSTRAINT Don_User_FK FOREIGN KEY (id_User) REFERENCES User(id)
	,CONSTRAINT Don_Projet0_FK FOREIGN KEY (id_Projet) REFERENCES Projet(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Commentaire
#------------------------------------------------------------

CREATE TABLE Commentaire(
        id        Int  Auto_increment  NOT NULL ,
        date      Date NOT NULL ,
        contenu   Varchar (1000) NOT NULL ,
        note      Varchar (1000) NOT NULL ,
        id_User   Int NOT NULL ,
        id_Projet Int NOT NULL
	,CONSTRAINT Commentaire_PK PRIMARY KEY (id)

	,CONSTRAINT Commentaire_User_FK FOREIGN KEY (id_User) REFERENCES User(id)
	,CONSTRAINT Commentaire_Projet0_FK FOREIGN KEY (id_Projet) REFERENCES Projet(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Image
#------------------------------------------------------------

CREATE TABLE Image(
        id        Int  Auto_increment  NOT NULL ,
        adresse   Varchar (1000) NOT NULL ,
        titre     Varchar (1000) NOT NULL ,
        id_Projet Int NOT NULL
	,CONSTRAINT Image_PK PRIMARY KEY (id)

	,CONSTRAINT Image_Projet_FK FOREIGN KEY (id_Projet) REFERENCES Projet(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Video
#------------------------------------------------------------

CREATE TABLE Video(
        id        Int  Auto_increment  NOT NULL ,
        adresse   Varchar (1000) NOT NULL ,
        titre     Varchar (1000) NOT NULL ,
        id_Projet Int NOT NULL
	,CONSTRAINT Video_PK PRIMARY KEY (id)

	,CONSTRAINT Video_Projet_FK FOREIGN KEY (id_Projet) REFERENCES Projet(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: mot_clef
#------------------------------------------------------------

CREATE TABLE mot_clef(
        id  Int  Auto_increment  NOT NULL ,
        mot Varchar (30) NOT NULL
	,CONSTRAINT mot_clef_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Decrire
#------------------------------------------------------------

CREATE TABLE Decrire(
        id          Int NOT NULL ,
        id_mot_clef Int NOT NULL
	,CONSTRAINT Decrire_PK PRIMARY KEY (id,id_mot_clef)

	,CONSTRAINT Decrire_Projet_FK FOREIGN KEY (id) REFERENCES Projet(id)
	,CONSTRAINT Decrire_mot_clef0_FK FOREIGN KEY (id_mot_clef) REFERENCES mot_clef(id)
)ENGINE=InnoDB;
