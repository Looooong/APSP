CREATE FUNCTION countDays (@id INT, @num INT)
RETURNS INT
AS
BEGIN
	DECLARE @counter TINYINT = 0;
	
	IF ((SELECT _1 FROM timeKeeper WHERE adID = @id) = @num)
		SET @counter = @counter + 1;
	IF ((SELECT _2 FROM timeKeeper WHERE adID = @id) = @num)
		SET @counter = @counter + 1;
	IF ((SELECT _3 FROM timeKeeper WHERE adID = @id) = @num)
		SET @counter = @counter + 1;
	IF ((SELECT _4 FROM timeKeeper WHERE adID = @id) = @num)
		SET @counter = @counter + 1;
	IF ((SELECT _5 FROM timeKeeper WHERE adID = @id) = @num)
		SET @counter = @counter + 1;
	IF ((SELECT _6 FROM timeKeeper WHERE adID = @id) = @num)
		SET @counter = @counter + 1;
	IF ((SELECT _7 FROM timeKeeper WHERE adID = @id) = @num)
		SET @counter = @counter + 1;
	IF ((SELECT _8 FROM timeKeeper WHERE adID = @id) = @num)
		SET @counter = @counter + 1;
	IF ((SELECT _9 FROM timeKeeper WHERE adID = @id) = @num)
		SET @counter = @counter + 1;
	IF ((SELECT _10 FROM timeKeeper WHERE adID = @id) = @num)
		SET @counter = @counter + 1;
	IF ((SELECT _11 FROM timeKeeper WHERE adID = @id) = @num)
		SET @counter = @counter + 1;
	IF ((SELECT _12 FROM timeKeeper WHERE adID = @id) = @num)
		SET @counter = @counter + 1;
	IF ((SELECT _13 FROM timeKeeper WHERE adID = @id) = @num)
		SET @counter = @counter + 1;
	IF ((SELECT _14 FROM timeKeeper WHERE adID = @id) = @num)
		SET @counter = @counter + 1;
	IF ((SELECT _15 FROM timeKeeper WHERE adID = @id) = @num)
		SET @counter = @counter + 1;
	IF ((SELECT _16 FROM timeKeeper WHERE adID = @id) = @num)
		SET @counter = @counter + 1;
	IF ((SELECT _17 FROM timeKeeper WHERE adID = @id) = @num)
		SET @counter = @counter + 1;
	IF ((SELECT _18 FROM timeKeeper WHERE adID = @id) = @num)
		SET @counter = @counter + 1;
	IF ((SELECT _19 FROM timeKeeper WHERE adID = @id) = @num)
		SET @counter = @counter + 1;
	IF ((SELECT _20 FROM timeKeeper WHERE adID = @id) = @num)
		SET @counter = @counter + 1;
	IF ((SELECT _21 FROM timeKeeper WHERE adID = @id) = @num)
		SET @counter = @counter + 1;
	IF ((SELECT _22 FROM timeKeeper WHERE adID = @id) = @num)
		SET @counter = @counter + 1;
	IF ((SELECT _23 FROM timeKeeper WHERE adID = @id) = @num)
		SET @counter = @counter + 1;
	IF ((SELECT _24 FROM timeKeeper WHERE adID = @id) = @num)
		SET @counter = @counter + 1;
	IF ((SELECT _25 FROM timeKeeper WHERE adID = @id) = @num)
		SET @counter = @counter + 1;
	IF ((SELECT _26 FROM timeKeeper WHERE adID = @id) = @num)
		SET @counter = @counter + 1;
	IF ((SELECT _27 FROM timeKeeper WHERE adID = @id) = @num)
		SET @counter = @counter + 1;
	IF ((SELECT _28 FROM timeKeeper WHERE adID = @id) = @num)
		SET @counter = @counter + 1;
	IF ((SELECT _29 FROM timeKeeper WHERE adID = @id) = @num)
		SET @counter = @counter + 1;
	IF ((SELECT _30 FROM timeKeeper WHERE adID = @id) = @num)
		SET @counter = @counter + 1;
	IF ((SELECT _31 FROM timeKeeper WHERE adID = @id) = @num)
		SET @counter = @counter + 1;

	RETURN @counter;
END;