SELECT   dbo.hosonv.adID, dbo.hosonv.ngayThuviec, dbo.hosonv.ngayKetThuc, DATEDIFF(day, dbo.hosonv.ngayThuviec, dbo.hosonv.ngayKetThuc) AS tongNgay, dbo.hosonv.ngayBatDau, dbo.hosonv.dangID, 
                 dbo.tinhHeSoLuong(dbo.hosonv.adID) AS heSoLuong, dbo.hosonv.giamtru, (dbo.hosonv.giamtru - 1) * 3600000 + 9000000 AS ttgiamtru, dbo.hosonv.luongCB, dbo.hosonv.hSCV, 
                 dbo.hosonv.luongCB * dbo.hosonv.hSCV AS tienHSCV, dbo.hosonv.luongCB * dbo.hosonv.hSTN AS tienHSTN, dbo.hosonv.hSTN, dbo.tinhThuongNgoaiGio(dbo.hosonv.adID) AS lamNgoaiGio, dbo.tinhBH() AS hesoBH, 
                 dbo.hosonv.luongCB * dbo.tinhBH() / 100 AS tienBH, dbo.hosonv.com, dbo.chamCong.C + dbo.chamCong.N / 2 AS ngayCom, (dbo.chamCong.C + dbo.chamCong.N / 2) * dbo.hosonv.com AS tongCom, dbo.hosonv.docHai, 
                 dbo.tinhPhuCap(dbo.hosonv.adID) AS phuCap, dbo.chamCong.C AS coMat, dbo.chamCong.N AS nuaBuoi, dbo.chamCong.P AS nghiPhep, dbo.chamCong.P * (dbo.hosonv.docHai + dbo.tinhPhuCap(dbo.hosonv.adID)) 
                 AS tongPhep, dbo.chamCong.V AS vangMat, (dbo.hosonv.luongCB * (1 + dbo.hosonv.hSCV + dbo.hosonv.hSTN) * dbo.chamCong.V) / (dbo.chamCong.C + dbo.chamCong.N / 2 + dbo.chamCong.P + dbo.chamCong.V) 
                 + dbo.chamCong.V * (dbo.hosonv.docHai + dbo.tinhPhuCap(dbo.hosonv.adID)) AS tongVang, dbo.tinhThuongNgoaiGio(dbo.hosonv.adID) AS ngoaigio, dbo.hosonv.luongCB * dbo.tinhBH() / 100 AS baoHiemNLD, 
                 dbo.hosonv.luongCB * 23 / 100 AS baoHiemDN, ROUND(((((dbo.hosonv.luongCB * (1 + dbo.hosonv.hSCV + dbo.hosonv.hSTN)) * (dbo.chamCong.C + dbo.chamCong.N / 2 + dbo.chamCong.P)) 
                 / (dbo.chamCong.C + dbo.chamCong.N + dbo.chamCong.P + dbo.chamCong.V) + dbo.tinhThuongNgoaiGio(dbo.hosonv.adID) + dbo.hosonv.docHai + dbo.tinhPhuCap(dbo.hosonv.adID)) 
                 + (dbo.chamCong.C + ROUND(dbo.chamCong.N / 2, 0, 1)) * dbo.hosonv.com) * dbo.tinhHeSoLuong(dbo.hosonv.adID) - dbo.hosonv.luongCB * dbo.tinhBH() / 100, 0) AS tongLuong, 
                 dbo.noNegative(ROUND(((((dbo.hosonv.luongCB * (1 + dbo.hosonv.hSCV + dbo.hosonv.hSTN)) * (dbo.chamCong.C + dbo.chamCong.N / 2 + dbo.chamCong.P)) 
                 / (dbo.chamCong.C + dbo.chamCong.N + dbo.chamCong.P + dbo.chamCong.V) + dbo.tinhThuongNgoaiGio(dbo.hosonv.adID) + dbo.hosonv.docHai + dbo.tinhPhuCap(dbo.hosonv.adID)) 
                 + (dbo.chamCong.C + ROUND(dbo.chamCong.N / 2, 0, 1)) * dbo.hosonv.com) * dbo.tinhHeSoLuong(dbo.hosonv.adID) - dbo.hosonv.luongCB * dbo.tinhBH() / 100, 0) - ((dbo.hosonv.giamtru - 1) * 3600000 + 9000000)) 
                 AS thuNhapTinhThue, dbo.tinhThue(dbo.noNegative(ROUND(((((dbo.hosonv.luongCB * (1 + dbo.hosonv.hSCV + dbo.hosonv.hSTN)) * (dbo.chamCong.C + dbo.chamCong.N / 2 + dbo.chamCong.P)) 
                 / (dbo.chamCong.C + dbo.chamCong.N + dbo.chamCong.P + dbo.chamCong.V) + dbo.tinhThuongNgoaiGio(dbo.hosonv.adID) + dbo.hosonv.docHai + dbo.tinhPhuCap(dbo.hosonv.adID)) 
                 + (dbo.chamCong.C + ROUND(dbo.chamCong.N / 2, 0, 1)) * dbo.hosonv.com) * dbo.tinhHeSoLuong(dbo.hosonv.adID) - dbo.hosonv.luongCB * dbo.tinhBH() / 100, 0) - ((dbo.hosonv.giamtru - 1) * 3600000 + 9000000))) 
                 AS tienThue
FROM      dbo.hosonv INNER JOIN
                 dbo.chamCong ON dbo.hosonv.adID = dbo.chamCong.adID
WHERE   (dbo.hosonv.nhomID = 1)