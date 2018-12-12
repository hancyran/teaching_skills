drop table user_info cascade;
drop table order_info cascade;
drop table school_info cascade;
drop table course_info cascade;
drop table account cascade;
drop table seller_info cascade;
drop table user_mdf_order_log cascade;

create table course_info(
  id serial/* '课程类别id' */,
  name varchar(50) /* '课程类别名' */,
  parent_id int /* '父级课程类别id' */,
  create_date timestamp default current_timestamp, /*添加时间*/
  update_date timestamp default current_timestamp,
  primary key(id)
);
create or replace function update_date_course()
returns trigger as $$
begin
    new.update_date = now();
    return new;
end;
$$ language 'plpgsql';
/*trigger to update last_update_date after a update statement execute */
create trigger update_course_date
  before update on course_info for each row
  execute procedure update_date_course();
