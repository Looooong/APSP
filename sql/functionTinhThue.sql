CREATE FUNCTION tinhThue(@money INT)
RETURNS INT
AS
BEGIN
	DECLARE @array TABLE (ID TINYINT, value INT, rate FLOAT);
	INSERT @array(ID, value, rate)
	VALUES (1, 5000000, 0.05);
	INSERT @array(ID, value, rate)
	VALUES (2, 5000000, 0.10);
	INSERT @array(ID, value, rate)
	VALUES (3, 8000000, 0.15);
	INSERT @array(ID, value, rate)
	VALUES (4, 14000000, 0.20);
	INSERT @array(ID, value, rate)
	VALUES (5, 20000000, 0.25);
	INSERT @array(ID, value, rate)
	VALUES (6, 28000000, 0.30);
	INSERT @array(ID, value, rate)
	VALUES (7, 0, 0.05);

	DECLARE @tax FLOAT = 0;
	DECLARE @i TINYINT = 1;
	
	WHILE @i <= 7
	BEGIN
		IF (@money > (SELECT value FROM @array WHERE ID = @i)) AND (@i < 7)
		BEGIN
			SET @tax = @tax + (SELECT value*rate FROM @array WHERE ID = @i);
			SET @money = @money - (SELECT value FROM @array WHERE ID = @i);
		END
		ELSE
		BEGIN
			SET @tax = @tax + @money*(SELECT rate FROM @array WHERE ID = @i);
			SET @money = 0;
		END;
		
		SET @i = @i + 1;
	END;
	
	RETURN @tax;
END;