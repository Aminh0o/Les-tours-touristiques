drop table if exists ACCOMPAGNER;

drop table if exists ADMINISTRATEUR;

drop table if exists ADMIN_HEBERGEMENT;

drop table if exists ADMIN_RESTAURATION;

drop table if exists ADMIN_TRANSPORT;

drop table if exists AVIS;

drop table if exists COMPTE;

drop table if exists CONTENIR;

drop table if exists FAIRE;

drop table if exists GUIDE;

drop table if exists HEBEGEMENT;

drop table if exists LAISSER;

drop table if exists NOTIF;

drop table if exists PACK;

drop table if exists PASSAGER;

drop table if exists RECRUTEMENT;

drop table if exists RESERVATION;

drop table if exists RESTAURATION;

drop table if exists TOUR;

drop table if exists TRANSPORT;

drop table if exists UTILISATEUR;

drop table if exists POSSEDE;

drop table if exists DEMANDER;

drop table if exists CONCERNER;

/*==============================================================*/
/* Table : ACCOMPAGNER                                          */
/*==============================================================*/
create table ACCOMPAGNER
(
	ID_PASSAGER          INT,
	ID_UTILISATEUR       INT,
	primary key (ID_PASSAGER, ID_UTILISATEUR)
);

/*==============================================================*/
/* Table : ADMINISTRATEUR                                       */
/*==============================================================*/
create table ADMINISTRATEUR
(
	ID_ADMIN             INT AUTO_INCREMENT PRIMARY KEY,
    ID_RESERVATION       int(10) not null,
    ID_RECRUTEMENT       int(10) not null,
    ID_EMETTEUR          int(10) not null,
    ID_AVIS              int not null,
    NUMEROPACK           int not null,
    ID_COMPTE            int(10) not null,
    NOM                  text,
    PRENOM               text,
    LOGIN_ADMIN          varchar(20) not null,
    MOT_DE_PASSE         varchar(10) not null

);

/*==============================================================*/
/* Table : ADMIN_HEBERGEMENT                                    */
/*==============================================================*/
create table ADMIN_HEBERGEMENT
(
    ID_ADMIN_HEBERG      INT AUTO_INCREMENT PRIMARY KEY,
    ID_HEBERGEMENT       int(10) not null,
    ID_EMETTEUR          int(10) not null,
    NOM                  text,
    PRENOM               text,
    LOGIN_ADMIN_HEBERG   varchar(20) not null,
    MOT_DE_PASSE         varchar(10) not null
);

/*==============================================================*/
/* Table : ADMIN_RESTAURATION                                   */
/*==============================================================*/
create table ADMIN_RESTAURATION
(
    ID_ADMIN_REST        INT AUTO_INCREMENT PRIMARY KEY,
    ID_RESTAURATION      int(10) not null,
    ID_EMETTEUR          int(10) not null,
    NOM                  text,
    PRENOM               text,
    LOGIN_ADMIN_REST     varchar(20) not null,
    MOT_DE_PASSE         varchar(10) not null
);

/*==============================================================*/
/* Table : ADMIN_TRANSPORT                                      */
/*==============================================================*/
create table ADMIN_TRANSPORT
(
    ID_ADMIN_TRANSP      INT AUTO_INCREMENT PRIMARY KEY,
	ID_TRANSPORT         int(10) not null,
	ID_EMETTEUR          int(10) not null,
	NOM                  text,
	PRENOM               text,
	LOGIN_ADMIN_TRANSP   varchar(20) not null,
	MOT_DE_PASSE         varchar(10) not null
);

/*==============================================================*/
/* Table : AVIS                                                 */
/*==============================================================*/
create table AVIS
(
    ID_AVIS              INT AUTO_INCREMENT PRIMARY KEY,
	MESSAGE_AVIS         text not null,
	EMAIL                varchar(20) not null,
	ID_USER              int(10) not null,
	RATING               numeric(5,0)
);

/*==============================================================*/
/* Table : COMPTE                                               */
/*==============================================================*/
create table COMPTE
(
	ID_COMPTE            INT AUTO_INCREMENT PRIMARY KEY,
	NOM                  text not null,
	LOGIN_COMPTE         varchar(20) not null,
	MOT_DE_PASSE         varchar(10) not null
);

/*==============================================================*/
/* Table : CONTENIR                                             */
/*==============================================================*/
create table CONTENIR
(
    ID_TOUR              INT,
	NUMEROPACK           INT,
	ID_RESTAURATION      INT,
	ID_TRANSPORT         INT,
	ID_HEBERGEMENT       INT,
	ID_GUIDE             INT,
	primary key (ID_TOUR, NUMEROPACK, ID_RESTAURATION, ID_TRANSPORT, ID_HEBERGEMENT, ID_GUIDE)
);

/*==============================================================*/
/* Table : FAIRE                                                */
/*==============================================================*/
create table FAIRE
(
    ID_UTILISATEUR       INT,
	ID_RESERVATION       INT,
	primary key (ID_UTILISATEUR, ID_RESERVATION)
);

/*==============================================================*/
/* Table : GUIDE                                                */
/*==============================================================*/
create table GUIDE
(
	ID_GUIDE             INT AUTO_INCREMENT PRIMARY KEY,
	ID_EMETTEUR          int(10) not null,
	NOM                  text,
	PRENOM               text,
	LOGIN_GUIDE          varchar(20) not null,
	MOT_DE_PASSE         varchar(10)
);

/*==============================================================*/
/* Table : HEBEGEMENT                                           */
/*==============================================================*/
create table HEBEGEMENT
(
    ID_HEBERGEMENT       INT AUTO_INCREMENT PRIMARY KEY,
	NOM                  text not null,
    TYPE_HEBERG          varchar(10) not null,
	RATING               numeric(5,0) not null,
	ADRESSE              text not null,
	TELEPHONE            numeric(10,0) not null
);

/*==============================================================*/
/* Table : LAISSER                                              */
/*==============================================================*/
create table LAISSER
(
    ID_UTILISATEUR       INT,
	ID_AVIS              INT,
	primary key (ID_UTILISATEUR, ID_AVIS)
);

/*==============================================================*/
/* Table : NOTIF                                                */
/*==============================================================*/
create table NOTIF
(
	ID_EMETTEUR          INT AUTO_INCREMENT PRIMARY KEY,
	ID_RECEPTEUR         int(10),
	MESSAGE_NOTIF        text,
	ETAT                 text
);

/*==============================================================*/
/* Table : PACK                                                 */
/*==============================================================*/
create table PACK
(
	NUMEROPACK           INT AUTO_INCREMENT PRIMARY KEY,
	NOMPACK              varchar(10) not null,
	DATE_CREATION        date not null,
	CATEGORIE            varchar(10) not null,
	WILAYA               varchar(20) not null,
	TYPE_PACK            varchar(10) not null,
	PRIX                 float not null	
);

/*==============================================================*/
/* Table : PASSAGER                                             */
/*==============================================================*/
create table PASSAGER
(
    ID_PASSAGER          INT AUTO_INCREMENT PRIMARY KEY,
	NOM                  text not null,
	PRENOM               text not null,
	DATE_DE_NAISSANCE    date
);

/*==============================================================*/
/* Table : RECRUTEMENT                                          */
/*==============================================================*/
CREATE TABLE RECRUTEMENT 
(
    ID_RECRUTEMENT       INT AUTO_INCREMENT PRIMARY KEY,
    NOM_RECRUTEUR        VARCHAR(30) NOT NULL,
    GENDER               VARCHAR(10) NOT NULL,
    DATE_DE_ENVOI        DATE NOT NULL,
    CV                   VARCHAR(100) NOT NULL
);

/*==============================================================*/
/* Table : RESERVATION                                          */
/*==============================================================*/
create table RESERVATION
(
	ID_RESERVATION       INT AUTO_INCREMENT PRIMARY KEY,
	NOM_RESERVATION      varchar(10) not null,
	DATE_RESERVATION     date not null,
	NBR_PLACES_DEMANDE   int not null
);

/*==============================================================*/
/* Table : RESTAURATION                                         */
/*==============================================================*/
create table RESTAURATION
(
    ID_RESTAURATION      INT AUTO_INCREMENT PRIMARY KEY,
	NOM                  text not null,
	ADRESSE              text not null,
	TELEPHONE            numeric(10,0) not null
);

/*==============================================================*/
/* Table : TOUR                                                 */
/*==============================================================*/
create table TOUR
(
    ID_TOUR              INT AUTO_INCREMENT PRIMARY KEY,
	NOMTOUR              text not null,
	DATE_TOUR            date not null,
	WILAYA               varchar(15) not null,
	PLACE                varchar(15) not null,
	HEURE_DEPART         time not null,
	HEURE_ARRIVE         time not null,
	CATEGORIE            varchar(10) not null
);

/*==============================================================*/
/* Table : TRANSPORT                                            */
/*==============================================================*/
create table TRANSPORT
(
	ID_TRANSPORT         INT AUTO_INCREMENT PRIMARY KEY,
	NOMACCOMPAGNE        text not null,
	TYPE_TRANSPORT       varchar(10) not null,
	ADRESSE              text not null,
	TELEPHONE            numeric(10,0) not null
);

/*==============================================================*/
/* Table : UTILISATEUR                                          */
/*==============================================================*/
create table UTILISATEUR
(
	ID_UTILISATEUR       INT AUTO_INCREMENT PRIMARY KEY,
	ID_EMETTEUR          int(10) not null,
	NOM                  text,
	PRENOM               text,
	EMAIL                varchar(20),
	DATE_DE_NAISSANCE    date,
	TELEPHONE            numeric(10,0),
	MOT_DE_PASSE         varchar(10)
);

/*==============================================================*/
/* Table : POSSEDE                                           */
/*==============================================================*/
create table POSSEDE
(
    ID_ADMIN_HEBERG      INT,
	ID_ADMIN_REST        INT,
	ID_ADMIN_TRANSP      INT,
	ID_GUIDE             INT,
	ID_COMPTE            INT,
	primary key (ID_COMPTE, ID_ADMIN_HEBERG, ID_ADMIN_REST, ID_ADMIN_TRANSP, ID_GUIDE)
);

/*==============================================================*/
/* Table : DEMANDER                                            */
/*==============================================================*/
create table DEMANDER
(
    ID_UTILISATEUR       INT,
	ID_RECRUTEMENT       INT,
	primary key (ID_UTILISATEUR, ID_RECRUTEMENT)
);

/*==============================================================*/
/* Table : CONCERNER                                            */
/*==============================================================*/
create table CONCERNER
(
    NUMEROPACK           INT,
	ID_RESERVATION       INT,
	primary key (NUMEROPACK, ID_RESERVATION)
);

alter table ACCOMPAGNER add constraint FK_ACCOMPAGNER foreign key (ID_UTILISATEUR)
      references UTILISATEUR (ID_UTILISATEUR) on delete restrict on update restrict;

alter table ACCOMPAGNER add constraint FK_ACCOMPAGNER2 foreign key (ID_PASSAGER)
      references PASSAGER (ID_PASSAGER) on delete restrict on update restrict;

alter table ADMINISTRATEUR add constraint FK_GERER foreign key (ID_RESERVATION)
      references RESERVATION (ID_RESERVATION) on delete restrict on update restrict;

alter table ADMINISTRATEUR add constraint FK_GERER1 foreign key (ID_RECRUTEMENT)
      references RECRUTEMENT (ID_RECRUTEMENT) on delete restrict on update restrict;

alter table ADMINISTRATEUR add constraint FK_GERER2 foreign key (ID_AVIS)
      references AVIS (ID_AVIS) on delete restrict on update restrict;

alter table ADMINISTRATEUR add constraint FK_GERER3 foreign key (NUMEROPACK)
      references PACK (NUMEROPACK) on delete restrict on update restrict;

alter table ADMINISTRATEUR add constraint FK_GERER4 foreign key (ID_COMPTE)
      references COMPTE (ID_COMPTE) on delete restrict on update restrict;

alter table ADMINISTRATEUR add constraint FK_RECEVER1 foreign key (ID_EMETTEUR)
      references NOTIF (ID_EMETTEUR) on delete restrict on update restrict;

alter table ADMIN_HEBERGEMENT add constraint FK_GERER7 foreign key (ID_HEBERGEMENT)
      references HEBEGEMENT (ID_HEBERGEMENT) on delete restrict on update restrict;

alter table ADMIN_HEBERGEMENT add constraint FK_RECEVER5 foreign key (ID_EMETTEUR)
      references NOTIF (ID_EMETTEUR) on delete restrict on update restrict;

alter table ADMIN_RESTAURATION add constraint FK_GERER5 foreign key (ID_RESTAURATION)
      references RESTAURATION (ID_RESTAURATION) on delete restrict on update restrict;

alter table ADMIN_RESTAURATION add constraint FK_RECEVER4 foreign key (ID_EMETTEUR)
      references NOTIF (ID_EMETTEUR) on delete restrict on update restrict;

alter table ADMIN_TRANSPORT add constraint FK_GERER6 foreign key (ID_TRANSPORT)
      references TRANSPORT (ID_TRANSPORT) on delete restrict on update restrict;

alter table ADMIN_TRANSPORT add constraint FK_RECEVER2 foreign key (ID_EMETTEUR)
      references NOTIF (ID_EMETTEUR) on delete restrict on update restrict;

alter table CONTENIR add constraint FK_CONTENIR foreign key (ID_GUIDE)
      references GUIDE (ID_GUIDE) on delete restrict on update restrict;

alter table CONTENIR add constraint FK_CONTENIR2 foreign key (ID_TOUR)
      references TOUR (ID_TOUR) on delete restrict on update restrict;

alter table CONTENIR add constraint FK_CONTENIR3 foreign key (NUMEROPACK)
      references PACK (NUMEROPACK) on delete restrict on update restrict;

alter table CONTENIR add constraint FK_CONTENIR4 foreign key (ID_RESTAURATION)
      references RESTAURATION (ID_RESTAURATION) on delete restrict on update restrict;

alter table CONTENIR add constraint FK_CONTENIR5 foreign key (ID_TRANSPORT)
      references TRANSPORT (ID_TRANSPORT) on delete restrict on update restrict;

alter table CONTENIR add constraint FK_CONTENIR6 foreign key (ID_HEBERGEMENT)
      references HEBEGEMENT (ID_HEBERGEMENT) on delete restrict on update restrict;

alter table FAIRE add constraint FK_FAIRE foreign key (ID_RESERVATION)
      references RESERVATION (ID_RESERVATION) on delete restrict on update restrict;

alter table FAIRE add constraint FK_FAIRE2 foreign key (ID_UTILISATEUR)
      references UTILISATEUR (ID_UTILISATEUR) on delete restrict on update restrict;

alter table GUIDE add constraint FK_RECEVER3 foreign key (ID_EMETTEUR)
      references NOTIF (ID_EMETTEUR) on delete restrict on update restrict;

alter table LAISSER add constraint FK_LAISSER foreign key (ID_AVIS)
      references AVIS (ID_AVIS) on delete restrict on update restrict;

alter table LAISSER add constraint FK_LAISSER2 foreign key (ID_UTILISATEUR)
      references UTILISATEUR (ID_UTILISATEUR) on delete restrict on update restrict;

alter table UTILISATEUR add constraint FK_RECEVER foreign key (ID_EMETTEUR)
      references NOTIF (ID_EMETTEUR) on delete restrict on update restrict;

alter table POSSEDE add constraint FK_POSSEDE foreign key (ID_ADMIN_HEBERG)
      references ADMIN_HEBERGEMENT (ID_ADMIN_HEBERG) on delete restrict on update restrict;

alter table POSSEDE add constraint FK_POSSEDE1 foreign key (ID_ADMIN_REST)
      references ADMIN_RESTAURATION (ID_ADMIN_REST) on delete restrict on update restrict;

alter table POSSEDE add constraint FK_POSSEDE2 foreign key (ID_ADMIN_TRANSP)
      references ADMIN_TRANSPORT (ID_ADMIN_TRANSP) on delete restrict on update restrict;

alter table POSSEDE add constraint FK_POSSEDE3 foreign key (ID_GUIDE)
      references GUIDE (ID_GUIDE) on delete restrict on update restrict;

alter table POSSEDE add constraint FK_POSSEDE4 foreign key (ID_COMPTE)
      references COMPTE (ID_COMPTE) on delete restrict on update restrict;

alter table DEMANDER add constraint FK_DEMANDER foreign key (ID_UTILISATEUR)
      references UTILISATEUR (ID_UTILISATEUR) on delete restrict on update restrict;

alter table DEMANDER add constraint FK_DEMANDER1 foreign key (ID_RECRUTEMENT)
      references RECRUTEMENT (ID_RECRUTEMENT) on delete restrict on update restrict;

alter table CONCERNER add constraint FK_CONCERNER foreign key (NUMEROPACK)
      references PACK (NUMEROPACK) on delete restrict on update restrict;

alter table CONCERNER add constraint FK_CONCERNER1 foreign key (ID_RESERVATION)
      references RESERVATION (ID_RESERVATION) on delete restrict on update restrict;
