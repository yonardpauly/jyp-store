CREATE DATABASE jyp_store;
DROP DATABASE jyp_store;
use jyp_store;
show tables;
desc checkouts;
desc products;
select * from products;
truncate table orders;
truncate table sales_transactions;
select * from orders;
select * from products;
select * from sales_transactions;
desc sales_transactions;
desc order_statuses;
select * from order_statuses;
insert into order_statuses( name, created_at, updated_at ) values ( 'rejected', current_timestamp, current_timestamp );

select * from orders;