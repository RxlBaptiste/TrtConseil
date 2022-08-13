-- SQLite

PRAGMA foreign_key = ON;

--DROP

DROP TABLE IF EXISTS articles;
DROP TABLE IF EXISTS membres;
DROP TABLE IF EXISTS postulerpar;

--CREATE TABLE

CREATE Table articles(
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    title TEXT NOT NULL,
    lieu VARCHAR(150) NOT NULL,
    contrat TEXT NOT NULL,
    date TEXT NOT NULL,
    horaires TEXT NOT NULL,
    description TEXT NOT NULL,
    etatArticle INTEGER(1) NOT NULL,
    postulerArticle INTEGER(1) NOT NULL,
    par VARCHAR(150) NOT NULL
);

CREATE TABLE membres (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    name TEXT NOT NULL,
    firstaname varchar(150) NOT NULL,
    email VARCHAR(250) not NULL,
    password VARCHAR(100) NOT NULL,
    EntrepriseName TEXT NOT NULL,
    EntrepriseAdresse TEXT NOT NULL,
    role VARCHAR(20) NOT NULL,
    etat INTEGER(1) NOT NULL,
    cvPdf BLOB NOT NULL
);

CREATE TABLE postulerpar (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    nom VARCHAR(150) NOT NULL,
    prenom VARCHAR(150) NOT NULL,
    email VARCHAR(250) NOT NULL,
    idRef INTEGER(11) NOT NULL
);