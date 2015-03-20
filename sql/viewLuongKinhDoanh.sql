create view luongKinhDoanh as
select hosonv.adID, ngayThuviec, ngayKetThuc, ngayBatDau, dangID, luongCB, sLCT, sLTT, (luongCB*(1 + hSCV + hSTN) + BHTN + com + xang) AS tongLuong, dbo.dinhLuongSanLuong(CAST ((sLTT/sLCT) AS INT), (luongCB*(1 + hSCV + hSTN) + BHTN + com + xang)) AS tongLuongTheoSanLuong
from hosonv, sanLuongKinhDoanh
where nhomID = 3 and hosonv.adID = sanLuongKinhDoanh.adID

