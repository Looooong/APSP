CREATE TRIGGER permission ON users
AFTER INSERT
AS 
INSERT permission(userID, menuID)
SELECT @@IDENTITY, menuID FROM menus