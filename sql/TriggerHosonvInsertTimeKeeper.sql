CREATE TRIGGER hosonvInsertTimeKeeper ON hosonv
AFTER INSERT
AS
INSERT INTO timeKeeper (adID)
VALUES ((SELECT adID FROM inserted))