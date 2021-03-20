drop table if exists effectif;
drop table if exists competition;
drop table if exists etat;
-------creation
create table effectif
(id_joueur int not null AUTO_INCREMENT primary key,
nom varchar(10),
prenom  varchar(15),
licence  varchar(5) check (licence = "Libre"),
selectionnee varchar(4) check (selectionnee in ('oui','non')),
Unique(nom,prenom)
id_convocation varchar(30) references convocation(id_convocation)
);
create table competition
(id_compet int NOT NULL AUTO_INCREMENT primary key,
nom_compet varchar(50),
nom_equipe varchar(15) check (nom_equipe in ('SENIORS_A','SENIORS_B','SENIORS_C')),
equipe_adv varchar(30),
datecompet date,
heure time,
terrain varchar(50),
sites varchar(30),
unique(nom_compet,nom_equipe,equipe_adv,datecompet,heure)
);
create table etat
(id_etat int not null AUTO_INCREMENT primary key,
type_absence varchar(10) check (type_absence in ('A','B','N','S')),
dateAb date,
id_joueur int references effectif(id_joueur),
unique(id_joueur,dateAb)
);
create table convocation
(id_convocation varchar(30) AUTO_INCREMENT primary key,
DateConvoc date,
nomEquipe varchar(15),
publie varchar(5) check (publie in ('oui','non')),
equipe_adv varchar(20),
unique(DateConvoc,nomEquipe));
create table administrateur
(
    id_admin int not primary key AUTO_INCREMENT,
    nom_admin varchar(30),
    prenom_admin varchar(30),
    _login varchar(30),
    mot_de_passe varchar(30),
    typAdmin varchar check(typAdmin in('Secretaire','Entraineur'))
);
alter table competition AUTO_INCREMENT=101;
alter table etat AUTO_INCREMENT = 1001;
