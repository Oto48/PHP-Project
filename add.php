<?php

include 'model.php';
include 'product-type/dvd.php';
include 'product-type/book.php';
include 'product-type/furniture.php';
$dvd = new DVD();
$add_dvd = $dvd->add();
$book = new Book();
$add_book = $book->add();
$furniture = new Furniture();
$add_furniture = $furniture->add();

?>