CREATE TABLE users(
    id serial,
    first_name VARCHAR,
    last_name VARCHAR
);


CREATE TABLE articles(
    id serial,
    title VARCHAR(40),
    body TEXT,
    user_id INTEGER,
    created_at TIMESTAMP,
    updated_at TIMESTAMP
)