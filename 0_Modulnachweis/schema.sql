CREATE DATABASE menus;
use menus;

CREATE TABLE menu(
    menu_name varchar(100) not null,
    menu_category varchar(50) not null,
    menu_ingredients text not null,
    menu_author varchar(100) not null,
    menu_servesfor int not null
)
