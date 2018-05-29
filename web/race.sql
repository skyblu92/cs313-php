CREATE TABLE event
(
	id SERIAL PRIMARY KEY,
	name VARCHAR(100) NOT NULL,
	location VARCHAR(100) NOT NULL,
	"date" date
);

INSERT INTO event (name, location, "date") VALUES ('Color Run', 'Awesome Event Center', '2018-07-20');
INSERT INTO event (name, location, "date") VALUES ('Turkey Trot', 'Porter Park', NULL);
INSERT INTO event (name, location, "date") VALUES ('5k for bronze 5', 'Riot Games HQ', '2019-01-22');

CREATE TABLE participant
(
	id SERIAL PRIMARY KEY,
	name VARCHAR(100) NOT NULL
);