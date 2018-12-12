/*

-------------logs for seller, user, and admin -------------


*/
/*log table index:
1) user_mdf_order_log -- for seller to modify order info
2) dba_mdf_course_log -- for admin to modify order info
3) dba_mdf_school_log -- for admin to modify order info
4) user_money_history -- for user to store recharge or consume history
5) seller_money_history -- for seller to store get or withdraw history
*/
drop table user_mdf_order_log cascade;
drop table dba_mdf_course_log cascade;
drop table dba_mdf_school_log cascade;
drop table user_money_history cascade;
drop table seller_money_history cascade;
/*-------------logging for seller to modify order info--------------------*/


create table user_mdf_order_log(
  id bigserial,
  order_id bigint,
  seller_id int,
  operate_type char(2) check (operate_type in ('0','1','2')), /* 1: modify, 2: delete*/
  operate_column varchar(20),
  before_val varchar(50),
  after_val varchar(50),
  opearte_time timestamp default current_timestamp,
  primary key(id),
  foreign key(seller_id) references seller_info(id),
  foreign key(order_id) references order_info(id)
);
/*function*/
create or replace function log_mdf_orderinfo()
returns trigger as $$
begin
    /*delete order action*/
    if (old.visibility != new.visibility and new.visibility = '0') then
      insert into user_mdf_order_log (order_id, seller_id, operate_type, operate_column, before_val, after_val, operate_time)
        values (old.order_id, old.seller_id, '2', 'visibility', '1', '2', now());
      return new;
    else
      if (old.class_name != new.class_name) then
        insert into user_mdf_order_log (order_id, seller_id, operate_type, operate_column, before_val, after_val, operate_time)
          values (old.order_id, old.seller_id, '1', 'class_name', old.class_name, new.class_name, now());
        return new;
      end if;
      if (old.cid != new.cid) then
        insert into user_mdf_order_log (order_id, seller_id, operate_type, operate_column, before_val, after_val, operate_time)
          values (old.order_id, old.seller_id, '1', 'cid', old.cid, new.cid, now());
        return new;
      end if;
      if (old.description != new.description) then
        insert into user_mdf_order_log (order_id, seller_id, operate_type, operate_column, before_val, after_val, operate_time)
          values (old.order_id, old.seller_id, '1', 'description', old.description, new.description, now());
        return new;
      end if;
      if (old.price != new.price) then
        insert into user_mdf_order_log (order_id, seller_id, operate_type, operate_column, before_val, after_val, operate_time)
          values (old.order_id, old.seller_id, '1', 'price', old.price, new.price, now());
        return new;
      end if;
    end if;
end;
$$ language plpgsql;
/*trigger*/
create trigger log_orderinfo
  before update on order_info
  for each statement execute procedure log_mdf_orderinfo();



/*-------------logging for admin to modify order info----------------------*/


create table dba_mdf_course_log(
  id serial,
  operate_type char(2) check (operate_type in ('0','1','2')), /* 0: insert, 1: update, 2: delete*/
  operate_column varchar(20),
  before_val varchar(50),
  after_val varchar(50),
  operate_time timestamp default current_timestamp,
  primary key(id),
  foreign key(before_val) references course_info(name),
  foreign key(after_val) references course_info(name)
);
/*function to log the modified info from course_info*/
create or replace function log_mdf_courseinfo()
returns trigger as $$
begin
    if (tg_op = 'delete') then
      insert into dba_mdf_course_log (operate_type, operate_column, before_val, after_val, operate_time)
        values ('2', 'all', old.name, null, now());
      return old;
    elsif (tg_op = 'update') then
      if (old.name != new.name) then
          insert into dba_mdf_course_log (operate_type, operate_column, before_val, after_val, operate_time)
            values ('1', 'name', old.name, new.name, now());
          return new;
      end if;
      if (old.parent_id != new.parent_id) then
          insert into dba_mdf_course_log (operate_type, operate_column, before_val, after_val, operate_time)
            values ('1', 'parent_id', old.parent_id, new.parent_id, now());
          return new;
      end if;
    elsif (tg_op = 'insert') then
      insert into dba_mdf_course_log (operate_type, operate_column, before_val, after_val, operate_time)
        values ('0', 'all', null, new.name, now());
      return new;
    end if;
end;
$$ language plpgsql;
/*trigger to log modified course info*/
create trigger log_courseinfo
  before insert or update or delete on course_info
  for each row execute procedure log_mdf_courseinfo();


/*-------------logging for admin to modify order info----------------------*/



create table dba_mdf_school_log(
  id serial,
  operate_type char(2) check (operate_type in ('0','1','2')), /* 0: insert, 1: update, 2: delete*/
  operate_column varchar(20),
  school_name varchar(50),
  campus_name varchar(50),
  operate_time timestamp default current_timestamp,
  primary key(id)
);
/*function to log the modified info from course_info*/
create or replace function log_mdf_schoolinfo()
returns trigger as $$
begin
    if (tg_op = 'delete') then
      insert into dba_mdf_school_log (operate_type, operate_column, school_name, campus_name, operate_time)
        values ('2', 'all', old.school_name, old.campus_name, now());
      return old;
    elsif (tg_op = 'update') then
      if (old.name != new.name) then
          insert into dba_mdf_school_log (operate_type, operate_column, school_name, campus_name, operate_time)
            values ('1', 'name', old.name, new.name, now());
          return new;
      end if;
      if (old.parent_id != new.parent_id) then
          insert into dba_mdf_school_log (operate_type, operate_column, school_name, campus_name, operate_time)
            values ('1', 'parent_id', old.parent_id, new.parent_id, now());
          return new;
      end if;
    elsif (tg_op = 'insert') then
      insert into dba_mdf_school_log (operate_type, operate_column, school_name, campus_name, operate_time)
        values ('0', 'all', null, new.name, now());
      return new;
    end if;
end;
$$ language plpgsql;
/*trigger to log modified course info*/
create trigger log_schoolinfo
  before insert or update or delete on school_info
  for each row execute procedure log_mdf_schoolinfo();



/*-----------------logging for user to store recharge or consume history-------------------*/



create table user_money_history(
  id serial,
  user_id int,
  operate_type char(1) check(operate_type in ('1', '2')), /* 消费方式： 1 -> 充值, 2 -> 消费 */
  before_val int,
  after_val int,
  operate_time timestamp default current_timestamp,
  primary key(id),
  foreign key(user_id) references user_info(id)
);
/*function*/
create or replace function log_user_money_history()
returns trigger as $$
begin
    if (old.balance < new.balance) then
      insert into user_money_history (user_id, operate_type, before_val, after_val, opearte_time)
        values (old.user_id, '1', old.balance, new.balance, now());
      return new;
    elsif (old.balance > new.balance) then
      insert into user_money_history (user_id, operate_type, before_val, after_val, opearte_time)
        values (old.user_id, '2', old.balance, new.balance, now());
      return new;
    end if;
end;
$$ language plpgsql;
/*trigger*/
create trigger log_user_moneyhistory
  before update on user_info
  for each statement execute procedure log_user_money_history();




/*-----------------logging for seller to store get or withdraw history-------------------*/



create table seller_money_history(
  id serial,
  seller_id int,
  operate_type char(1) check(operate_type in ('1', '2')), /* 消费方式： 1 -> 收入, 2 -> 取出 */
  before_val int,
  after_val int,
  operate_time timestamp default current_timestamp,
  primary key(id),
  foreign key(seller_id) references seller_info(id)
);
/*function*/
create or replace function log_seller_money_history()
returns trigger as $$
begin
    if (old.balance < new.balance) then
      insert into seller_money_history (seller_id, operate_type, before_val, after_val, opearte_time)
        values (old.seller_id, '1', old.balance, new.balance, now());
      return new;
    elsif (old.balance > new.balance) then
      insert into seller_money_history (seller_id, operate_type, before_val, after_val, opearte_time)
        values (old.seller_id, '2', old.balance, new.balance, now());
      return new;
    end if;
end;
$$ language plpgsql;
/*trigger*/
create trigger log_seller_moneyhistory
  before update on seller_info
  for each statement execute procedure log_seller_money_history();
