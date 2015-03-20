CREATE FUNCTION tinhThuongNgoaiGio (@id INT)
RETURNS FLOAT
AS
BEGIN
	DECLARE @result FLOAT = ROUND(((SELECT (SELECT SUM(thoiLuong)
					FROM ngoaigio
					WHERE dangID = 1 AND adID = @id)*heSo
			FROM dangNgoaiGio
			WHERE dangID = 1)
		
		+ (SELECT (SELECT SUM(thoiLuong)
					FROM ngoaigio
					WHERE dangID = 2 AND adID = @id)*heSo
			FROM dangNgoaiGio
			WHERE dangID = 2)
		
		+ (SELECT (SELECT SUM(thoiLuong)
					FROM ngoaigio
					WHERE dangID = 3 AND adID = @id)*heSo
			FROM dangNgoaiGio
			WHERE dangID = 3))
			
		* (SELECT luongCB*(1 + hSCV + hSTN)
			FROM hosonv
			WHERE adID = @id)
		
		/(SELECT C + N + P + V
			FROM chamCong
			WHERE adID = @id)
		
		/8,0);
		
	IF @result IS NULL
		SET @result = 0;
		
	RETURN @result;
END;