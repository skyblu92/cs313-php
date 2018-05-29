CREATE DATABASE scripture_ta;

CREATE TABLE scripture (
  id SERIAL PRIMARY KEY NOT NULL,
  book VARCHAR(80) NOT NULL,
  chapter INT NOT NULL,
  verse INT NOT NULL,
  content VARCHAR(4000) NOT NULL
  );

CREATE TABLE topics
(
	id SERIAL PRIMARY KEY NOT NULL,
	name VARCHAR(40) NOT NULL
);

CREATE TABLE topics_scripture
(
	id SERIAL PRIMARY KEY NOT NULL,
	topic_id INT REFERENCES topics(id),
	scripture_id INT REFERENCES scripture(id)
);

  INSERT INTO scripture (book, chapter, verse, content)
  VALUES ('John', 1, 5, 'And the light shineth in darkness; and the darkness comprehended it not.');

  INSERT INTO scripture (book, chapter, verse, content)
  VALUES ('Doctrine and Covenants', 88, 49, 'The light shineth in darkness, and the darkness comprehendeth it not; nevertheless, the day shall come when you shall comprehend even God, being quickened in him and by him.');

  INSERT INTO scripture (book, chapter, verse, content)
  VALUES ('Doctrine and Covenants', 93, 28, 'He that keepeth his commandments receiveth truth and light, until he is glorified in truth and knoweth all things.');

  INSERT INTO scripture (book, chapter, verse, content)
  VALUES ('Mosiah', 16, 9, 'He is the light and the life of the world; yea, a light that is endless, that can never be darkened; yea, and also a life which is endless, that there can be no more death.');

  CREATE USER ta_user WITH PASSWORD 'ta_pass';
  GRANT SELECT, INSERT, UPDATE ON scripture TO ta_user;
