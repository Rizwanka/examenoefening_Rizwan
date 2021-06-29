CREATE TABLE user_types (
	id INT AUTO_INCREMENT,
	type VARCHAR(255) UNIQUE,
	created_at DATETIME,
	updated_at DATETIME,
	PRIMARY KEY(id)
	)

CREATE TABLE users(
	id INT AUTO_INCREMENT,
	type_id INT,
	username VARCHAR(255) UNIQUE,
	email VARCHAR(255) UNIQUE,
	password VARCHAR(255),
	created_at DATETIME,
	updated_at DATETIME,
	PRIMARY KEY(id),
	FOREIGN KEY(type_id) REFERENCES user_types(id)
	)
CREATE TABLE gebruiker(
	id INT AUTO_INCREMENT,
	voornaam VARCHAR(255),
	achternaam VARCHAR(255),
	telefoonnummer VARCHAR(255) UNIQUE,
	email VARCHAR(255) UNIQUE,
	wachtwoord VARCHAR(255),
	admin boolean,
	PRIMARY KEY(id)
)

CREATE TABLE groep(
	id INT AUTO_INCREMENT,
	naam VARCHAR(255),
	beschrijving VARCHAR(255),
	PRIMARY KEY(id)
)

CREATE TABLE groepsleden(
	groepid INT,
	lidid INT,
	FOREIGN KEY(lid) REFERENCES gebruiker(id),
	FOREIGN KEY(groep) REFERENCES groep(id)
)

CREATE TABLE post(
	id INT AUTO_INCREMENT,
	inhoud VARCHAR(255),
	poster VARCHAR(255),
	groep VARCHAR(255),
	FOREIGN KEY(poster) REFERENCES gebruiker(id),
	FOREIGN KEY(groep) REFERENCES groep(id)
)

CREATE TABLE comment(
	id INT AUTO_INCREMENT,
	inhoud VARCHAR(255),
	commenter VARCHAR(255),
	post VARCHAR(255) UNIQUE,
	PRIMARY KEY(id),
	FOREIGN KEY(commenter) REFERENCES gebruiker(id)
)

CREATE TABLE likes(
	likediets,
	likedtype,
	liked,
	FOREIGN KEY(liked) REFERENCES gebruiker(id),
	FOREIGN KEY,
	FOREIGN KEY
)


CREATE TABLE vrienden(
	vrienda VARCHAR(255),
	vriendb VARCHAR(255),
	bevestigd boolean,
	FOREIGN KEY vrienda REFERENCES gebruiker(id),
	FOREIGN KEY vriendb REFERENCES gebruiker(id)
)

-- FOREIGN KEY(naamDk) REFERENCES naamAk(naamAk)
-- created_at DATETIME,
-- updated_at DATETIME, 
