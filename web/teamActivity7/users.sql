--create table
CREATE TABLE user (
    id SERIAL PRIMARY KEY,
    username VARCHAR(256),
    pass VARCHAR(256)
);