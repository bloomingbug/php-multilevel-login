create database db_wp_login;

create table db_wp_login.users (
  id int auto_increment,
  name varchar(255) not null,
  username varchar(255) not null unique,
  password varchar(255) not null,
  level varchar(255) not null,
  primary key (id),
  key username_index (username) using btree
) engine=InnoDB;

insert into db_wp_login.users (name, username, password, level)
values
  ('Pusdatin', 'pusdatin@ubpk.ac.id', 'password', 'admin'),
  ('Tarmuji', 'tarmuji@ubpk.ac.id', 'password', 'mahasiswa');