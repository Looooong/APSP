USE APSP;

CREATE TABLE users(
userID 		INT NOT NULL PRIMARY KEY IDENTITY(1,1),
password 	VARCHAR(128),
name 		VARCHAR(255),
active 		TINYINT DEFAULT 1
);

CREATE TABLE menus(
menuID 	INT NOT NULL PRIMARY KEY IDENTITY(1,1),
idSTT 	INT NOT NULL,
name 	NVARCHAR(255),
en		NVARCHAR(255),
vi		NVARCHAR(255),
cn		NVARCHAR(255),
level 	TINYINT DEFAULT 1
);

CREATE TABLE permission(
userID 	INT NOT NULL PRIMARY KEY,
menuID 	INT NOT NULL,
level 	TINYINT DEFAULT 1
);

CREATE TABLE tabletest2(
infoID 	INT NOT NULL PRIMARY KEY IDENTITY(1,1),
maphieuID INT NOT NULL,
name NVARCHAR(255),
color nvarchar(255),
size char(25),
quantity int,
unit nvarchar(255),
discount char(10),
money int,
total int,
promotion nvarchar(255),
vat tinyint,
interpretation nvarchar(255),
notes nvarchar(255),
);
/*
INSERT INTO tabletest1(infoID,name,description,price,quantity) values('1','hang loai A','de vo va khong duoc de ngoai nang','1000000','1')
INSERT INTO tabletest1(infoID,name,description,price,quantity) values('1','hang loai A','de vo va khong duoc de ngoai nang','1000000','1')
INSERT INTO tabletest1(infoID,name,description,price,quantity) values('2','hang loai B','kem chat luong hon loai A','900000','1')
INSERT INTO tabletest1(infoID,name,description,price,quantity) values('2','hang loai B','kem chat luong hon loai A','9000000','1')
INSERT INTO tabletest1(infoID,name,description,price,quantity) values('3','hang loai C','khong co do thay the','8000000','1')
INSERT INTO tabletest1(infoID,name,description,price,quantity) values('3','hang loai C','khong co do thay the','8000000','1')
INSERT INTO tabletest1(infoID,name,description,price,quantity) values('4','hang loai D','card do hoa 2gb','7000000','1')
INSERT INTO tabletest1(infoID,name,description,price,quantity) values('4','hang loai D','card do hoa 2gb','7000000','1')
INSERT INTO tabletest1(infoID,name,description,price,quantity) values('5','hang loai E','bao hanh 1 nam','6000000','1')
INSERT INTO tabletest1(infoID,name,description,price,quantity) values('5','hang loai E','bao hanh 1 nam','6000000','1')
*/
CREATE TABLE tabletest1(
maphieuID INT NOT NULL PRIMARY KEY IDENTITY(1,1),
company nvarchar(255),
typect nvarchar(128),
goods nvarchar(128),
department nvarchar(128),
vote char(50),
vouchersnumber int,
ngayct date,
serinumber int,
daylp date,
inventory nvarchar(128),
typemoney char(20),
rate int,
);
/*
INSERT INTO tabletest2(infoName) values('Hang Cao Cap')
INSERT INTO tabletest2(infoName) values('Hang Thu Cap')
INSERT INTO tabletest2(infoName) values('Hang Tam Cap')
INSERT INTO tabletest2(infoName) values('Hang Thu Cap')
INSERT INTO tabletest2(infoName) values('Hang Ngu Cap')
*/
ALTER TABLE permission
ADD CONSTRAINT fk_permission_userID FOREIGN KEY (userID)
REFERENCES users (userID);

ALTER TABLE permission
ADD CONSTRAINT fk_permission_menuID FOREIGN KEY (menuID)
REFERENCES menus (menuID);

CREATE TABLE languages
(
	keyLang	VARCHAR(256) NOT NULL PRIMARY KEY,
	en		NVARCHAR(256),
	vi		NVARCHAR(256),
	ch		NVARCHAR(256)
);