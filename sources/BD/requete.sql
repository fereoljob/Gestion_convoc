drop table if exists effectif;
drop table if exists competition;
drop table if exists etat;
drop table if exists convocation;
drop table if exists administrateur;
drop table if exists occupation;


create table effectif
(id_joueur int  AUTO_INCREMENT primary key,
nom varchar(15),
prenom  varchar(25),
licence  varchar(20) check (licence in ("Libre","Sans licence")),
Unique(nom,prenom)
);
create table competition
(id_compet int  AUTO_INCREMENT primary key,
nom_compet varchar(50),
nom_equipe varchar(15) check (nom_equipe in ('SENIORS_A','SENIORS_B','SENIORS_C')),
equipe_adv varchar(30),
datecompet date,
heure time,
terrain varchar(50),
site varchar(30),
unique(nom_compet,nom_equipe,equipe_adv,datecompet,heure)
);
create table etat
(id_etat int  AUTO_INCREMENT primary key,
type_absence varchar(10) check (type_absence in ('A','B','N','S')),
dateAb date,
id_joueur int references effectif(id_joueur),
unique(id_joueur,dateAb)
);
create table convocation
(id_convocation int AUTO_INCREMENT primary key,
DateConvoc date,
nomEquipe varchar(15),
publie varchar(5) check (publie in ('oui','non')),
equipe_adv varchar(20),
nbre_convok int default 0,
id_compet int references competition(id_compet),
unique(DateConvoc,nomEquipe));
create table administrateur
(
    id_admin int primary key AUTO_INCREMENT,
    nom_admin varchar(30),
    prenom_admin varchar(30),
    _login varchar(30),
    mot_de_passe varchar(30),
    typAdmin varchar(30) check(typAdmin in('Secretaire','Entraineur'))
);
create table occupation
(
    id_occup int primary key AUTO_INCREMENT,
    id_joueur int references effectif(id_joueur),
    dateOccu date,
    convo int references convocation(id_convocation),
    unique(id_joueur,dateOccu)
);
alter table competition AUTO_INCREMENT=101;
alter table etat AUTO_INCREMENT = 1001;
insert into administrateur values(null,"john","doe","Admin","Admin","Entraineur");
insert into administrateur values(null,"france","Essai","Admin2","Admin2","Secretaire");
