CREATE VIEW chamCong
AS
SELECT userID, dbo.countDays(userID, -2) AS P, dbo.countDays(userID, -1) AS V, dbo.countDays(userID, 0) AS T, dbo.countDays(userID, 1) AS N, dbo.countDays(userID, 2) AS C, dbo.countDays(userID, 3) AS G
FROM timeKeeper;