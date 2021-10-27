/* SQLEditor (SQLite)*/


CREATE TABLE Customers
(
cid INT NOT NULL PRIMARY KEY,
fname VARCHAR(30),
lname VARCHAR(30),
email VARCHAR(50),
caddr VARCHAR(80),
cnum VARCHAR(14),
city VARCHAR(15)
);

CREATE TABLE OrderDetails
(
oid INT PRIMARY KEY,
rid INT,
cid INT REFERENCES Customers (cid),
otime DATETIME,
stime DATETIME,
bill FLOAT
);

CREATE TABLE Restaurants
(
rid INT NOT NULL PRIMARY KEY,
name INT,
raddr VARCHAR(80),
area VARCHAR(25),
rnum VARCHAR(14),
vat INT
);

CREATE TABLE Menu
(
iid INT PRIMARY KEY,
rid INT REFERENCES Restaurants (rid),
iname VARCHAR(25),
price FLOAT,
cat VARCHAR(25)
);

CREATE TABLE Orders
(
oid INT REFERENCES OrderDetails (oid),
rid INT REFERENCES Restaurants (rid),
iid INT REFERENCES Menu (iid),
quan INT
);

