-- Lisää INSERT INTO lauseet tähän tiedostoon
INSERT INTO Person (name, password, is_admin) VALUES ('Sterling', 'dangerzone', false);
INSERT INTO Person (name, password, is_admin) VALUES ('Archer', 'phrasing', false);

INSERT INTO Kyyti (from_place, to_place, depart_time) VALUES ('Helsinki', 'Tampere', '2016-10-29 15:30:00');
INSERT INTO Kyyti (from_place, to_place, depart_time) VALUES ('Pori', 'Helsinki', '2016-11-03 07:00:00');

INSERT INTO Viesti (text, person_id, kyyti_id) values ('Hei, kyytiläiset! Vielä on tilaa.', 1, 1);

INSERT INTO Person_Kyyti (person_id, kyyti_id) values (1, 1);
INSERT INTO Person_Kyyti (person_id, kyyti_id) values (2, 2);
INSERT INTO Person_Kyyti (person_id, kyyti_id) values (1, 2);
