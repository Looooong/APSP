BACKUP DATABASE APSP TO DISK = 'E:\webservices\htdocs\APSP\backup\APSP_mm_YYYY.bak' WITH INIT;

RESTORE DATABASE APSP_mm_YYYY FROM DISK = 'E:\webservices\htdocs\APSP\backup\APSP_mm_YYYY.bak'
WITH
	MOVE 'APSP' TO 'APSP_mm_YYYY.mdf',
	MOVE 'APSP_log' TO 'APSP_mm_YYYY_log.LDF'