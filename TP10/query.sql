CREATE TABLE utilisateur
(
    id       INTEGER,
    login    VARCHAR(64) NOT NULL,
    password VARCHAR(64) NOT NULL,
    mail     VARCHAR(64) NOT NULL,
    nom      VARCHAR(64) NOT NULL,
    prenom   VARCHAR(64) NOT NULL,
    primary key (id)
);

CREATE TABLE etudiant
(
    id      INTEGER,
    user_id INTEGER,
    nom     VARCHAR(64) NOT NULL,
    prenom  VARCHAR(64) NOT NULL,
    note    INTEGER,
    primary key (id)
);