-- Lisää CREATE TABLE lauseet tähän tiedostoon
CREATE TABLE Person(
  id SERIAL PRIMARY KEY,
  name varchar(50) NOT NULL,
  password varchar(50) NOT NULL,
  is_admin boolean NOT NULL
);

CREATE TABLE Kyyti(
  id SERIAL PRIMARY KEY,
  from_place varchar(50) NOT NULL,
  to_place varchar(50) NOT NULL,
  depart_time timestamp NOT NULL
);

CREATE TABLE Viesti(
  id SERIAL PRIMARY KEY,
  text varchar(1000) NOT NULL,
  person_id INTEGER REFERENCES Person(id) on delete cascade,
  kyyti_id INTEGER REFERENCES Kyyti(id) on delete cascade
);

CREATE TABLE Person_Kyyti(
  person_id INTEGER REFERENCES Person(id) on delete cascade,
  kyyti_id INTEGER REFERENCES Kyyti(id) on delete cascade
);
