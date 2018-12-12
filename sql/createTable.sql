create database teaching_skills;
\c teaching_skills;

drop table user_info cascade;
drop table order_info cascade;
drop table school_info cascade;
drop table course_info cascade;
drop table account cascade;
drop table seller_info cascade;

/*
NOTE:
changes:
1) school_info: delete the location and area column(for they are not needed and are unavailable currently);
2）course_info: add parent_id column(i.e. 工科类下的计算机科学， 计算机科学下的数据库)
3） order_info: add description column
4） account: change to adopt oAuth2.0
*/
/*school info(id, name, location)*/
create table school_info(
  school_id int /*'学校id'*/,
  campus_id int /*'校区id'*/,
  school_name varchar(50) not null /* '学校名称' */,
  campus_name varchar(50) not null /* '校区名称' */,
  province varchar(50) /* '省份' */, /* in the future we need to change
                                      both province and city to their id version*/
  city varchar(50) not null /* '城市' */,
  primary key(school_id,campus_id)
);
/*course info*/
create table course_info(
  id serial/* '课程类别id' */,
  name varchar(50) /* '课程类别名' */,
  parent_id int /* '父级课程类别id' */,
  primary key(id)
);
/*user infomation*/
create table user_info(
  id bigserial,
  username varchar(20) not null,
  gender varchar(5) default 'none',
  tel varchar(20),
  wechat varchar(50),
  qq varchar(20),
  school_id int,
  campus_id int,
  major varchar(20),
  verification varchar(10),
  primary key(id),
  foreign key(school_id,campus_id) references school_info(school_id, campus_id)
);
create table account(
  id bigserial, /*用户登录的唯一id*/
  user_id bigint, /*用户登录后关联的用户id*/
  identify_type varchar(20), /*登录方式，如username,email,phone,wechat,qq,weibo*/
  identifier varchar(20), /*登录唯一标识，为登录方式所对应的值，如用户名，电话号码*/
  login_token varchar(50), /*登录凭证，站内的用户密码，站外的不保存或保存的api的access_token凭证*/
  primary key(id),
  foreign key(user_id) references user_info(id)
);
/*seller info*/
create table seller_info(
  id bigserial,
  uid bigint,
  real_name varchar(10),
  real_school_id int,
  real_campus_id int,
  real_stu_id varchar(40),
  primary key(id),
  foreign key(uid) references user_info(id),
  foreign key(real_school_id,real_campus_id) references school_info(school_id, campus_id)
);
/*course infomation*/
create table order_info(
  id bigserial/* '商品id' */,
  cid int not null /* '课程类别id' */,
  class_name varchar(20) not null /* '商品名' */,
  description varchar(100) not null /* '商品简介' */,
  school_id int not null /*  '发布学校id' */,
  campus_id int not null /* '发布校区id' */,
  seller_id int not null /* '发布人id' */,
  buyer_id int /* '购买者id' */,
  status varchar(20) default '等待中' /* '商品状态' */,
  price int not null /* '商品价格' */,
  rate int /* '商品评分' */,
  comment varchar(1000) /* '商品评价语' */,
  trace varchar(1000) /* '商品跟踪服务' */,
  primary key(id),
  foreign key(cid) references course_info(id),
  foreign key(seller_id) references seller_info(id),
  foreign key(buyer_id) references user_info(id),
  foreign key(school_id,campus_id) references school_info(school_id, campus_id)
);
