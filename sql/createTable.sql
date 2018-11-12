create database teaching_skills;
\c teaching_skills;

drop table user_info cascade;
drop table order_info cascade;
drop table school_info cascade;
drop table buyer_1_info cascade;
drop table buyer_2_info cascade;
drop table seller_1_info cascade;
drop table seller_2_info cascade;
drop table school_1_1_info cascade;
drop table school_1_2_info cascade;
drop table school_2_1_info cascade;
/* NOTE: two changes:
1) remove the course_info and combine both as an order_info table
2) remove the campus_id column in school_info table and mixed with the school_id
      to keep both properties, here is the solution:
          when record the school and campus infomation, just combine into one string
          (i.e. scu jiangan: 100, 1; scu wangjiang: 100, 2) c
          here add a delimiter "," to identify whether schoolID or campus ID*/
/*user infomation*/
create table account{
  id varchar(50),
  username varchar(50),
  password varchar(50),
  primary key(id)
}
create table user_info(
  id varchar(50),
  username varchar(20) not null,
  gender varchar(5) default 'none',
  tel varchar(20),
  wechat varchar(50),
  qq varchar(20),
  school_id varchar(50),
  campus_id varchar(50),
  major varchar(20),
  verification varchar(10),
  primary key(id),
  foreign key(school_id,campus_id) references school_info(school_id, campus_id)
);
create sequence user_info_seq owned by user_info.id;
/*seller info*/
create table seller_info{
  id varchar(50),
  uid varchar(50),
  real_name varchar(10),
  real_school_id varchar(50),
  real_campus_id varchar(50),
  real_stu_id varchar(40),
  primary key(id),
  foreign key(uid) references user_info(id),
  foreign key(real_school_id,real_campus_id) references school_info(school_id, campus_id)
}
create sequence seller_info_seq owned by seller_info.id;
/*course infomation*/
create table order_info(
  id varchar(30),
  cid varchar(20) not null,
  class_name varchar(20) not null,
  school_id varchar(50) not null,
  campus_id varchar(50) not null,
  seller_id varchar(50) not null,
  buyer_id varchar(50),
  status varchar(20) default '等待中',
  price int not null,
  rate int,
  comment varchar(1000),
  trace varchar(1000),
  primary key(id),
  foreign key(cid) references course_info(id),
  foreign key(school_id,campus_id) references school_info(school_id, campus_id)
);
create sequence order_info_seq owned by order_info.id;
/*school info(id, name, location)*/
create table school_info(
  school_id varchar(50),
  campus_id varchar(50),
  school_name varchar(50) not null,
  campus_name varchar(50) not null,
  province varchar(50),
  city varchar(50) not null,
  area varchar(50) not null,
  location varchar(50) not null,
  primary key(school_id,campus_id)
);
/*course info*/
create table course_info{
  id varchar(50),
  name varchar(50),
  primary key(id)
}
create sequence course_info_seq owned by course_info.id;
