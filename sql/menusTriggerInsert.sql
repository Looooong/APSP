CREATE TRIGGER menusInsert ON menus
AFTER INSERT
AS
INSERT INTO permission(userID, menuID)
SELECT users.userID, @@IDENTITY FROM users;