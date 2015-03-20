CREATE FUNCTION dinhLuongSanLuong (@eff TINYINT, @basic INT)
RETURNS INT
AS
BEGIN
	DECLARE @result AS INT;
	
	IF @eff > 120
		SET @result = CAST ( (@basic * 1.3) AS INT)
	ELSE
	IF @eff > 110
		SET @result = CAST ( (@basic * 1.2) AS INT)
	ELSE
	IF @eff > 100
		SET @result = CAST ( (@basic * 1.1) AS INT)
	ELSE
	IF @eff > 90
		SET @result = @basic
	ELSE
	IF @eff > 80
		SET @result = CAST ( (@basic * 0.9) AS INT)
	ELSE
	IF @eff > 70
		SET @result = CAST ( (@basic * 0.8) AS INT)
	ELSE
		SET @result = CAST ( (@basic * 0.7) AS INT);
		
	RETURN @result;
END;