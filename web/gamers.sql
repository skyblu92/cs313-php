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
	gamertag VARCHAR(50)

);

INSERT INTO games(name, system_name) VALUES ('League of Legends', 'PC');
INSERT INTO games(name, system_name) VALUES ('StarCraft 2', 'PC');
INSERT INTO games(name, system_name) VALUES ('Fortnite', 'PC');

INSERT INTO games(name, system_name) VALUES ('Fortnite', 'PS4');
INSERT INTO games(name, system_name) VALUES ('Fortnite', 'Xbox One');
INSERT INTO games(name, system_name) VALUES ('Call of Duty: Infinite Warfare', 'PS4');
INSERT INTO games(name, system_name) VALUES ('Call of Duty: Infinite Warfare', 'Xbox One');

INSERT INTO games(name, system_name) VALUES ('Player Unknown\'s Battlegrounds', 'PC');
INSERT INTO games(name, system_name) VALUES ('Player Unknown\'s Battlegrounds', 'Xbox One');

INSERT INTO games(name, system_name) VALUES ('Super Smash Bros', 'Wii U');
INSERT INTO games(name, system_name) VALUES ('Settlers of Catan', 'Tabletop');


INSERT INTO users(firstName, lastName, notes) VALUES ('Skyler', 'Blumenthal', 'I am ranked Silver 2 in League of Legends.');
INSERT INTO users(firstName, lastName, notes) VALUES ('Jimmy', 'McGee', 'Love me some CS 313.');
INSERT INTO users(firstName, notes) VALUES ('Johnathon', 'you dont need to know my last name. Also, come at me in PUBG fam.');

