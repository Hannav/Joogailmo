-- Kayttaja-taulun testidata
INSERT INTO Kayttaja (nimi, salasana) VALUES ('Hanna', 'Hanna123');
INSERT INTO Kayttaja (nimi, salasana) VALUES ('Katja', 'Katja123');

-- Laji-taulun testidata
INSERT INTO Laji (nimi, kuvaus) VALUES ('jooga', 'asanaharjoitus');
INSERT INTO Laji (nimi, kuvaus) VALUES ('TRE', 'Tension Releasing Exercises');
INSERT INTO Laji (nimi, kuvaus) VALUES ('taidetuokio', 'Kokeillaan kaikkea. Piirrä vaikka marsu!');

-- Tunti-taulun testidata, tämän pitää vielä viitata Lajiin...
INSERT INTO Tunti (laji_id, kesto, aika, max_varaukset) VALUES (1, '60', NOW(), 4);
INSERT INTO Tunti (laji_id, kesto, aika, max_varaukset) VALUES (2, '90', NOW(), 6);
INSERT INTO Tunti (laji_id, kesto, aika, max_varaukset) VALUES (3, '120', NOW(), 8);

-- Varaus-taulun testidata
INSERT INTO Varaus (kayttaja_id, tunti_id) VALUES (2,1);
INSERT INTO Varaus (kayttaja_id, tunti_id) VALUES (2,2);
INSERT INTO Varaus (kayttaja_id, tunti_id) VALUES (2,3);