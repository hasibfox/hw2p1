```sql
-- Creating users table

CREATE TABLE users (username VARCHAR(255) PRIMARY KEY,
    password  VARCHAR(255));
INSERT INTO users (username, password)
	VALUES("Amelia-Earhart", "Youaom139&yu7");
INSERT INTO users (username, password)
	VALUES("Otto", "StarWars2*");

-- Create ratings table
CREATE TABLE ratings (id INTEGER PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(255),
    song VARCHAR(255),
    rating INTEGER );
    INSERT INTO ratings (username, song, rating)
        VALUES("Amelia-Earhart", "Freeway", 3);
    INSERT INTO ratings (username, song, rating)
        VALUES("Amelia-Earhart", "Days of Wine and Roses", 4);
    INSERT INTO ratings (username, song, rating)
        VALUES("Otto", "Days of Wine and Roses", 5);
    INSERT INTO ratings (username, song, rating)
        VALUES("Amelia-Earhart", "These Walls", 4);

-- Add username foreign key in ratings table
ALTER TABLE `ratings` ADD CONSTRAINT `username foreign key` FOREIGN KEY (`username`) REFERENCES `users`(`username`) ON DELETE CASCADE ON UPDATE CASCADE;

-- Index song column so it can be referenced as a foreign key
ALTER TABLE `ratings` ADD INDEX(`song`);

-- Create artists table
CREATE TABLE artists (song VARCHAR(255) PRIMARY KEY,
    artist  VARCHAR(255));
INSERT INTO artists (song, artist)
	VALUES("Freeway", "Aimee Mann");
INSERT INTO artists (song, artist)
	VALUES("Days of Wine and Roses", "Bill Evans");
INSERT INTO artists (song, artist)
	VALUES("These Walls", "Kendrick Lamar");

-- Add song foreign key in artists table
ALTER TABLE `artists` ADD CONSTRAINT `song foreign key` FOREIGN KEY (`song`) REFERENCES `ratings`(`song`) ON DELETE CASCADE ON UPDATE CASCADE;


```
