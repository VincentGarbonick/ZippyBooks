CREATE DATABASE isp; 
USE isp;

DROP TABLE IF EXISTS zippyBooksDB; 

CREATE TABLE zippyBooksDB
(
    bookID INT(11) NOT NULL,
    title VARCHAR(100) NOT NULL UNIQUE, 
    price FLOAT(11) NOT NULL, 
    quantity INT(11) NOT NULL,
    flag BOOLEAN NOT NULL,
    PRIMARY KEY(bookID)
);


insert into zippyBooksDB values 
(1, "What Does It All Mean? A Very Short Introduction to Philosophy", 15.49,11,1),
(2, "Fundamentals of Philosophy (7th Edition)", 105.99, 3, 1),
(3, "On Liberty, Longman's Edition", 20.99, 11, 1),
(4, "Discourses and Selected Writings, Penguin Classics Edition", 40.32, 0, 0),
(5, "Das Kapital, CreateSpace Publishing", 9.99, 100, 1),
(6, "The Great Fiction: Property, Economy, Society, and the Politics of Decline", 50.34,40, 1),
(7, "Tractatus Logico-Philosophicus, Penguin Classics", 12.34, 20,1),
(8, "Introduction to Philosophy: Classical and Contemporary Readings 4th Edition", 104.49, 3, 1),
(9, "Twilight of the Machines, John Zerzan", 10.03, 10, 1),
(10,"1984, Penguin Classics", 12.42, 0, 0);