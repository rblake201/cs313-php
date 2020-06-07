--clean up

DROP table IF EXISTS info;
DROP table IF EXISTS contact;

--setup

CREATE table contact (
    id SERIAL PRIMARY KEY,
    first_name VARCHAR(256) NOT NULL,
    last_name VARCHAR(256)
);

CREATE table info (
    id SERIAL PRIMARY KEY,
    contact_id INT NOT NULL REFERENCES contact(id),
    phone VARCHAR(256),
    personal_email VARCHAR(256),
    work_email VARCHAR(256),
    facebook VARCHAR(256),
    instagram VARCHAR(256),
    discord VARCHAR(256) 
);

--insert

INSERT INTO contact (first_name, last_name) VALUES ('Blake', 'Pearson');
INSERT INTO contact (first_name, last_name) VALUES ('John', 'Smith');

INSERT INTO info (contact_id, phone, personal_email, work_email, facebook, instagram, discord)
VALUES (1, '123-456-7890', 'blakepersonal@gmail.com', 'blakework@gmail.com', 'Blake Pearson', '@blakepearson', 'blakegamer');

INSERT INTO info (contact_id, phone, personal_email, work_email, facebook, instagram, discord)
VALUES (2, '098-765-4321', 'johnsmith@gmail.com', 'johnwork@gmail.com', 'John Smith', '@johnsmith', 'johngamer');