-- Kayttaja-taulun testidata
INSERT INTO Kayttaja (nimi, salasana) VALUES ('Hanna', 'Hanna123');
INSERT INTO Kayttaja (nimi, salasana) VALUES ('Katja', 'Katja123');

-- Laji-taulun testidata
INSERT INTO Laji (nimi, kuvaus) VALUES ('Jooga', 'Asanaharjoitus');
INSERT INTO Laji (nimi, kuvaus) VALUES ('TRE', 'Tension Releasing Exercises');
INSERT INTO Laji (nimi, kuvaus) VALUES ('Taidetuokio', 'Kokeillaan kaikkea. Piirrä vaikka marsu!');

-- Tunti-taulun testidata, tämän pitää vielä viitata Lajiin...
INSERT INTO Tunti (laji_id, pvm, klo, kesto, max_varaukset) VALUES (1, '2015-09-25', '1800', '60', 4);
INSERT INTO Tunti (laji_id, pvm, klo, kesto, max_varaukset) VALUES (2, '2015-09-25', '1915', '90', 6);
INSERT INTO Tunti (laji_id, pvm, klo, kesto, max_varaukset) VALUES (3, '2015-09-26', '1100', '120', 8);

-- Varaus-taulun testidata
INSERT INTO Varaus (kayttaja_id, tunti_id) VALUES (2,1);
INSERT INTO Varaus (kayttaja_id, tunti_id) VALUES (2,2);
INSERT INTO Varaus (kayttaja_id, tunti_id) VALUES (2,3);