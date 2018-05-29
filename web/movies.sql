CREATE TABLE ratings
(
	id SERIAL PRIMARY KEY,
	code VARCHAR(10) UNIQUE NOT NULL,
	name VARCHAR(100)
);

CREATE TABLE movies
(
	id SERIAL PRIMARY KEY,
	title VARCHAR(200) NOT NULL,
	year SMALLINT,
	rating_id int REFERENCES ratings(id)
);

INSERT INTO ratings(code, name) VALUES ('G', 'General Audiences');
INSERT INTO ratings(code, name) VALUES 
('PG', 'Parental Guidance Suggested'),
('PG-13', 'Parents Strongly Cautioned'),
('R', 'Restricted'),
('NR', 'Not Rated');

INSERT INTO movies(title, year, rating_id) VALUES ('The Incredibles 2', 2018, 2);
INSERT INTO movies(title, year, rating_id) VALUES ('Star Wars: A New Hope', 1977, 2);
INSERT INTO movies(title, year, rating_id) VALUES ('Star Wars: Christmas Special', 2020, 
(SELECT id FROM ratings WHERE code = 'NR'));
INSERT INTO movies(title, year, rating_id) VALUES ('Star Wars: Rogue One', 2016, 
(SELECT id FROM ratings WHERE code = 'PG-13'));

SELECT title, year FROM movies WHERE year < 2000;
SELECT * FROM movies WHERE title LIKE '%Star Wars%';

SELECT * FROM movies m
	INNER JOIN ratings r ON m.rating_id = r.id;