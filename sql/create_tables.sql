CREATE TABLE Kayttaja(
    id SERIAL PRIMARY KEY,
    nimi varchar(50) NOT NULL,
    salasana varchar(50) NOT NULL
);

-- TODO: 2 erilaista Kayttajaa: yllapitaja, asiakas

CREATE TABLE Laji(
    id SERIAL PRIMARY KEY,
    nimi varchar(50) NOT NULL,
    kuvaus varchar(400)
);

CREATE TABLE Tunti(
    id SERIAL PRIMARY KEY,
    laji_id INTEGER REFERENCES Laji(id),
    pvm DATE,
    klo INTEGER NOT NULL,
    kesto INTEGER NOT NULL,
    max_varaukset INTEGER NOT NULL
);

CREATE TABLE Varaus(
    id SERIAL PRIMARY KEY,
    kayttaja_id INTEGER REFERENCES Kayttaja(id),
    tunti_id INTEGER REFERENCES Tunti(id)
);