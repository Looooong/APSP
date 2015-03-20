Select hs.adID,maNV,hinhanh,hoTen, tenCVVi,tenDTVi,tenQTVi
from hosonv as hs, congty,dantoc,quoctich
where adID=13
and   hs.cvID= congty.cvID 
and  hs.dtID = dantoc.dtID
And hs.qtID = quoctich.qtID



Select hoTen,tenQTVi from hosonv as hs, quoctich where adID=17 And hs.qtID = quoctich.qtID


Select hs.adID,maNV,hinhanh,hoTen,tenThuongGoi,gioiTinh,namSinh,nguyenQuan,cMND,ngayCap,noiCap,hoKhau,diaChi,dienThoai,diDong,khanCap,sucKhoe,chieuCao,canNang,ketnap,ngayGiaNhap,noiKN,chucVuKN,aTM,ghiChu,voChong,namSinhVC,ngheNghiep,diaChiVC,soCon,chiTietSC,ngayThuviec,ngayKetThuc,ngayBatDau,soHD,noiLamViec,luongCB,bacLuong,hSTN,hSCV,com,anNgoaiGio,xang,docHai,chuyenCan,dMSL,sLAD,sLCK,nangLuong,dieuChuyen,soBHXH,ngayCapBH,noicapBH,soBHYT,quaTrinhBH,BHTN,theoDoi,ngayThoiViec,soQuyetDinh,ngayQuyetDinh,giamtru,thuong1,thuong2,thuong3,thuong4,chidot1,chidot2,chidot3,chidot4,chidot5
,tenCVVi, tenQTVi, tenDTVi, tenDTVi,tenTGVi,tenHNVi,tenVHVi,tenNhomVi,tenBPVi, tenCMVi,tenDangVI
from hosonv as hs, congty,quoctich,dantoc,tongiao,honnhan,vanhoa,nhom,bophan,chuyenmon,danghd
where hs.adID=17 
And hs.cvID= congty.cvID
And hs.qtID = quoctich.qtID
And hs.dtID = dantoc.dtID
And hs.tgID = tongiao.tgID
And hs.hnID = honnhan.hnID
And hs.vhID = vanhoa.vhID
And hs.nhomID = nhom.nhomID
And hs.bophanID = bophan.bophanID
And hs.cmID = chuyenmon.cmID
And hs.dangID = danghd.dangID



Select hs.adID,maNV,hinhanh,hoTen,tenThuongGoi,gioiTinh,namSinh,nguyenQuan,cMND,ngayCap,noiCap,hoKhau,diaChi,dienThoai,diDong,khanCap,sucKhoe,chieuCao,canNang,ketnap,ngayGiaNhap,noiKN,chucVuKN,aTM,ghiChu,voChong,namSinhVC,ngheNghiep,diaChiVC,soCon,chiTietSC,ngayThuviec,ngayKetThuc,ngayBatDau,soHD,noiLamViec,luongCB,bacLuong,hSTN,hSCV,com,anNgoaiGio,xang,docHai,chuyenCan,dMSL,sLAD,sLCK,nangLuong,dieuChuyen,soBHXH,ngayCapBH,noicapBH,soBHYT,quaTrinhBH,BHTN,theoDoi,ngayThoiViec,soQuyetDinh,ngayQuyetDinh,giamtru
,tenCVVi, tenQTVi, tenDTVi, tenDTVi,tenTGVi,tenHNVi,tenVHVi,tenNhomVi,tenBPVi, tenCMVi,tenDangVI
from hosonv as hs, congty,quoctich,dantoc,tongiao,honnhan,vanhoa,nhom,bophan,chuyenmon,danghd
where hs.adID=13
and hs.cvID= congty.cvID
And hs.qtID = quoctich.qtID
And hs.dtID = dantoc.dtID
And hs.tgID = tongiao.tgID
And hs.hnID = honnhan.hnID
And hs.vhID = vanhoa.vhID
And hs.nhomID = nhom.nhomID
And hs.bophanID = bophan.bophanID
And hs.cmID = chuyenmon.cmID
And hs.dangID = danghd.dangID	