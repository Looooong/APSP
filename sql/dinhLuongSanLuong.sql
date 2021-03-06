USE [APSP]
GO
/****** Object:  UserDefinedFunction [dbo].[dinhLuongSanLuong]    Script Date: 11/04/2013 20:57:13 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
ALTER FUNCTION [dbo].[dinhLuongSanLuong] (@eff FLOAT, @basic FLOAT)
RETURNS FLOAT
AS
BEGIN
	DECLARE @result AS FLOAT;
	
	IF @eff > 120
		SET @result = @basic * 1.3
	ELSE
	IF @eff > 110
		SET @result = @basic * 1.2
	ELSE
	IF @eff > 100
		SET @result = @basic * 1.1
	ELSE
	IF @eff > 90
		SET @result = @basic
	ELSE
	IF @eff > 80
		SET @result = @basic * 0.9
	ELSE
	IF @eff > 70
		SET @result = @basic * 0.8
	ELSE
		SET @result = @basic * 0.7;
		
	RETURN @result;
END;