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
    phone VARCHAR(256) UNIQUE,
    personal_email VARCHAR(256) UNIQUE,
    work_email VARCHAR(256) UNIQUE,
    facebook VARCHAR(256) UNIQUE,
    instagram VARCHAR(256) UNIQUE,
    discord VARCHAR(256) UNIQUE
);