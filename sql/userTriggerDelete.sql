CREATE TRIGGER permissionDelete ON users
AFTER DELETE
AS
DELETE permission
WHERE userID IN (SELECT userID FROM deleted);