--drop table
DROP TABLE _user;

--create table
CREATE TABLE _user (
    id SERIAL PRIMARY KEY,
    username VARCHAR(256) UNIQUE,
    pass VARCHAR(256)
);