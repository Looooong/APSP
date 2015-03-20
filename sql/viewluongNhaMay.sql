create view luongNhaMay as
select hosonv.adID, ngayThuviec, ngayKetThuc, ngayBatDau, dangID, luongCB,docHai, (luongCB*(1 + hSCV + hSTN) + BHTN + com + docHai) AS tongLuong 
from hosonv
where nhomID = 1