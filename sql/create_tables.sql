-- Lisää CREATE TABLE lauseet tähän tiedostoon
CREATE TABLE Player(
       id SERIAL PRIMARY KEY,
       name varchar(50) NOT NULL,
       password varchar(50) NOT NULL
       );

CREATE TABLE Spellbook(
       id SERIAL PRIMARY KEY,
       player_id INTEGER REFERENCES Player(id),
       name varchar(50) NOT NULL
       );

CREATE TABLE Spell(
       id SERIAL PRIMARY KEY,
       name varchar(50) NOT NULL,
       type varchar(20) NOT NULL,
       school varchar(20) NOT NULL,
       level varchar(2) NOT NULL,
       components varchar(20) NOT NULL,
       castingtime varchar(40) NOT NULL,
       range varchar(50) NOT NULL,
       effect varchar(200),
       targets varchar(200),
       duration varchar(50) NOT NULL,
       savingthrow varchar(20) NOT NULL,
       spellresistance varchar(10) NOT NULL,
       description varchar(1000) NOT NULL
       );

CREATE TABLE Spells(
       spellbook_id INTEGER REFERENCES Spellbook(id),
       spell_id INTEGER REFERENCES Spell(id)
       );
