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
3） order_info: add description column; use number as status
4） account: change to adopt oAuth2.0
5) add create date and update date to each table if necessary
6) add user_mdf_order_log to log the modified info from order by seller
7）
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
  name varchar(50) unique/* '课程类别名' */,
  parent_id int /* '父级课程类别id' */,
  create_date timestamp default current_timestamp, /*添加时间*/
  last_update_date timestamp default current_timestamp, /*最后更新时间*/
  primary key(id)
);
/*user infomation*/
create table user_info(
  id serial, /*用户id*/
  username varchar(20) not null, /*用户名（可用于登录时身份验证）*/
  gender varchar(5) default 'none', /*用户性别*/
  tel varchar(20), /*用户电话*/
  wechat varchar(50), /*用户微信*/
  qq varchar(20), /*用户qq*/
  school_id int, /*用户所在学校id*/
  campus_id int, /*用户所在校区id*/
  major varchar(20), /*用户的专业*/
  balance int check (balance >= 0),
  verification varchar(10), /*是否验证为卖家*/
  create_date timestamp default current_timestamp, /*用户创建时间*/
  last_update_date timestamp default current_timestamp, /*用户信息更新时间*/
  primary key(id),
  foreign key(school_id,campus_id) references school_info(school_id, campus_id)
);
create table account(
  id serial, /*用户登录的唯一id*/
  user_id int, /*用户登录后关联的用户id*/
  identify_type varchar(20), /*登录方式，如username,email,phone,wechat,qq,weibo*/
  identifier varchar(20), /*登录唯一标识，为登录方式所对应的值，如用户名，电话号码*/
  login_token varchar(50), /*登录凭证，站内的用户密码，站外的不保存或保存的api的access_token凭证*/
  primary key(id),
  foreign key(user_id) references user_info(id)
);
/*seller info*/
create table seller_info(
  id serial, /*卖家id*/
  uid int, /*卖家的原用户id*/
  real_name varchar(10), /*卖家真名*/
  real_school_id int, /*卖家真实的学校id*/
  real_campus_id int, /*卖家真实的校区id*/
  real_stu_id varchar(40), /*卖家的真实学号*/
  balance int check (balance >= 0),
  create_date timestamp default current_timestamp, /*卖家的创建时间*/
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
  status char(2) check (status in ('0','1','2','3')) /* 商品状态: 0 -> 等待中，1 -> 准备中（即已售卖但未开始），2 -> 进行中, 3 -> 已完成*/,
  price int not null check (price >= 0)/* '商品价格' */,
  rate int /* '商品评分' */,
  comment varchar(1000) /* '商品评价语' */,
  trace varchar(1000) /* '商品跟踪服务' */,
  visibility char(1) default '1' check (visibility in ('0', '1')), /*商品是否可见： 0 -> 不可见 , 1 -> 可见*/
  create_date timestamp default current_timestamp,
  last_update_date timestamp default current_timestamp,
  primary key(id),
  foreign key(cid) references course_info(id),
  foreign key(seller_id) references seller_info(id),
  foreign key(buyer_id) references user_info(id),
  foreign key(school_id,campus_id) references school_info(school_id, campus_id)
);


/*-------------create triggers to update date from each table after modifying--------------*/



/*function to update the last_update_date in order_info table*/
create or replace function update_date_userinfo()
returns trigger as $$
begin
    new.last_update_date = now();
    return new;
end;
$$ language 'plpgsql';
/*trigger to update last_update_date after a update statement execute */
create trigger update_userinfo_date
before update on user_info for each row
execute procedure update_date_userinfo();

/*function to update the last_update_date in order_info table*/
create or replace function update_date_course()
returns trigger as $$
begin
    new.last_update_date = now();
    return new;
end;
$$ language 'plpgsql';
/*trigger to update last_update_date after a update statement execute */
create trigger update_course_date
before update on course_info for each row
execute procedure update_date_course();

/*function to update the last_update_date in order_info table */
create or replace function update_date_order()
returns trigger as $$
begin
    new.last_update_date = now();
    return new;
end;
$$ language 'plpgsql';
/*trigger to update last_update_date after a update statement execute */
create trigger update_order_date
before update on order_info for each row
execute procedure update_date_order();
