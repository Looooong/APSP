CREATE TRIGGER menusDelete ON menus
AFTER DELETE
AS
DELETE permission
WHERE menuID IN (SELECT menuID FROM deleted)