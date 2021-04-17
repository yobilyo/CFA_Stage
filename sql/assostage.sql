drop database if exists assostage;
create database assostage;
use assostage;

#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: Utilisateur
#------------------------------------------------------------

CREATE TABLE Utilisateur(
        id           Int  Auto_increment  NOT NULL ,
        nom          Varchar (50) NOT NULL ,
        prenom       Varchar (50) NOT NULL ,
        civilite     Enum("M","Mme", "Mlle") NOT NULL,
        date_naissance Date NOT NULL,
        droits       Enum ("administrateur","membre") NOT NULL ,
        email        Varchar (100) UNIQUE NOT NULL ,
        emailValide boolean not null,
        mdp          Varchar (50) NOT NULL ,
        tel          Varchar (10) NOT NULL , 
        adresse      Varchar (100) NOT NULL,
        codePostal  INT (5) NOT NULL ,
        ville        Varchar (50) NOT NULL,
        pays        Varchar (50) NOT NULL,
        photo_profil Varchar (100) NOT NULL

	,CONSTRAINT Utilisateur_PK PRIMARY KEY (id)
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
# Table: Mode de paiement
#------------------------------------------------------------

CREATE TABLE Mode_de_paiement(
        id   Int  Auto_increment  NOT NULL ,
        mode Varchar(30) NOT NULL,
        image_url Varchar(200) NOT NULL
	,CONSTRAINT Mode_de_paiement_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Association
#------------------------------------------------------------

CREATE TABLE Association(
        id                Int  Auto_increment  NOT NULL ,
        libelle           Varchar (30) NOT NULL ,
        email              Varchar (50) NOT NULL ,
        nbprojets         Int NOT NULL ,
        budgetProjetsTot  Float NOT NULL ,
        sommeCollecteeTot Float NOT NULL,
        photo_profil      Varchar (100) NOT NULL
	,CONSTRAINT Association_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Projet
#------------------------------------------------------------

CREATE TABLE Projet(
        id             Int  Auto_increment  NOT NULL ,
        nom            Varchar (50) NOT NULL ,
        description    Varchar (1000) NOT NULL ,
        date_lancement Date NOT NULL ,
        pays           Varchar (30) NOT NULL ,
        ville          Varchar (40) NOT NULL ,
        budget         Float NOT NULL ,
        somme_collecte Float NOT NULL ,
        id_Utilisateur Int NOT NULL ,
        id_Association Int NOT NULL
	,CONSTRAINT Projet_PK PRIMARY KEY (id)

	,CONSTRAINT Projet_Utilisateur_FK FOREIGN KEY (id_Utilisateur) REFERENCES Utilisateur(id)
	,CONSTRAINT Projet_Association0_FK FOREIGN KEY (id_Association) REFERENCES Association(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Don
#------------------------------------------------------------

CREATE TABLE Don(
        id                  Int  Auto_increment  NOT NULL ,
        montant             Float NOT NULL ,
        dateDon             Date NOT NULL ,
        appreciation        Varchar (500) NOT NULL ,
        statut              Enum ("en_attente","annule","valide") NOT NULL ,
        id_Utilisateur      Int NOT NULL ,
        id_Projet           Int NOT NULL ,
        id_Mode_de_paiement Int NOT NULL ,
        id_Association      Int NOT NULL
	,CONSTRAINT Don_PK PRIMARY KEY (id)

	,CONSTRAINT Don_Utilisateur_FK FOREIGN KEY (id_Utilisateur) REFERENCES Utilisateur(id)
	,CONSTRAINT Don_Projet0_FK FOREIGN KEY (id_Projet) REFERENCES Projet(id)
	,CONSTRAINT Don_Mode_de_paiement1_FK FOREIGN KEY (id_Mode_de_paiement) REFERENCES Mode_de_paiement(id)
	,CONSTRAINT Don_Association2_FK FOREIGN KEY (id_Association) REFERENCES Association(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Commentaire
#------------------------------------------------------------

CREATE TABLE Commentaire(
        id             Int  Auto_increment  NOT NULL ,
        dateCom		   Datetime NOT NULL ,
        contenu        Varchar (1000) NOT NULL ,
		note 		   Int Not Null,
        id_Utilisateur Int NOT NULL ,
        id_Projet      Int NOT NULL
	,CONSTRAINT Commentaire_PK PRIMARY KEY (id)

	,CONSTRAINT Commentaire_Utilisateur_FK FOREIGN KEY (id_Utilisateur) REFERENCES Utilisateur(id)
	,CONSTRAINT Commentaire_Projet0_FK FOREIGN KEY (id_Projet) REFERENCES Projet(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Image
#------------------------------------------------------------

CREATE TABLE Image(
        id        Int  Auto_increment  NOT NULL ,
        adresse   Varchar (1000) NOT NULL ,
        titre     Varchar (100) NOT NULL ,
        alt     Varchar (100) NOT NULL ,
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
        titre     Varchar (100) NOT NULL ,
        alt     Varchar (100) NOT NULL ,
        id_Projet Int NOT NULL
	,CONSTRAINT Video_PK PRIMARY KEY (id)

	,CONSTRAINT Video_Projet_FK FOREIGN KEY (id_Projet) REFERENCES Projet(id)
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

/* VIEWS SQL */
drop view if exists les_projets;
CREATE VIEW les_projets AS (
    SELECT * from projet
);

drop view if exists les_projets_image_main;
CREATE VIEW les_projets_image_main AS (
    SELECT p.id, p.nom, p.description, p.date_lancement,
    p.pays, p.ville, p.budget, p.somme_collecte,
    p.id_Utilisateur, p.id_Association,
    i.id as id_Image, i.adresse, i.titre, i.alt
    from projet p, image i
    where p.id = i.id_Projet
    and i.titre = 'main'
);

drop trigger if exists ajout_sommecollecte_don;
delimiter $
create trigger ajout_sommecollecte_don
after insert on don
for each row
begin
        update projet set somme_collecte = somme_collecte + new.montant
        where id = new.id_Projet;
end $
delimiter ;

drop trigger if exists modifie_sommecollecte_don;
delimiter $
create trigger modifie_sommecollecte_don
after update on don
for each row
begin
        update projet set somme_collecte = somme_collecte - old.montant + new.montant
        where id = new.id_Projet;
end $
delimiter ;

drop trigger if exists supprime_sommecollecte_don;
delimiter $
create trigger supprime_sommecollecte_don
after delete on don
for each row
begin
        update projet set somme_collecte = somme_collecte - old.montant
        where id = old.id_Projet;
end $
delimiter ;

drop view if exists commentaire_of_user;
CREATE VIEW commentaire_of_user AS (
        SELECT c.id, c.dateCom, c.contenu, c.note, c.id_Utilisateur, c.id_Projet, u.nom, u.prenom, u.photo_profil 
        FROM utilisateur u, commentaire c
        WHERE c.id_Utilisateur = u.id
);

drop view if exists recu_don;
create view recu_don as(
        select u.id as id_Utilisateur, u.nom as nom_Utilisateur, u.prenom, u.email,
        d.id as id_Don, d.montant, d.dateDon, d.appreciation, d.statut,
        m.id as id_Mode_de_paiement, m.image_url,
        p.id as id_Projet, p.nom as nom_Projet, p.description, p.date_lancement, p.pays, p.ville, p.budget, p.somme_collecte,
        i.id, i.adresse as adresse_Image, i.titre, i.alt,
        a.id as id_Association, a.photo_profil, a.libelle, a.nbprojets
        from utilisateur u, don d, mode_de_paiement m, projet p, image i, association a
        where u.id = d.id_Utilisateur
        and d.id_Mode_de_paiement = m.id
        and d.id_Association = a.id
        and d.id_Projet = p.id
        and p.id = i.id_Projet
        and i.titre like 'main'
);

drop view if exists commentaires_et_projets;
create view commentaires_et_projets as(
        SELECT p.nom as nom_projet, c.dateCom, c.contenu, c.note, c.id_Utilisateur, c.id_Projet
        FROM projet p, commentaire c
        WHERE p.id = c.id_Projet
);

drop view if exists dons_et_projets;
create view dons_et_projets as(
        SELECT p.nom as nom_projet, d.montant, d.dateDon, d.appreciation, d.id, d.statut, d.id_Utilisateur, d.id_Projet
        FROM projet p, don d
        WHERE p.id = d.id_Projet
);



# insertions

insert into utilisateur values
(null, "Zinedine", "Zidane", "M", "1972-06-23", "administrateur", "a@gmail.com", 1, "123", "0102030405", "15 rue de Paris", "95316", "Clignancourt", "France", "lib/images/photo_profil/zidane.jpg"),
(null, "Fabien", "Barthez", "M", "1971-06-28", "administrateur", "b@gmail.com", 1, "456", "0202030405", "87 avenue du 11 novembre 1918", "92008", "Neuilly", "France", "lib/images/photo_profil/barthez.jpg"),
(null, "Frida", "Kahlo", "Mme", "1907-07-06", "membre", "c@gmail.com", 1, "789", "0302030405", "53 rue de Paris", "95316", "Clignancourt", "France", "lib/images/photo_profil/frida.jpg"),
(null, "Rihanna", "Robyn", "Mlle", "1988-02-20", "membre", "d@gmail.com", 1, "abc", "0402030405", "68 rue Saint Michael", "12345", "Londres", "Royaume-Uni", "lib/images/photo_profil/rihanna.jpg");

INSERT INTO association VALUES (null, "Restos du coeur", "boutiqueassocfa@gmail.com", 0,0,0, "lib/images/asso-logo.png");

INSERT INTO projet values (null, "Action contre la faim", "Distribution de nourriture", "2020-12-18", "France", "Paris", 30000, 22000,1,1);
INSERT INTO projet values (null, "Lutte contre le froid", "Distribution de vetements", "2020-11-15", "France", "Marseille", 15000, 8000,1,1); 
INSERT INTO projet values (null, "Action contre la pauvrete", "Distribution d'argent", "2020-12-20", "France", "Toulouse", 15000, 13000,2,1); 


--  Action contre la faim 
insert into image values (null, "lib/images/projet/faim/main.jpg", "main", "A table !", 1);
insert into image values (null, "lib/images/projet/faim/restaurant.jpg", "restaurant", "Service nourriture !", 1);
insert into image values (null, "lib/images/projet/faim/faim.jpg", "faim", "Action contre la faim !", 1);


insert into image values (null, "lib/images/projet/froid/main.jpg", "main", "Tchin tchin !", 2);
insert into image values (null, "lib/images/projet/froid/froid_pauvrete.jpeg", "froid", "Aidez les sans abris!", 2);

insert into image values (null, "lib/images/projet/froid/lutter_contre_pauvrete.jpg", "pauvrete", "Eradiquer la pauvrete!", 3);
insert into image values (null, "lib/images/projet/pauvrete/main.jpg", "main", "L'éducation pour tous !", 3);


INSERT INTO video values (null,"https://www.youtube.com/embed/jgVqr3lS_9U", "main", "La faim ne recule pas, nous non plus !", 1);
INSERT INTO video values (null,"https://www.youtube.com/embed/q8ipLLaS1Vs", "main", "La pauvreté tue. Nous devons lutter contre ça ! ", 2);
INSERT INTO video values (null,"https://www.youtube.com/embed/UcwtcUSY0YY", "SDF-crise", "La pauvreté tue. Nous devons lutter contre ça ! ", 2);
INSERT INTO video values (null,"https://www.youtube.com/embed/BR5TsVdQZbo", "main", "La pauvreté du au covid, nous devons pas abandonner !", 3);


INSERT  into mode_de_paiement values (null, "CB", "lib/images/mode_de_paiement/cb_logo.jpg");
INSERT into mode_de_paiement values (null, "VISA", "lib/images/mode_de_paiement/visa_logo.jpg");

INSERT into mode_de_paiement values (null, "Mastercard", "lib/images/mode_de_paiement/mastercard_logo.png");
INSERT into mode_de_paiement values (null, "PayPal", "lib/images/mode_de_paiement/paypal.png");
INSERT into mode_de_paiement values (null, "Stripe", "lib/images/mode_de_paiement/stripe.png");

insert into Don values (NULL, 50, "2020-12-01", "Très bien !", "valide", 1,1,1,1);
insert into Don values (NULL, 75, "2020-11-02", "Pas mal !", "valide", 2,2,1,1);
insert into Don values (NULL, 133, "2020-11-03", "Bien vu !", "valide", 3,3,1,1);
insert into Don values (NULL, 50, "2020-12-04", "Wow !", "en_attente", 1,3,4,1);
insert into Don values (NULL, 75, "2021-01-05", "Very nice !", "en_attente", 2,1,3,1);
insert into Don values (NULL, 133, "2021-02-06", "Ca va", "valide", 3,2,2,1);

INSERT INTO commentaire values (null, "2020-12-01 10:34:09","Bon projet", 15, 1, 1);
INSERT INTO commentaire values (null, "2021-01-08 8:18:58","Pas ouf", 6, 2, 2);
INSERT INTO commentaire values (null, "2021-01-08 11:26:02","Excellent", 18, 3, 1);

