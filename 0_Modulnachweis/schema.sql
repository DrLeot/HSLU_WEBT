CREATE DATABASE menus;
use menus;

CREATE TABLE menu(
    menu_name varchar(100) not null,
    menu_category varchar(50) not null,
    menu_ingredients text not null,
    menu_author varchar(100) not null,
    menu_servesfor int not null
);

INSERT INTO menu VALUES('Toast Hawaii', 'Hauptgang','Toast, Schinken, Schmelzkäse, Senf, Ananasscheiben','janik.burkart@stud.hslu.ch',4);
INSERT INTO menu VALUES('Getränkter Zitronenkuchen', 'Dessert','250 gr Butter, 250g Zucker, 1 Prise Salz, 4 Eier, 5 Zitronen, 250 gr Mehl, 1 TL Backpulver, 100 gr Puderzucker','max.muster@Musterag.com',8);
