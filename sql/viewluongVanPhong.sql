create view luongVanPhong as
select hosonv.adID, ngayThuviec, ngayKetThuc, ngayBatDau, dangID, luongCB, (luongCB*(1 + hSCV + hSTN) + BHTN + com) AS tongLuong 
from hosonv
where nhomID = 2