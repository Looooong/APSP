CREATE TRIGGER hosonvDeleteTimeKeeper ON hosonv
AFTER DELETE
AS
DELETE timeKeeper
WHERE (SELECT adID FROM deleted) = adID