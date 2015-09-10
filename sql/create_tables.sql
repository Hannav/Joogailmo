-- MIHIN MONESTA MONEEN-YHTEYS mihin tauluihin???

CREATE TABLE Kayttaja(
    id SERIAL PRIMARY KEY -- SERIAL tyyppinen pääavain pitää huolen, että tauluun lisätyllä rivillä on aina uniikki pääavain. Kätevää!
    name varchar(50) NOT NULL, -- Muista erottaa sarakkeiden määrittelyt pilkulla!
    password varchar(50) NOT NULL
);

-- 2 erilaista Kayttajaa: yllapitaja, asiakas, miten?

CREATE TABLE Laji(
    id SERIAL PRIMARY KEY
    name varchar(50) NOT NULL,
    --description varchar(400) ehkä
);

-- jooga, TRE, meditaatio, pranayama, taidetuokio

CREATE TABLE Tunti(
    id SERIAL PRIMARY KEY
    --player_id INTEGER REFERENCES Laji(name)
    kesto INTEGER NOT NULL,
    aika DATE
);

--  pvm?, klo?, kesto(min), x/x?; jos on täynnä

CREATE TABLE Varaus(
    id SERIAL PRIMARY KEY
);

-- mitä tänne tulee? Kayttaja id, Tunti id?

/*
CREATE TABLE Player(
  id SERIAL PRIMARY KEY, -- SERIAL tyyppinen pääavain pitää huolen, että tauluun lisätyllä rivillä on aina uniikki pääavain. Kätevää!
  name varchar(50) NOT NULL, -- Muista erottaa sarakkeiden määrittelyt pilkulla!
  password varchar(50) NOT NULL
);

CREATE TABLE Game(
  id SERIAL PRIMARY KEY,
  player_id INTEGER REFERENCES Player(id), -- Viiteavain Player-tauluun
  name varchar(50) NOT NULL,
  played boolean DEFAULT FALSE,
  description varchar(400),
  published DATE,
  publisher varchar(50),
  added DATE
*/