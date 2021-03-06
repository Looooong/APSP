CREATE TABLE hosonv(
adID INT NOT NULL PRIMARY KEY IDENTITY(1,1),
maNV varchar (100),
hinhanh nvarchar (255),
hoTen NVARCHAR(255),
tenThuongGoi nvarchar (255),
gioiTinh nvarchar(255),
namSinh date,
nguyenQuan nvarchar(255),
qtID int,
dtID int,
tgID int,
cMND int,
ngayCap date,
noiCap nvarchar(50),
hoKhau nvarchar(100),
diaChi nvarchar(100),
dienThoai int,
diDong int,
khanCap int,
sucKhoe nvarchar(10),
chieuCao int ,
canNang int,
hnID int,
vhID int,
nhomID int,
bophanID int,
phucapID int,
cmID int,
ketnap int,
ngayGiaNhap date,
noiKN nvarchar(100),
chucVuKN nvarchar(100),
aTM int,
ghiChu nvarchar(255),
voChong nvarchar(50),
namSinhVC date,
ngheNghiep nvarchar(100),
diaChiVC nvarchar(100),
soCon int,
chiTietSC nvarchar (255),
ngayThuviec date,
ngayKetThuc date,
ngayBatDau date,
soHD nvarchar(255),
dangID int,
cvID int,
noiLamViec nvarchar(128),
luongCB int,
bacLuong int,
hSTN nvarchar(255),
hSCV nvarchar(255),
com int,
anNgoaiGio int,
xang int,
docHai int,
chuyenCan int,
dMSL nvarchar(255),
sLAD nvarchar(255),
sLCK nvarchar(255),
congCu nvarchar(255),
nangLuong int,
dieuChuyen nvarchar(255),
soBHXH nvarchar(255),
ngayCapBH date,
noicapBH nvarchar(255),
soBHYT varchar(255),
quaTrinhBH nvarchar(255),
BHTN nvarchar(255),
theoDoi nvarchar (255),
ngayThoiViec date,
soQuyetDinh int,
ngayQuyetDinh date,
luuTruCC nvarchar(255),
theodoiCC nvarchar (255),
thuongd1 float,
thuongd2 float,
thuongd3 float,
thuongd4 float,
);


CREATE TABLE invoices(
ctID INT NOT NULL PRIMARY KEY IDENTITY(1,1),
soChungTu nvarchar(255),
ngayCT date,
soHoaDon nvarchar(128),
ngayHD date,
tenNV nvarchar(250),
maKH int,
tenKH nvarchar (255),
diachi nvarchar (255),
mST int,
);

CREATE TABLE detail_invoices(
ctctID INT NOT NULL PRIMARY KEY IDENTITY(1,1),
ctID int NOT NULL,
maMH nvarchar(128),
tenMH nvarchar (255),
donViTinh nvarchar(100),
soluongMH int,
dongiaMH int,
thanhTienMH int ,
soluongKM int,
dongiaKM int,
thanhTienKH int,
chikhauMH int,
ngayGiao date,
sLGui int,
);

CREATE TABLE danghd(
dangID INT NOT NULL PRIMARY KEY IDENTITY(1,1),
maDang varchar (100),
tenDangVI nvarchar(128),
tenDangEn nvarchar (128),
suDung nvarchar(255),
);


CREATE TABLE nhom(
nhomID INT NOT NULL PRIMARY KEY IDENTITY(1,1),
maNhom varchar (100),
tenNhomVi nvarchar(128),
tenNhomEn nvarchar (128),
suDung nvarchar(255),
);

CREATE TABLE bophan(
bophanID INT NOT NULL PRIMARY KEY IDENTITY(1,1),
maBoPhan varchar (100),
tenBPVi nvarchar(128),
tenBPEn nvarchar (128),
suDung nvarchar(255),
);

CREATE TABLE phucap(
phucapID INT NOT NULL PRIMARY KEY IDENTITY(1,1),
maPhuCap varchar (100),
tenPCVi nvarchar(128),
tenPCEn nvarchar (128),
tienPC int,
suDung nvarchar(255),
);

CREATE TABLE dantoc(
dtID INT NOT NULL PRIMARY KEY IDENTITY(1,1),
maDT varchar (100),
tenDTVi nvarchar(128),
tenDTEn nvarchar (128),
suDung nvarchar(255),
);
CREATE TABLE tongiao(
tgID INT NOT NULL PRIMARY KEY IDENTITY(1,1),
maTG varchar (100),
tenTGVi nvarchar(128),
tenTGEn nvarchar (128),
suDung nvarchar(255),
);
CREATE TABLE quoctich(
qtID INT NOT NULL PRIMARY KEY IDENTITY(1,1),
maQT varchar (100),
tenQTVi nvarchar(128),
tenQTEn nvarchar (128),
suDung nvarchar(255),
);
CREATE TABLE honnhan(
hnID INT NOT NULL PRIMARY KEY IDENTITY(1,1),
maHN varchar (100),
tenHNVi nvarchar(128),
tenHNEn nvarchar (128),
suDung nvarchar(255),
);
CREATE TABLE vanhoa(
vhID INT NOT NULL PRIMARY KEY IDENTITY(1,1),
maVH varchar (100),
tenVHVi nvarchar(128),
tenVHEn nvarchar (128),
suDung nvarchar(255),
);
CREATE TABLE chuyenmon(
cmID INT NOT NULL PRIMARY KEY IDENTITY(1,1),
maCM varchar (100),
tenCMVi nvarchar(128),
tenCMEn nvarchar (128),
suDung nvarchar(255),
);
CREATE TABLE congty(
cvID INT NOT NULL PRIMARY KEY IDENTITY(1,1),
maCV varchar (100),
tenCVVi nvarchar(128),
tenCVEn nvarchar (128),
suDung nvarchar(255),
);

CREATE TABLE socon(
scID INT NOT NULL PRIMARY KEY IDENTITY(1,1),
adID int,
maSC varchar (100),
tenCVi nvarchar(128),
tenCVE nvarchar (128),
suDung nvarchar(255),
);

CREATE TABLE chamcong(
ccID INT NOT NULL PRIMARY KEY IDENTITY(1,1),
adID int,
cvID int
maCC varchar (100),
namSinh date,
tinhTrang int,
);

CREATE TABLE ngoaigio(
ngID INT NOT NULL PRIMARY KEY IDENTITY(1,1),
userID int,
ngayNG date, 
thoigian tinyint,
chuthich text,
);
CREATE TABLE phep (
phepID int not null primary key identity (1,1),
adID int,
ngay date ,
chuthich ntext,
);

CREATE TABLE giamTruGiaCanh (
gcID int not null primary key identity (1,1),
adID int,
phuthuoc int ,
chuthich ntext,
);

CREATE TABLE mauHopDong (
hdID int not null primary key identity (1,1),
adID int,
diaChi nvarchar(255) ,
thongTin nvarchar (255),
tieuDe nvarchar(255),
noiDung ntext,
);


CREATE TABLE production (
proID int not null primary key identity (1,1),
ngay date not null,
product int not null,
quantity int  default '9' not null,

);
CREATE TABLE congdoan (
CDID int not null primary key identity (1,1),
adID int not null,
ngaycongdoan  date,
congdoan int,
);


/* đổi thuộc tính bảng */
alter table hosonv alter column soBHYT date

/* đồi tên cột*/
EXEC sp_rename 'phucap.ID','phucapID', 'column'