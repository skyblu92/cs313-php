CREATE TABLE games
(
	id SERIAL PRIMARY KEY,
	name VARCHAR(100) NOT NULL,
	system_name VARCHAR(30)
);

CREATE TABLE users
(
	id SERIAL PRIMARY KEY,
	firstName VARCHAR(50) NOT NULL,
	lastName VARCHAR(75),
	notes VARCHAR(512)
);

CREATE TABLE systems
(
	id SERIAL PRIMARY KEY,
	name VARCHAR(50) NOT NULL
);

CREATE TABLE users_games
(
	id SERIAL PRIMARY KEY,
	userID INT REFERENCES users(id) NOT NULL,
	gameID INT REFERENCES games(id) NOT NULL,
	gamertag VARCHAR(50) NOT NULL

);

INSERT INTO games(name, system_name) VALUES ('League of Legends', 'PC');
INSERT INTO games(name, system_name) VALUES ('Fortnite', 'PC');
INSERT INTO games(name, system_name) VALUES ('StarCraft 2', 'PC');
INSERT INTO games(name, system_name) VALUES ('Call of Duty: Infinite Warfare', 'PS4');

INSERT INTO users(firstName, lastName, gamertag, notes) VALUES ('Skyler', 'Blumenthal'
																, 'jimbob6'
																, 'I am ranked Silver 2 in League of Legends. I also love to play Super Smash Bros!');
INSERT INTO users(firstName, lastName, gamertag, notes) VALUES ('Jimbo', 'McGee'
																, 'userName555'
																, 'Love me some Tryndamere.');
INSERT INTO users(firstName, gamertag, notes) VALUES ('Johnathon'
														, 'hiddenUser355'
														, 'you dont need to know my last name. Also, come at me in PUBG fam');

