create database demo_school;
\c demo_school;

drop table if exists province cascade;
drop table if exists city cascade;
drop table if exists school cascade;

create table province(
  id varchar(4),
  name varchar(10),
  primary key(id)
);

/*collect the city info from the university info*/
create table city(
  id varchar(4),
  province_id varchar(4),
  name varchar(10),
  primary key(id),
  foreign key(province_id) references province(id)
);

/*change university table to school_info table(or say, change the structure if necessary)*/
CREATE TABLE school(
  id varchar(4),
  name varchar(20),
  province_id varchar(4),
  city_id varchar(4),
  level varchar(20),
  website varchar(30),
  abbreviation varchar(10),
  PRIMARY KEY (id),
  foreign key(province_id) references province(id),
  foreign key(city_id) references city(id)
);
