CREATE DATABASE lamp;

USE lamp;

drop table if exists lamp;

create table lamp (
    id varchar(10) not null primary key,
    title text,
    released varchar(12),
    distributor text,
    genre text,
    rating text,
    gross varchar(12),
    tickets varchar(12),
    imdb_id text, 
    
    index (title)
);
