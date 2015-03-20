 kUSE APSP;

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

CREATE TABLE relativetab(
ID INT NOT NULL PRIMARY KEY IDENTITY(1,1),
tab 	NVARCHAR(20) NOT NULL,
rel		NVARCHAR(20) NOT NULL
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

CREATE TABLE ltien(
ltienID INT NOT NULL PRIMARY KEY IDENTITY(1,1),
mltien VARCHAR(3),
nltien VARCHAR(10),
nltienen VARCHAR(10),
sudung nvarchar(255),
)
CREATE TABLE lkhang(
lkhangID INT NOT NULL PRIMARY KEY IDENTITY(1,1),
mlkhang VARCHAR(20),
nlkhang VARCHAR(10),
nlkhangen VARCHAR(10),
sudung nvarchar(255),
)
CREATE TABLE nkhang(
nkhangID INT NOT NULL PRIMARY KEY IDENTITY(1,1),
mnkhang VARCHAR(20),
ngkhang VARCHAR(10),
ngkhangen VARCHAR(10),
sudung nvarchar(255),
)
CREATE TABLE thanh(
thanhID INT NOT NULL PRIMARY KEY IDENTITY(1,1),
mthanh VARCHAR(20),
nthanh VARCHAR(10),
nthanhen VARCHAR(10),
sudung nvarchar(255),
)
CREATE TABLE kvuc(
kvucID INT NOT NULL PRIMARY KEY IDENTITY(1,1),
mkvuc VARCHAR(20),
nkvuc VARCHAR(10),
nkvucen VARCHAR(10),
sudung nvarchar(255),
)
CREATE TABLE qgia(
qgiaID INT NOT NULL PRIMARY KEY IDENTITY(1,1),
mqgia VARCHAR(20),
nqgia VARCHAR(10),
nthanhen VARCHAR(10),
sudung nvarchar(255),
)
drop table donvi
CREATE TABLE donvi(
mkhangID INT NOT NULL PRIMARY KEY IDENTITY(1,1),
mkhang VARCHAR(20),
ten NVARCHAR(150),
dchi NVARCHAR(150),
dthoai varchar(20),
msthue varchar(20),
mthanh VARCHAR(20),
mkvuc VARCHAR(20),
mqgia VARCHAR(20),
mlkhang VARCHAR(20),
mnkhang VARCHAR(20),
sudung nvarchar(255),
)
INSERT INTO donvi(mkhang,ten,dchi,dthoai,msthue) values('SN',N'MTV Tin Hoc Song Nước',N'Điện Biên Phủ',N'09090909','09091233')
INSERT INTO donvi(mkhang,ten,dchi,dthoai,msthue) values('SD',N'MTV Tin Hoc Cat Nam',N'Điện Biên Phủ',N'09898988','09091233')
INSERT INTO donvi(mkhang,ten,dchi,dthoai,msthue) values('SE',N'MTV Tin Hoc Hải Triều',N'Điện Biên Phủ',N'0908037703','09091233')
INSERT INTO donvi(mkhang,ten,dchi,dthoai,msthue) values('SF',N'MTV Tin Hoc Quang Hưng',N'Điện Biên Phủ',N'0936623300','09091233')
INSERT INTO donvi(mkhang,ten,dchi,dthoai,msthue) values('SS',N'MTV Tin Hoc Đức Huy',N'Điện Biên Phủ',N'0934742129','09091233')

CREATE TABLE dmspham(
sphamID INT NOT NULL PRIMARY KEY IDENTITY(1,1),
maso varchar(50),
tensp NVARCHAR(200),
dvtinh NVARCHAR(30),
dvtinhen NVARCHAR(30),
dgia decimal default 0,
nbdau date,
nkthuc date,
)
INSERT INTO dmspham(maso,tensp,dvtinh,dvtinhen,dgia,nbdau,nkthuc) VALUES('A',N'DẦU NHỚT APSP','THÙNG','','300000','2013-11-04','2013-12-01')
INSERT INTO dmspham(maso,tensp,dvtinh,dvtinhen,dgia,nbdau,nkthuc) VALUES('AA',N'DẦU NHỚT APSP','CHAI','','400000','2013-11-04','2013-12-01')
INSERT INTO dmspham(maso,tensp,dvtinh,dvtinhen,dgia,nbdau,nkthuc) VALUES('AB',N'DẦU NHỚT APSP','PHUY','','500000','2013-11-04','2013-12-01')
INSERT INTO dmspham(maso,tensp,dvtinh,dvtinhen,dgia,nbdau,nkthuc) VALUES('AC',N'DẦU NHỚT APSP','THÙNG','','600000','2013-11-04','2013-12-01')
INSERT INTO dmspham(maso,tensp,dvtinh,dvtinhen,dgia,nbdau,nkthuc) VALUES('AD',N'DẦU NHỚT APSP','CHAI','','700000','2013-11-04','2013-12-01')
CREATE TABLE mhang(
mmhangID INT NOT NULL PRIMARY KEY IDENTITY(1,1),
maso varchar(20),
nmhang VARCHAR(20),
nmhangen VARCHAR(20),
dvtinh NVARCHAR(20),
dvtinhen NVARCHAR(20),
mvach VARCHAR(20),
slton INT,
tnxt INT,
sudung nvarchar(150),
)

drop table dhban
select * from lxg
CREATE TABLE dhban(
dhbID INT NOT NULL PRIMARY KEY IDENTITY(1,1),
sctban VARCHAR(50),
nct date,
soquyen VARCHAR(25),
sohd VARCHAR(25),
ngayhd date,
lhdon nvarchar(20),
mkhang VARCHAR(20),
tenkh NVARCHAR(150),
dchi NVARCHAR(150),
dthoai Nvarchar(20),
msthue Nvarchar(20),
nphutrach nvarchar(100),
khoxuat NVARCHAR(50),
ltien VARCHAR(20),
tygia float default 1,
nnhang NVARCHAR(90),
socmnd Nvarchar(20),
xghang varchar(20),
ghichutt nvarchar(40),
gchuttngay nvarchar(100),
autock float default 0,
)
INSERT INTO dhban(sctban,nct,soquyen,sohd,ngayhd,lhdon,mkhang,tenkh,dchi,dthoai,msthue,sotk,khoxuat,ltien,tygia,nnhang,socmnd,xghang,nphutrach,ghichukm,autock)
 values('','','','','','',N'ABC',N'APSP','','090909090','090909','','','','','','','','','','121212122.12')
delete dhban
drop table lxg
CREATE TABLE lxg(
lxgID INT NOT NULL PRIMARY KEY IDENTITY(1,1),
dhbID INT,
mkhang VARCHAR(20),
maso VARCHAR(20),
tenhg NVARCHAR(150),
slgui float default 0,
slx float default 0,
slton float default 0,
motakt NVARCHAR(130),
ghichu NVARCHAR(130),
ngaygui date,
ngayxuat date,
)
delete mhangdhb
CREATE TABLE pxban(
pxID INT NOT NULL PRIMARY KEY IDENTITY(1,1),
sctpx VARCHAR(50),
nctpx date,
soquyen VARCHAR(25),
sohd VARCHAR(25),
ngayhd date,
lhdon INT,
mkhangID INT,
ten NVARCHAR(150),
dchi NVARCHAR(150),
dthoai INT,
msthue INT,
khoxuat NVARCHAR(50),
ltien VARCHAR(10),
tygia INT,
)
CREATE TABLE lghang(
lghID INT NOT NULL PRIMARY KEY IDENTITY(1,1),
sctlgh VARCHAR(50),
nctlgh date,
soquyen VARCHAR(25),
sohd VARCHAR(25),
ngayhd date,
lhdon INT,
mkhangID INT,
ten NVARCHAR(150),
dchi NVARCHAR(150),
dthoai INT,
msthue INT,
nghang NVARCHAR(90),
nnhang NVARCHAR(90),
pghang NVARCHAR(90),
pnhang NVARCHAR(90),
khoxuat NVARCHAR(50),
ltien VARCHAR(10),
tygia INT,
)
delete from mhangdhb
drop table dhban
drop table mhangdhb
CREATE TABLE mhangdhb(
mhangdhbID INT NOT NULL PRIMARY KEY IDENTITY(1,1),
dhbID INT,
maso VARCHAR(20),
tensp nvarchar(150),
dvtinh NVARCHAR(20),
dgia float default 0,
sluong float default 0,
ttien float default 0,
ckhau float default 0,
ckhaut float default 0,
ttdck float default 0,
slhgui float default 0,
hkmai float default 0,
ghichu NVARCHAR(255),
motakt NVARCHAR(255),
)
drop table dhban
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
select * from mhangdhb;
select * from dhban;
select * from lxg;
select * from xnkmai;
select * from lsxg;
delete mhangdhb
drop table lxsg
delete mhangdhb
select * from lxg
delete lsxg
CREATE TABLE lsxg(
xgID INT NOT NULL PRIMARY KEY IDENTITY(1,1),
mhangdhbID INT,
mkhang VARCHAR(20),
maso VARCHAR(20),
slxg float default 0,
ghichuxg NVARCHAR(130),
motaktxg nvarchar(130),
ngayxuat date,
)
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