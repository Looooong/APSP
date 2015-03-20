USE [master]
GO
/****** Object:  Database [APSP]    Script Date: 11/18/2013 14:52:24 ******/
CREATE DATABASE [APSP];
GO
ALTER DATABASE [APSP] SET COMPATIBILITY_LEVEL = 100
GO
IF (1 = FULLTEXTSERVICEPROPERTY('IsFullTextInstalled'))
begin
EXEC [APSP].[dbo].[sp_fulltext_database] @action = 'enable'
end
GO
ALTER DATABASE [APSP] SET ANSI_NULL_DEFAULT OFF
GO
ALTER DATABASE [APSP] SET ANSI_NULLS OFF
GO
ALTER DATABASE [APSP] SET ANSI_PADDING OFF
GO
ALTER DATABASE [APSP] SET ANSI_WARNINGS OFF
GO
ALTER DATABASE [APSP] SET ARITHABORT OFF
GO
ALTER DATABASE [APSP] SET AUTO_CLOSE OFF
GO
ALTER DATABASE [APSP] SET AUTO_CREATE_STATISTICS ON
GO
ALTER DATABASE [APSP] SET AUTO_SHRINK OFF
GO
ALTER DATABASE [APSP] SET AUTO_UPDATE_STATISTICS ON
GO
ALTER DATABASE [APSP] SET CURSOR_CLOSE_ON_COMMIT OFF
GO
ALTER DATABASE [APSP] SET CURSOR_DEFAULT  GLOBAL
GO
ALTER DATABASE [APSP] SET CONCAT_NULL_YIELDS_NULL OFF
GO
ALTER DATABASE [APSP] SET NUMERIC_ROUNDABORT OFF
GO
ALTER DATABASE [APSP] SET QUOTED_IDENTIFIER OFF
GO
ALTER DATABASE [APSP] SET RECURSIVE_TRIGGERS OFF
GO
ALTER DATABASE [APSP] SET  DISABLE_BROKER
GO
ALTER DATABASE [APSP] SET AUTO_UPDATE_STATISTICS_ASYNC OFF
GO
ALTER DATABASE [APSP] SET DATE_CORRELATION_OPTIMIZATION OFF
GO
ALTER DATABASE [APSP] SET TRUSTWORTHY OFF
GO
ALTER DATABASE [APSP] SET ALLOW_SNAPSHOT_ISOLATION OFF
GO
ALTER DATABASE [APSP] SET PARAMETERIZATION SIMPLE
GO
ALTER DATABASE [APSP] SET READ_COMMITTED_SNAPSHOT OFF
GO
ALTER DATABASE [APSP] SET HONOR_BROKER_PRIORITY OFF
GO
ALTER DATABASE [APSP] SET  READ_WRITE
GO
ALTER DATABASE [APSP] SET RECOVERY FULL
GO
ALTER DATABASE [APSP] SET  MULTI_USER
GO
ALTER DATABASE [APSP] SET PAGE_VERIFY CHECKSUM
GO
ALTER DATABASE [APSP] SET DB_CHAINING OFF
GO
EXEC sys.sp_db_vardecimal_storage_format N'APSP', N'ON'
GO
USE [APSP]
GO
/****** Object:  Table [dbo].[tongiao]    Script Date: 11/18/2013 14:52:27 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[tongiao](
	[tgID] [int] IDENTITY(1,1) NOT NULL,
	[maTG] [varchar](100) NULL,
	[tenTGVi] [nvarchar](128) NULL,
	[tenTGEn] [nvarchar](128) NULL,
	[suDung] [nvarchar](255) NULL,
PRIMARY KEY CLUSTERED 
(
	[tgID] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[xnkmai]    Script Date: 11/18/2013 14:52:28 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[xnkmai](
	[xnkmID] [int] IDENTITY(1,1) NOT NULL,
	[mhangdhbID] [int] NULL,
	[slxkm] [float] NULL,
	[sltkm] [float] NULL,
	[ngayxkmai] [date] NULL,
PRIMARY KEY CLUSTERED 
(
	[xnkmID] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[vanhoa]    Script Date: 11/18/2013 14:52:28 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[vanhoa](
	[vhID] [int] IDENTITY(1,1) NOT NULL,
	[maVH] [varchar](100) NULL,
	[tenVHVi] [nvarchar](128) NULL,
	[tenVHEn] [nvarchar](128) NULL,
	[suDung] [nvarchar](255) NULL,
PRIMARY KEY CLUSTERED 
(
	[vhID] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  UserDefinedFunction [dbo].[tinhThue]    Script Date: 11/18/2013 14:52:29 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE FUNCTION [dbo].[tinhThue](@money INT)
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
GO
/****** Object:  Table [dbo].[timeKeeper]    Script Date: 11/18/2013 14:52:29 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[timeKeeper](
	[adID] [int] NOT NULL,
	[_1] [smallint] NULL,
	[_2] [smallint] NULL,
	[_3] [smallint] NULL,
	[_4] [smallint] NULL,
	[_5] [smallint] NULL,
	[_6] [smallint] NULL,
	[_7] [smallint] NULL,
	[_8] [smallint] NULL,
	[_9] [smallint] NULL,
	[_10] [smallint] NULL,
	[_11] [smallint] NULL,
	[_12] [smallint] NULL,
	[_13] [smallint] NULL,
	[_14] [smallint] NULL,
	[_15] [smallint] NULL,
	[_16] [smallint] NULL,
	[_17] [smallint] NULL,
	[_18] [smallint] NULL,
	[_19] [smallint] NULL,
	[_20] [smallint] NULL,
	[_21] [smallint] NULL,
	[_22] [smallint] NULL,
	[_23] [smallint] NULL,
	[_24] [smallint] NULL,
	[_25] [smallint] NULL,
	[_26] [smallint] NULL,
	[_27] [smallint] NULL,
	[_28] [smallint] NULL,
	[_29] [smallint] NULL,
	[_30] [smallint] NULL,
	[_31] [smallint] NULL,
PRIMARY KEY CLUSTERED 
(
	[adID] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[thanh]    Script Date: 11/18/2013 14:52:29 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[thanh](
	[thanhID] [int] IDENTITY(1,1) NOT NULL,
	[mthanh] [varchar](20) NULL,
	[nthanh] [varchar](10) NULL,
	[nthanhen] [varchar](10) NULL,
	[sudung] [nvarchar](255) NULL,
PRIMARY KEY CLUSTERED 
(
	[thanhID] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[tabletest2]    Script Date: 11/18/2013 14:52:29 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[tabletest2](
	[infoID] [int] IDENTITY(1,1) NOT NULL,
	[maphieuID] [int] NOT NULL,
	[name] [nvarchar](255) NULL,
	[color] [nvarchar](255) NULL,
	[size] [char](25) NULL,
	[quantity] [int] NULL,
	[unit] [nvarchar](255) NULL,
	[discount] [char](10) NULL,
	[money] [int] NULL,
	[total] [int] NULL,
	[promotion] [nvarchar](255) NULL,
	[vat] [tinyint] NULL,
	[interpretation] [nvarchar](255) NULL,
	[notes] [nvarchar](255) NULL,
PRIMARY KEY CLUSTERED 
(
	[infoID] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[tabletest1]    Script Date: 11/18/2013 14:52:29 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[tabletest1](
	[maphieuID] [int] IDENTITY(1,1) NOT NULL,
	[company] [nvarchar](255) NULL,
	[typect] [nvarchar](128) NULL,
	[goods] [nvarchar](128) NULL,
	[department] [nvarchar](128) NULL,
	[vote] [char](50) NULL,
	[vouchersnumber] [int] NULL,
	[ngayct] [date] NULL,
	[serinumber] [int] NULL,
	[daylp] [date] NULL,
	[inventory] [nvarchar](128) NULL,
	[typemoney] [char](20) NULL,
	[rate] [int] NULL,
PRIMARY KEY CLUSTERED 
(
	[maphieuID] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[socon]    Script Date: 11/18/2013 14:52:29 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[socon](
	[scID] [int] IDENTITY(1,1) NOT NULL,
	[adID] [int] NULL,
	[maSC] [varchar](100) NULL,
	[tenCVi] [nvarchar](128) NULL,
	[tenCVE] [nvarchar](128) NULL,
	[suDung] [nvarchar](255) NULL,
PRIMARY KEY CLUSTERED 
(
	[scID] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[sanLuongKinhDoanh]    Script Date: 11/18/2013 14:52:29 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[sanLuongKinhDoanh](
	[adID] [int] NOT NULL,
	[sLCT] [int] NULL,
	[sLTT] [int] NULL,
PRIMARY KEY CLUSTERED 
(
	[adID] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[salary]    Script Date: 11/18/2013 14:52:29 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[salary](
	[id] [int] NOT NULL,
	[salary] [int] NULL,
	[bonus] [int] NULL
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[relativetab]    Script Date: 11/18/2013 14:52:29 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[relativetab](
	[ID] [int] IDENTITY(1,1) NOT NULL,
	[tab] [nvarchar](20) NOT NULL,
	[rel] [nvarchar](20) NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[ID] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[quoctich]    Script Date: 11/18/2013 14:52:29 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[quoctich](
	[qtID] [int] IDENTITY(1,1) NOT NULL,
	[maQT] [varchar](100) NULL,
	[tenQTVi] [nvarchar](128) NULL,
	[tenQTEn] [nvarchar](128) NULL,
	[suDung] [nvarchar](255) NULL,
PRIMARY KEY CLUSTERED 
(
	[qtID] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[qgia]    Script Date: 11/18/2013 14:52:29 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[qgia](
	[qgiaID] [int] IDENTITY(1,1) NOT NULL,
	[mqgia] [varchar](20) NULL,
	[nqgia] [varchar](10) NULL,
	[nthanhen] [varchar](10) NULL,
	[sudung] [nvarchar](255) NULL,
PRIMARY KEY CLUSTERED 
(
	[qgiaID] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[phuCap]    Script Date: 11/18/2013 14:52:29 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[phuCap](
	[phucapID] [int] IDENTITY(1,1) NOT NULL,
	[adID] [int] NOT NULL,
	[tien] [int] NULL,
	[chuThich] [ntext] NULL,
PRIMARY KEY CLUSTERED 
(
	[phucapID] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[phep]    Script Date: 11/18/2013 14:52:29 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[phep](
	[phepID] [int] IDENTITY(1,1) NOT NULL,
	[adID] [int] NULL,
	[ngay] [date] NULL,
	[chuthich] [ntext] NULL,
PRIMARY KEY CLUSTERED 
(
	[phepID] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[users]    Script Date: 11/18/2013 14:52:29 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[users](
	[userID] [int] IDENTITY(1,1) NOT NULL,
	[name] [varchar](255) NULL,
	[password] [varchar](128) NULL,
	[active] [tinyint] NULL,
 CONSTRAINT [pk_users] PRIMARY KEY CLUSTERED 
(
	[userID] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY],
UNIQUE NONCLUSTERED 
(
	[userID] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[menus]    Script Date: 11/18/2013 14:52:29 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[menus](
	[menuID] [int] IDENTITY(1,1) NOT NULL,
	[idSTT] [int] NOT NULL,
	[name] [nvarchar](255) NULL,
	[en] [nvarchar](255) NULL,
	[vi] [nvarchar](255) NULL,
	[ch] [nvarchar](255) NULL,
	[level] [int] NOT NULL,
	[code] [char](20) NOT NULL,
	[nametab] [nvarchar](50) NULL,
	[reltab] [nvarchar](50) NULL,
PRIMARY KEY CLUSTERED 
(
	[menuID] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[permission]    Script Date: 11/18/2013 14:52:29 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[permission](
	[perID] [int] IDENTITY(1,1) NOT NULL,
	[userID] [int] NOT NULL,
	[menuID] [int] NOT NULL,
	[status] [tinyint] NULL,
 CONSTRAINT [pk_permission] PRIMARY KEY CLUSTERED 
(
	[perID] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY],
UNIQUE NONCLUSTERED 
(
	[perID] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  UserDefinedFunction [dbo].[noNegative]    Script Date: 11/18/2013 14:52:30 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE FUNCTION [dbo].[noNegative](@num INT)
RETURNS INT
AS
BEGIN
	DECLARE @result INT;
	IF @num < 0
		SET @result = 0
	ELSE
		SET @result = @num;
	
	RETURN @result;
END
GO
/****** Object:  Table [dbo].[nkhang]    Script Date: 11/18/2013 14:52:30 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[nkhang](
	[nkhangID] [int] IDENTITY(1,1) NOT NULL,
	[mnkhang] [varchar](20) NULL,
	[ngkhang] [varchar](10) NULL,
	[ngkhangen] [varchar](10) NULL,
	[sudung] [nvarchar](255) NULL,
PRIMARY KEY CLUSTERED 
(
	[nkhangID] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[nhom]    Script Date: 11/18/2013 14:52:30 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[nhom](
	[nhomID] [int] IDENTITY(1,1) NOT NULL,
	[maNhom] [varchar](100) NULL,
	[tenNhomVi] [nvarchar](128) NULL,
	[tenNhomEn] [nvarchar](128) NULL,
	[suDung] [nvarchar](255) NULL,
PRIMARY KEY CLUSTERED 
(
	[nhomID] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[ngoaigio]    Script Date: 11/18/2013 14:52:30 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[ngoaigio](
	[ngID] [int] IDENTITY(1,1) NOT NULL,
	[adID] [int] NULL,
	[ngay] [date] NULL,
	[thoiLuong] [tinyint] NULL,
	[chuThich] [text] NULL,
	[dangID] [tinyint] NULL,
PRIMARY KEY CLUSTERED 
(
	[ngID] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[mauHopDong]    Script Date: 11/18/2013 14:52:30 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[mauHopDong](
	[hdID] [int] IDENTITY(1,1) NOT NULL,
	[adID] [int] NULL,
	[diaChi] [ntext] NULL,
	[thongTin] [ntext] NULL,
	[tieuDe] [ntext] NULL,
	[noiDung] [ntext] NULL,
PRIMARY KEY CLUSTERED 
(
	[hdID] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[lxg]    Script Date: 11/18/2013 14:52:30 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[lxg](
	[lxgID] [int] IDENTITY(1,1) NOT NULL,
	[mhangdhbID] [int] NULL,
	[mkhang] [varchar](20) NULL,
	[maso] [varchar](20) NULL,
	[tenhg] [nvarchar](150) NULL,
	[slgui] [float] NULL,
	[slx] [float] NULL,
	[slton] [float] NULL,
	[motakt] [nvarchar](130) NULL,
	[ghichu] [nvarchar](130) NULL,
	[ngaygui] [date] NULL,
	[ngayxuat] [date] NULL,
PRIMARY KEY CLUSTERED 
(
	[lxgID] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[mhang]    Script Date: 11/18/2013 14:52:30 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[mhang](
	[mmhangID] [int] IDENTITY(1,1) NOT NULL,
	[maso] [varchar](20) NULL,
	[nmhang] [varchar](10) NULL,
	[nmhangen] [varchar](10) NULL,
	[dvtinh] [nvarchar](15) NULL,
	[dvtinhen] [nvarchar](15) NULL,
	[mvach] [varchar](20) NULL,
	[slton] [int] NULL,
	[tnxt] [int] NULL,
	[sudung] [nvarchar](255) NULL,
PRIMARY KEY CLUSTERED 
(
	[mmhangID] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[menus1]    Script Date: 11/18/2013 14:52:30 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[menus1](
	[menuID] [int] IDENTITY(1,1) NOT NULL,
	[idSTT] [int] NOT NULL,
	[name] [nvarchar](255) NULL,
	[en] [nvarchar](255) NULL,
	[vi] [nvarchar](255) NULL,
	[ch] [nvarchar](255) NULL,
	[level] [int] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[menuID] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[bophan]    Script Date: 11/18/2013 14:52:30 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[bophan](
	[bophanID] [int] IDENTITY(1,1) NOT NULL,
	[maBoPhan] [varchar](100) NULL,
	[tenBPVi] [nvarchar](128) NULL,
	[tenBPEn] [nvarchar](128) NULL,
	[suDung] [nvarchar](255) NULL,
PRIMARY KEY CLUSTERED 
(
	[bophanID] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[baohiem]    Script Date: 11/18/2013 14:52:30 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[baohiem](
	[dangID] [int] NOT NULL,
	[Ten] [nvarchar](100) NULL,
	[heso] [float] NULL,
	[chuthich] [ntext] NULL,
PRIMARY KEY CLUSTERED 
(
	[dangID] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[congty]    Script Date: 11/18/2013 14:52:30 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[congty](
	[cvID] [int] IDENTITY(1,1) NOT NULL,
	[maCV] [varchar](100) NULL,
	[tenCVVi] [nvarchar](128) NULL,
	[tenCVEn] [nvarchar](128) NULL,
	[suDung] [nvarchar](255) NULL,
PRIMARY KEY CLUSTERED 
(
	[cvID] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[chuyenmon]    Script Date: 11/18/2013 14:52:30 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[chuyenmon](
	[cmID] [int] IDENTITY(1,1) NOT NULL,
	[maCM] [varchar](100) NULL,
	[tenCMVi] [nvarchar](128) NULL,
	[tenCMEn] [nvarchar](128) NULL,
	[suDung] [nvarchar](255) NULL,
PRIMARY KEY CLUSTERED 
(
	[cmID] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[honnhan]    Script Date: 11/18/2013 14:52:30 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[honnhan](
	[hnID] [int] IDENTITY(1,1) NOT NULL,
	[maHN] [varchar](100) NULL,
	[tenHNVi] [nvarchar](128) NULL,
	[tenHNEn] [nvarchar](128) NULL,
	[suDung] [nvarchar](255) NULL,
PRIMARY KEY CLUSTERED 
(
	[hnID] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[donvi]    Script Date: 11/18/2013 14:52:30 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[donvi](
	[mkhangID] [int] IDENTITY(1,1) NOT NULL,
	[mkhang] [varchar](20) NULL,
	[ten] [nvarchar](150) NULL,
	[dchi] [nvarchar](150) NULL,
	[dthoai] [varchar](20) NULL,
	[msthue] [varchar](20) NULL,
	[nphutrach] [nvarchar](150) NULL,
	[ngiamsat] [nvarchar](150) NULL,
	[mkvuc] [nvarchar](50) NULL,
	[mthanh] [nvarchar](50) NULL,
	[mqgia] [nvarchar](50) NULL,
	[mlkhang] [nvarchar](50) NULL,
	[mnkhang] [nvarchar](50) NULL,
	[sudung] [nvarchar](255) NULL,
PRIMARY KEY CLUSTERED 
(
	[mkhangID] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[dmspham]    Script Date: 11/18/2013 14:52:30 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[dmspham](
	[sphamID] [int] IDENTITY(1,1) NOT NULL,
	[maso] [varchar](50) NULL,
	[tensp] [nvarchar](200) NULL,
	[dvtinh] [nvarchar](30) NULL,
	[dvtinhen] [nvarchar](30) NULL,
	[dgia] [float] NULL,
	[dgia_1] [float] NULL,
	[dgia_2] [float] NULL,
	[dgia_3] [float] NULL,
	[dgia_4] [float] NULL,
	[nbdau] [date] NULL,
	[nkthuc] [date] NULL,
PRIMARY KEY CLUSTERED 
(
	[sphamID] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  UserDefinedFunction [dbo].[dinhLuongSanLuong]    Script Date: 11/18/2013 14:52:30 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE FUNCTION [dbo].[dinhLuongSanLuong] (@eff FLOAT)
RETURNS FLOAT
AS
BEGIN
	DECLARE @result AS FLOAT;
	
	IF @eff > 120
		SET @result = 1.3
	ELSE
	IF @eff > 110
		SET @result = 1.2
	ELSE
	IF @eff > 100
		SET @result = 1.1
	ELSE
	IF @eff > 90
		SET @result = 1
	ELSE
	IF @eff > 80
		SET @result = 0.9
	ELSE
	IF @eff > 70
		SET @result = 0.8
	ELSE
		SET @result = 0.7;
		
	RETURN @result;
END;
GO
/****** Object:  Table [dbo].[dhban]    Script Date: 11/18/2013 14:52:30 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[dhban](
	[dhbID] [int] IDENTITY(1,1) NOT NULL,
	[sctban] [varchar](50) NULL,
	[nct] [date] NULL,
	[soquyen] [varchar](25) NULL,
	[sohd] [varchar](25) NULL,
	[ngayhd] [date] NULL,
	[lhdon] [nvarchar](20) NULL,
	[mkhang] [varchar](20) NULL,
	[tenkh] [nvarchar](150) NULL,
	[dchi] [nvarchar](150) NULL,
	[dthoai] [nvarchar](20) NULL,
	[msthue] [nvarchar](20) NULL,
	[nphutrach] [nvarchar](120) NULL,
	[ngiamsat] [nvarchar](120) NULL,
	[khoxuat] [nvarchar](50) NULL,
	[ltien] [varchar](20) NULL,
	[tygia] [float] NULL,
	[nnhang] [nvarchar](90) NULL,
	[socmnd] [nvarchar](20) NULL,
	[xghang] [varchar](20) NULL,
	[ghichukm] [nvarchar](40) NULL,
	[autock] [float] NULL,
PRIMARY KEY CLUSTERED 
(
	[dhbID] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[dchuyen]    Script Date: 11/18/2013 14:52:30 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[dchuyen](
	[dchuyenID] [int] IDENTITY(1,1) NOT NULL,
	[maNV] [varchar](100) NULL,
	[ghichu] [nvarchar](255) NULL,
	[ndchuyen] [date] NULL,
PRIMARY KEY CLUSTERED 
(
	[dchuyenID] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[dantoc]    Script Date: 11/18/2013 14:52:30 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[dantoc](
	[dtID] [int] IDENTITY(1,1) NOT NULL,
	[maDT] [varchar](100) NULL,
	[tenDTVi] [nvarchar](128) NULL,
	[tenDTEn] [nvarchar](128) NULL,
	[suDung] [nvarchar](255) NULL,
PRIMARY KEY CLUSTERED 
(
	[dtID] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[dangNgoaiGio]    Script Date: 11/18/2013 14:52:30 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[dangNgoaiGio](
	[dangID] [tinyint] NOT NULL,
	[heSo] [float] NULL,
	[chuThich] [ntext] NULL,
PRIMARY KEY CLUSTERED 
(
	[dangID] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[danghd]    Script Date: 11/18/2013 14:52:30 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[danghd](
	[dangID] [int] IDENTITY(1,1) NOT NULL,
	[maDang] [varchar](100) NULL,
	[tenDangVI] [nvarchar](128) NULL,
	[tenDangEn] [nvarchar](128) NULL,
	[suDung] [nvarchar](255) NULL,
	[heSoLuong] [float] NULL,
PRIMARY KEY CLUSTERED 
(
	[dangID] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[ltien]    Script Date: 11/18/2013 14:52:30 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[ltien](
	[ltienID] [int] IDENTITY(1,1) NOT NULL,
	[mltien] [varchar](3) NULL,
	[nltien] [varchar](10) NULL,
	[nltienen] [varchar](10) NULL,
	[sudung] [nvarchar](255) NULL,
PRIMARY KEY CLUSTERED 
(
	[ltienID] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[lsxg]    Script Date: 11/18/2013 14:52:30 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[lsxg](
	[xgID] [int] IDENTITY(1,1) NOT NULL,
	[mhangdhbID] [int] NULL,
	[mkhang] [varchar](20) NULL,
	[maso] [varchar](20) NULL,
	[slxg] [float] NULL,
	[ghichuxg] [nvarchar](130) NULL,
	[motaktxg] [nvarchar](130) NULL,
	[ngayxuat] [date] NULL,
PRIMARY KEY CLUSTERED 
(
	[xgID] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[lkhang]    Script Date: 11/18/2013 14:52:30 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[lkhang](
	[lkhangID] [int] IDENTITY(1,1) NOT NULL,
	[mlkhang] [varchar](20) NULL,
	[nlkhang] [varchar](10) NULL,
	[nlkhangen] [varchar](10) NULL,
	[sudung] [nvarchar](255) NULL,
PRIMARY KEY CLUSTERED 
(
	[lkhangID] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[languages1]    Script Date: 11/18/2013 14:52:30 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[languages1](
	[keyLang] [varchar](256) NOT NULL,
	[en] [nvarchar](256) NULL,
	[vi] [nvarchar](256) NULL,
	[ch] [nvarchar](256) NULL
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[languages]    Script Date: 11/18/2013 14:52:30 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[languages](
	[keyLang] [varchar](256) NOT NULL,
	[en] [nvarchar](256) NULL,
	[vi] [nvarchar](256) NULL,
	[ch] [nvarchar](256) NULL,
 CONSTRAINT [pk_languages] PRIMARY KEY CLUSTERED 
(
	[keyLang] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[kvuc]    Script Date: 11/18/2013 14:52:30 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[kvuc](
	[kvID] [int] IDENTITY(1,1) NOT NULL,
	[mkvuc] [varchar](100) NULL,
	[nkvuc] [nvarchar](128) NULL,
	[nkvucen] [nvarchar](128) NULL,
	[suDung] [nvarchar](255) NULL,
PRIMARY KEY CLUSTERED 
(
	[kvID] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[hosonv]    Script Date: 11/18/2013 14:52:30 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[hosonv](
	[adID] [int] IDENTITY(1,1) NOT NULL,
	[maNV] [varchar](100) NULL,
	[hinhanh] [nvarchar](255) NULL,
	[hoTen] [nvarchar](255) NULL,
	[tenThuongGoi] [nvarchar](255) NULL,
	[gioiTinh] [nvarchar](255) NULL,
	[namSinh] [date] NULL,
	[nguyenQuan] [nvarchar](255) NULL,
	[qtID] [int] NULL,
	[dtID] [int] NULL,
	[tgID] [int] NULL,
	[cMND] [int] NULL,
	[ngayCap] [date] NULL,
	[noiCap] [nvarchar](50) NULL,
	[hoKhau] [nvarchar](100) NULL,
	[diaChi] [nvarchar](100) NULL,
	[dienThoai] [varchar](12) NULL,
	[diDong] [varchar](12) NULL,
	[khanCap] [int] NULL,
	[sucKhoe] [nvarchar](10) NULL,
	[chieuCao] [int] NULL,
	[canNang] [int] NULL,
	[hnID] [int] NULL,
	[vhID] [int] NULL,
	[nhomID] [int] NULL,
	[bophanID] [int] NULL,
	[phucapID] [int] NULL,
	[cmID] [int] NULL,
	[ketnap] [int] NULL,
	[ngayGiaNhap] [date] NULL,
	[noiKN] [nvarchar](100) NULL,
	[chucVuKN] [nvarchar](100) NULL,
	[aTM] [varchar](16) NULL,
	[ghiChu] [nvarchar](255) NULL,
	[voChong] [nvarchar](50) NULL,
	[namSinhVC] [date] NULL,
	[ngheNghiep] [nvarchar](100) NULL,
	[diaChiVC] [nvarchar](100) NULL,
	[soCon] [int] NULL,
	[chiTietSC] [nvarchar](255) NULL,
	[ngayThuviec] [date] NULL,
	[ngayKetThuc] [date] NULL,
	[ngayBatDau] [date] NULL,
	[soHD] [nvarchar](255) NULL,
	[dangID] [int] NULL,
	[cvID] [int] NULL,
	[noiLamViec] [nvarchar](128) NULL,
	[luongCB] [int] NULL,
	[bacLuong] [int] NULL,
	[hSTN] [float] NULL,
	[hSCV] [float] NULL,
	[com] [int] NULL,
	[anNgoaiGio] [int] NULL,
	[xang] [int] NULL,
	[docHai] [int] NULL,
	[chuyenCan] [int] NULL,
	[dMSL] [tinyint] NULL,
	[sLAD] [tinyint] NULL,
	[sLCK] [tinyint] NULL,
	[congCu] [nvarchar](255) NULL,
	[nangLuong] [int] NULL,
	[dieuChuyen] [nvarchar](255) NULL,
	[soBHXH] [nvarchar](255) NULL,
	[ngayCapBH] [date] NULL,
	[noicapBH] [nvarchar](255) NULL,
	[soBHYT] [varchar](255) NULL,
	[quaTrinhBH] [nvarchar](255) NULL,
	[BHTN] [nvarchar](255) NULL,
	[theoDoi] [nvarchar](255) NULL,
	[ngayThoiViec] [date] NULL,
	[soQuyetDinh] [int] NULL,
	[ngayQuyetDinh] [date] NULL,
	[luuTruCC] [nvarchar](255) NULL,
	[theodoiCC] [nvarchar](255) NULL,
	[tinhTrangCC] [nvarchar](255) NULL,
	[giamtru] [int] NULL,
PRIMARY KEY CLUSTERED 
(
	[adID] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  UserDefinedFunction [dbo].[countDays]    Script Date: 11/18/2013 14:52:30 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE FUNCTION [dbo].[countDays] (@id INT, @num INT)
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
GO
/****** Object:  Table [dbo].[mhangdhb]    Script Date: 11/18/2013 14:52:30 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[mhangdhb](
	[mhangdhbID] [int] IDENTITY(1,1) NOT NULL,
	[dhbID] [int] NULL,
	[maso] [varchar](20) NULL,
	[tensp] [nvarchar](150) NULL,
	[dvtinh] [nvarchar](20) NULL,
	[dgia] [float] NULL,
	[sluong] [float] NULL,
	[ttien] [float] NULL,
	[ckhau] [float] NULL,
	[ckhaut] [float] NULL,
	[ttdck] [float] NULL,
	[slhgui] [float] NULL,
	[hkmai] [bit] NULL,
	[ghichu] [nvarchar](255) NULL,
	[motakt] [nvarchar](255) NULL,
PRIMARY KEY CLUSTERED 
(
	[mhangdhbID] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  UserDefinedFunction [dbo].[tinhBH]    Script Date: 11/18/2013 14:52:30 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE FUNCTION [dbo].[tinhBH]()
RETURNS FLOAT
AS
BEGIN
	RETURN (SELECT heso FROM baohiem WHERE dangID = 1);
END;
GO
/****** Object:  UserDefinedFunction [dbo].[tinhPhuCap]    Script Date: 11/18/2013 14:52:30 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE FUNCTION [dbo].[tinhPhuCap](@id INT)
RETURNS INT
AS
BEGIN
	DECLARE @result INT = (SELECT SUM(tien) FROM phuCap WHERE adID = @id);
	
	IF @result IS NULL
		SET @result = 0;
		
	RETURN @result;
END;
GO
/****** Object:  UserDefinedFunction [dbo].[tinhHeSoLuong]    Script Date: 11/18/2013 14:52:30 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE FUNCTION [dbo].[tinhHeSoLuong](@id INT)
RETURNS FLOAT
AS
BEGIN
	RETURN (SELECT heSoLuong FROM hosonv, danghd WHERE adID = @id AND hosonv.dangID = danghd.dangID);
END;
GO
/****** Object:  UserDefinedFunction [dbo].[tienChietKhau]    Script Date: 11/18/2013 14:52:30 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE FUNCTION [dbo].[tienChietKhau](@ID INT)
RETURNS FLOAT
AS
BEGIN
	DECLARE @result FLOAT = 0;
	IF (SELECT ckhau FROM mhangdhb WHERE mhangdhbID = @ID) > 0
		SET @result = (SELECT dgia*ckhau/100 FROM mhangdhb WHERE mhangdhbID = @ID);
	ELSE IF (SELECT ckhaut FROM mhangdhb WHERE mhangdhbID = @ID) > 0
		SET @result = (SELECT dgia*ckhaut/1.1 FROM mhangdhb WHERE mhangdhbID = @ID);
		
	RETURN @result;
END
GO
/****** Object:  View [dbo].[chamCong]    Script Date: 11/18/2013 14:52:32 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE VIEW [dbo].[chamCong]
AS
SELECT   adID, dbo.countDays(adID, - 2) AS P, dbo.countDays(adID, - 1) AS V, dbo.countDays(adID, 0) AS T, dbo.countDays(adID, 1) AS N, dbo.countDays(adID, 2) AS C, dbo.countDays(adID, 3) AS G
FROM      dbo.timeKeeper
GO
EXEC sys.sp_addextendedproperty @name=N'MS_DiagramPane1', @value=N'[0E232FF0-B466-11cf-A24F-00AA00A3EFFF, 1.00]
Begin DesignProperties = 
   Begin PaneConfigurations = 
      Begin PaneConfiguration = 0
         NumPanes = 4
         Configuration = "(H (1[40] 4[20] 2[20] 3) )"
      End
      Begin PaneConfiguration = 1
         NumPanes = 3
         Configuration = "(H (1 [50] 4 [25] 3))"
      End
      Begin PaneConfiguration = 2
         NumPanes = 3
         Configuration = "(H (1 [50] 2 [25] 3))"
      End
      Begin PaneConfiguration = 3
         NumPanes = 3
         Configuration = "(H (4 [30] 2 [40] 3))"
      End
      Begin PaneConfiguration = 4
         NumPanes = 2
         Configuration = "(H (1 [56] 3))"
      End
      Begin PaneConfiguration = 5
         NumPanes = 2
         Configuration = "(H (2 [66] 3))"
      End
      Begin PaneConfiguration = 6
         NumPanes = 2
         Configuration = "(H (4 [50] 3))"
      End
      Begin PaneConfiguration = 7
         NumPanes = 1
         Configuration = "(V (3))"
      End
      Begin PaneConfiguration = 8
         NumPanes = 3
         Configuration = "(H (1[56] 4[18] 2) )"
      End
      Begin PaneConfiguration = 9
         NumPanes = 2
         Configuration = "(H (1 [75] 4))"
      End
      Begin PaneConfiguration = 10
         NumPanes = 2
         Configuration = "(H (1[66] 2) )"
      End
      Begin PaneConfiguration = 11
         NumPanes = 2
         Configuration = "(H (4 [60] 2))"
      End
      Begin PaneConfiguration = 12
         NumPanes = 1
         Configuration = "(H (1) )"
      End
      Begin PaneConfiguration = 13
         NumPanes = 1
         Configuration = "(V (4))"
      End
      Begin PaneConfiguration = 14
         NumPanes = 1
         Configuration = "(V (2))"
      End
      ActivePaneConfig = 0
   End
   Begin DiagramPane = 
      Begin Origin = 
         Top = 0
         Left = 0
      End
      Begin Tables = 
         Begin Table = "timeKeeper"
            Begin Extent = 
               Top = 6
               Left = 38
               Bottom = 122
               Right = 198
            End
            DisplayFlags = 280
            TopColumn = 0
         End
      End
   End
   Begin SQLPane = 
   End
   Begin DataPane = 
      Begin ParameterDefaults = ""
      End
   End
   Begin CriteriaPane = 
      Begin ColumnWidths = 11
         Column = 1440
         Alias = 900
         Table = 1170
         Output = 720
         Append = 1400
         NewValue = 1170
         SortType = 1350
         SortOrder = 1410
         GroupBy = 1350
         Filter = 1350
         Or = 1350
         Or = 1350
         Or = 1350
      End
   End
End
' , @level0type=N'SCHEMA',@level0name=N'dbo', @level1type=N'VIEW',@level1name=N'chamCong'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_DiagramPaneCount', @value=1 , @level0type=N'SCHEMA',@level0name=N'dbo', @level1type=N'VIEW',@level1name=N'chamCong'
GO
/****** Object:  View [dbo].[tongTienMatHang]    Script Date: 11/18/2013 14:52:32 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE VIEW [dbo].[tongTienMatHang]
AS
SELECT   mhangdhbID AS ID, dbo.tienChietKhau(mhangdhbID) AS tienChietKhau, dgia - dbo.tienChietKhau(mhangdhbID) AS donGiaSauChietKhau, sluong * (dgia - dbo.tienChietKhau(mhangdhbID)) AS tongTien
FROM      dbo.mhangdhb
GO
EXEC sys.sp_addextendedproperty @name=N'MS_DiagramPane1', @value=N'[0E232FF0-B466-11cf-A24F-00AA00A3EFFF, 1.00]
Begin DesignProperties = 
   Begin PaneConfigurations = 
      Begin PaneConfiguration = 0
         NumPanes = 4
         Configuration = "(H (1[40] 4[20] 2[20] 3) )"
      End
      Begin PaneConfiguration = 1
         NumPanes = 3
         Configuration = "(H (1 [50] 4 [25] 3))"
      End
      Begin PaneConfiguration = 2
         NumPanes = 3
         Configuration = "(H (1 [50] 2 [25] 3))"
      End
      Begin PaneConfiguration = 3
         NumPanes = 3
         Configuration = "(H (4 [30] 2 [40] 3))"
      End
      Begin PaneConfiguration = 4
         NumPanes = 2
         Configuration = "(H (1 [56] 3))"
      End
      Begin PaneConfiguration = 5
         NumPanes = 2
         Configuration = "(H (2 [66] 3))"
      End
      Begin PaneConfiguration = 6
         NumPanes = 2
         Configuration = "(H (4 [50] 3))"
      End
      Begin PaneConfiguration = 7
         NumPanes = 1
         Configuration = "(V (3))"
      End
      Begin PaneConfiguration = 8
         NumPanes = 3
         Configuration = "(H (1[56] 4[18] 2) )"
      End
      Begin PaneConfiguration = 9
         NumPanes = 2
         Configuration = "(H (1 [75] 4))"
      End
      Begin PaneConfiguration = 10
         NumPanes = 2
         Configuration = "(H (1[66] 2) )"
      End
      Begin PaneConfiguration = 11
         NumPanes = 2
         Configuration = "(H (4 [60] 2))"
      End
      Begin PaneConfiguration = 12
         NumPanes = 1
         Configuration = "(H (1) )"
      End
      Begin PaneConfiguration = 13
         NumPanes = 1
         Configuration = "(V (4))"
      End
      Begin PaneConfiguration = 14
         NumPanes = 1
         Configuration = "(V (2))"
      End
      ActivePaneConfig = 0
   End
   Begin DiagramPane = 
      Begin Origin = 
         Top = 0
         Left = 0
      End
      Begin Tables = 
         Begin Table = "mhangdhb"
            Begin Extent = 
               Top = 6
               Left = 38
               Bottom = 114
               Right = 190
            End
            DisplayFlags = 280
            TopColumn = 0
         End
      End
   End
   Begin SQLPane = 
   End
   Begin DataPane = 
      Begin ParameterDefaults = ""
      End
   End
   Begin CriteriaPane = 
      Begin ColumnWidths = 11
         Column = 1440
         Alias = 900
         Table = 1170
         Output = 720
         Append = 1400
         NewValue = 1170
         SortType = 1350
         SortOrder = 1410
         GroupBy = 1350
         Filter = 1350
         Or = 1350
         Or = 1350
         Or = 1350
      End
   End
End
' , @level0type=N'SCHEMA',@level0name=N'dbo', @level1type=N'VIEW',@level1name=N'tongTienMatHang'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_DiagramPaneCount', @value=1 , @level0type=N'SCHEMA',@level0name=N'dbo', @level1type=N'VIEW',@level1name=N'tongTienMatHang'
GO
/****** Object:  UserDefinedFunction [dbo].[tinhThuongNgoaiGio]    Script Date: 11/18/2013 14:52:32 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE FUNCTION [dbo].[tinhThuongNgoaiGio] (@id INT)
RETURNS FLOAT
AS
BEGIN
	DECLARE @result FLOAT = ROUND(((SELECT (SELECT SUM(thoiLuong)
					FROM ngoaigio
					WHERE dangID = 1 AND adID = @id)*heSo
			FROM dangNgoaiGio
			WHERE dangID = 1)
		
		+ (SELECT (SELECT SUM(thoiLuong)
					FROM ngoaigio
					WHERE dangID = 2 AND adID = @id)*heSo
			FROM dangNgoaiGio
			WHERE dangID = 2)
		
		+ (SELECT (SELECT SUM(thoiLuong)
					FROM ngoaigio
					WHERE dangID = 3 AND adID = @id)*heSo
			FROM dangNgoaiGio
			WHERE dangID = 3))
			
		* (SELECT luongCB*(1 + hSCV + hSTN)
			FROM hosonv
			WHERE adID = @id)
		
		/(SELECT C + N + P + V
			FROM chamCong
			WHERE adID = @id)
		
		/8,0);
		
	IF @result IS NULL
		SET @result = 0;
	
	RETURN @result;
END;
GO
/****** Object:  View [dbo].[luongVanPhong]    Script Date: 11/18/2013 14:52:32 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE VIEW [dbo].[luongVanPhong]
AS
SELECT   dbo.hosonv.adID, dbo.hosonv.ngayThuviec, dbo.hosonv.ngayKetThuc, dbo.hosonv.ngayBatDau, dbo.hosonv.dangID, dbo.tinhHeSoLuong(dbo.hosonv.adID) AS heSoLuong, dbo.hosonv.luongCB, dbo.hosonv.hSCV, 
                 dbo.hosonv.hSTN, dbo.tinhThuongNgoaiGio(dbo.hosonv.adID) AS lamNgoaiGio, dbo.tinhBH() AS hesoBH, dbo.hosonv.luongCB * dbo.tinhBH() / 100 AS tienBH, dbo.hosonv.com, dbo.tinhPhuCap(dbo.hosonv.adID) AS phuCap, 
                 dbo.chamCong.C AS coMat, dbo.chamCong.N AS nuaBuoi, dbo.chamCong.P AS nghiPhep, dbo.chamCong.V AS vangMat, ROUND(((((dbo.hosonv.luongCB * (1 + dbo.hosonv.hSCV + dbo.hosonv.hSTN)) 
                 * (dbo.chamCong.C + dbo.chamCong.N / 2 + dbo.chamCong.P)) / (dbo.chamCong.C + dbo.chamCong.N + dbo.chamCong.P + dbo.chamCong.V) + dbo.tinhThuongNgoaiGio(dbo.hosonv.adID) + dbo.tinhPhuCap(dbo.hosonv.adID)) 
                 + dbo.hosonv.com * (dbo.chamCong.C + ROUND(dbo.chamCong.N / 2, 0, 1))) * dbo.tinhHeSoLuong(dbo.hosonv.adID) - dbo.hosonv.luongCB * dbo.tinhBH() / 100, 0) AS tongLuong
FROM      dbo.hosonv INNER JOIN
                 dbo.chamCong ON dbo.hosonv.adID = dbo.chamCong.adID
WHERE   (dbo.hosonv.nhomID = 2)
GO
EXEC sys.sp_addextendedproperty @name=N'MS_DiagramPane1', @value=N'[0E232FF0-B466-11cf-A24F-00AA00A3EFFF, 1.00]
Begin DesignProperties = 
   Begin PaneConfigurations = 
      Begin PaneConfiguration = 0
         NumPanes = 4
         Configuration = "(H (1[41] 4[20] 2[20] 3) )"
      End
      Begin PaneConfiguration = 1
         NumPanes = 3
         Configuration = "(H (1 [50] 4 [25] 3))"
      End
      Begin PaneConfiguration = 2
         NumPanes = 3
         Configuration = "(H (1 [50] 2 [25] 3))"
      End
      Begin PaneConfiguration = 3
         NumPanes = 3
         Configuration = "(H (4 [30] 2 [40] 3))"
      End
      Begin PaneConfiguration = 4
         NumPanes = 2
         Configuration = "(H (1 [56] 3))"
      End
      Begin PaneConfiguration = 5
         NumPanes = 2
         Configuration = "(H (2 [66] 3))"
      End
      Begin PaneConfiguration = 6
         NumPanes = 2
         Configuration = "(H (4 [50] 3))"
      End
      Begin PaneConfiguration = 7
         NumPanes = 1
         Configuration = "(V (3))"
      End
      Begin PaneConfiguration = 8
         NumPanes = 3
         Configuration = "(H (1[56] 4[18] 2) )"
      End
      Begin PaneConfiguration = 9
         NumPanes = 2
         Configuration = "(H (1 [75] 4))"
      End
      Begin PaneConfiguration = 10
         NumPanes = 2
         Configuration = "(H (1[66] 2) )"
      End
      Begin PaneConfiguration = 11
         NumPanes = 2
         Configuration = "(H (4 [60] 2))"
      End
      Begin PaneConfiguration = 12
         NumPanes = 1
         Configuration = "(H (1) )"
      End
      Begin PaneConfiguration = 13
         NumPanes = 1
         Configuration = "(V (4))"
      End
      Begin PaneConfiguration = 14
         NumPanes = 1
         Configuration = "(V (2))"
      End
      ActivePaneConfig = 0
   End
   Begin DiagramPane = 
      Begin Origin = 
         Top = 0
         Left = 0
      End
      Begin Tables = 
         Begin Table = "hosonv"
            Begin Extent = 
               Top = 6
               Left = 38
               Bottom = 122
               Right = 202
            End
            DisplayFlags = 280
            TopColumn = 0
         End
         Begin Table = "chamCong"
            Begin Extent = 
               Top = 6
               Left = 240
               Bottom = 122
               Right = 400
            End
            DisplayFlags = 280
            TopColumn = 0
         End
      End
   End
   Begin SQLPane = 
   End
   Begin DataPane = 
      Begin ParameterDefaults = ""
      End
   End
   Begin CriteriaPane = 
      Begin ColumnWidths = 11
         Column = 1440
         Alias = 900
         Table = 1170
         Output = 720
         Append = 1400
         NewValue = 1170
         SortType = 1350
         SortOrder = 1410
         GroupBy = 1350
         Filter = 1350
         Or = 1350
         Or = 1350
         Or = 1350
      End
   End
End
' , @level0type=N'SCHEMA',@level0name=N'dbo', @level1type=N'VIEW',@level1name=N'luongVanPhong'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_DiagramPaneCount', @value=1 , @level0type=N'SCHEMA',@level0name=N'dbo', @level1type=N'VIEW',@level1name=N'luongVanPhong'
GO
/****** Object:  View [dbo].[luongNhaMay]    Script Date: 11/18/2013 14:52:32 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE VIEW [dbo].[luongNhaMay]
AS
SELECT   dbo.hosonv.adID, dbo.hosonv.ngayThuviec, dbo.hosonv.ngayKetThuc, DATEDIFF(day, dbo.hosonv.ngayThuviec, dbo.hosonv.ngayKetThuc) AS tongNgay, dbo.hosonv.ngayBatDau, dbo.hosonv.dangID, 
                 dbo.tinhHeSoLuong(dbo.hosonv.adID) AS heSoLuong, dbo.hosonv.giamtru, (dbo.hosonv.giamtru - 1) * 3600000 + 9000000 AS ttgiamtru, dbo.hosonv.luongCB, dbo.hosonv.hSCV, 
                 dbo.hosonv.luongCB * dbo.hosonv.hSCV AS tienHSCV, dbo.hosonv.luongCB * dbo.hosonv.hSTN AS tienHSTN, dbo.hosonv.hSTN, dbo.tinhThuongNgoaiGio(dbo.hosonv.adID) AS lamNgoaiGio, dbo.tinhBH() AS hesoBH, 
                 dbo.hosonv.luongCB * dbo.tinhBH() / 100 AS tienBH, dbo.hosonv.com, dbo.chamCong.C + dbo.chamCong.N / 2 AS ngayCom, (dbo.chamCong.C + dbo.chamCong.N / 2) * dbo.hosonv.com AS tongCom, dbo.hosonv.docHai, 
                 dbo.tinhPhuCap(dbo.hosonv.adID) AS phuCap, dbo.chamCong.C AS coMat, dbo.chamCong.N AS nuaBuoi, dbo.chamCong.P AS nghiPhep, dbo.chamCong.P * (dbo.hosonv.docHai + dbo.tinhPhuCap(dbo.hosonv.adID)) 
                 AS tongPhep, dbo.chamCong.V AS vangMat, (dbo.hosonv.luongCB * (1 + dbo.hosonv.hSCV + dbo.hosonv.hSTN) * dbo.chamCong.V) / (dbo.chamCong.C + dbo.chamCong.N / 2 + dbo.chamCong.P + dbo.chamCong.V) 
                 + dbo.chamCong.V * (dbo.hosonv.docHai + dbo.tinhPhuCap(dbo.hosonv.adID)) AS tongVang, dbo.tinhThuongNgoaiGio(dbo.hosonv.adID) AS ngoaigio, dbo.hosonv.luongCB * dbo.tinhBH() / 100 AS baoHiemNLD, 
                 dbo.hosonv.luongCB * 23 / 100 AS baoHiemDN, ROUND(((((dbo.hosonv.luongCB * (1 + dbo.hosonv.hSCV + dbo.hosonv.hSTN)) * (dbo.chamCong.C + dbo.chamCong.N / 2 + dbo.chamCong.P)) 
                 / (dbo.chamCong.C + dbo.chamCong.N + dbo.chamCong.P + dbo.chamCong.V) + dbo.tinhThuongNgoaiGio(dbo.hosonv.adID) + dbo.hosonv.docHai + dbo.tinhPhuCap(dbo.hosonv.adID)) 
                 + (dbo.chamCong.C + ROUND(dbo.chamCong.N / 2, 0, 1)) * dbo.hosonv.com) * dbo.tinhHeSoLuong(dbo.hosonv.adID) - dbo.hosonv.luongCB * dbo.tinhBH() / 100, 0) AS tongLuong, 
                 dbo.noNegative(ROUND(((((dbo.hosonv.luongCB * (1 + dbo.hosonv.hSCV + dbo.hosonv.hSTN)) * (dbo.chamCong.C + dbo.chamCong.N / 2 + dbo.chamCong.P)) 
                 / (dbo.chamCong.C + dbo.chamCong.N + dbo.chamCong.P + dbo.chamCong.V) + dbo.tinhThuongNgoaiGio(dbo.hosonv.adID) + dbo.hosonv.docHai + dbo.tinhPhuCap(dbo.hosonv.adID)) 
                 + (dbo.chamCong.C + ROUND(dbo.chamCong.N / 2, 0, 1)) * dbo.hosonv.com) * dbo.tinhHeSoLuong(dbo.hosonv.adID) - dbo.hosonv.luongCB * dbo.tinhBH() / 100, 0) - ((dbo.hosonv.giamtru - 1) * 3600000 + 9000000)) 
                 AS thuNhapTinhThue, dbo.tinhThue(dbo.noNegative(ROUND(((((dbo.hosonv.luongCB * (1 + dbo.hosonv.hSCV + dbo.hosonv.hSTN)) * (dbo.chamCong.C + dbo.chamCong.N / 2 + dbo.chamCong.P)) 
                 / (dbo.chamCong.C + dbo.chamCong.N + dbo.chamCong.P + dbo.chamCong.V) + dbo.tinhThuongNgoaiGio(dbo.hosonv.adID) + dbo.hosonv.docHai + dbo.tinhPhuCap(dbo.hosonv.adID)) 
                 + (dbo.chamCong.C + ROUND(dbo.chamCong.N / 2, 0, 1)) * dbo.hosonv.com) * dbo.tinhHeSoLuong(dbo.hosonv.adID) - dbo.hosonv.luongCB * dbo.tinhBH() / 100, 0) - ((dbo.hosonv.giamtru - 1) * 3600000 + 9000000))) 
                 AS tienThue
FROM      dbo.hosonv INNER JOIN
                 dbo.chamCong ON dbo.hosonv.adID = dbo.chamCong.adID
WHERE   (dbo.hosonv.nhomID = 1)
GO
EXEC sys.sp_addextendedproperty @name=N'MS_DiagramPane1', @value=N'[0E232FF0-B466-11cf-A24F-00AA00A3EFFF, 1.00]
Begin DesignProperties = 
   Begin PaneConfigurations = 
      Begin PaneConfiguration = 0
         NumPanes = 4
         Configuration = "(H (1[5] 4[7] 2[76] 3) )"
      End
      Begin PaneConfiguration = 1
         NumPanes = 3
         Configuration = "(H (1 [50] 4 [25] 3))"
      End
      Begin PaneConfiguration = 2
         NumPanes = 3
         Configuration = "(H (1 [50] 2 [25] 3))"
      End
      Begin PaneConfiguration = 3
         NumPanes = 3
         Configuration = "(H (4 [30] 2 [40] 3))"
      End
      Begin PaneConfiguration = 4
         NumPanes = 2
         Configuration = "(H (1 [56] 3))"
      End
      Begin PaneConfiguration = 5
         NumPanes = 2
         Configuration = "(H (2 [66] 3))"
      End
      Begin PaneConfiguration = 6
         NumPanes = 2
         Configuration = "(H (4 [50] 3))"
      End
      Begin PaneConfiguration = 7
         NumPanes = 1
         Configuration = "(V (3))"
      End
      Begin PaneConfiguration = 8
         NumPanes = 3
         Configuration = "(H (1[56] 4[18] 2) )"
      End
      Begin PaneConfiguration = 9
         NumPanes = 2
         Configuration = "(H (1 [75] 4))"
      End
      Begin PaneConfiguration = 10
         NumPanes = 2
         Configuration = "(H (1[66] 2) )"
      End
      Begin PaneConfiguration = 11
         NumPanes = 2
         Configuration = "(H (4 [60] 2))"
      End
      Begin PaneConfiguration = 12
         NumPanes = 1
         Configuration = "(H (1) )"
      End
      Begin PaneConfiguration = 13
         NumPanes = 1
         Configuration = "(V (4))"
      End
      Begin PaneConfiguration = 14
         NumPanes = 1
         Configuration = "(V (2))"
      End
      ActivePaneConfig = 0
   End
   Begin DiagramPane = 
      Begin Origin = 
         Top = 0
         Left = -1061
      End
      Begin Tables = 
         Begin Table = "hosonv"
            Begin Extent = 
               Top = 6
               Left = 38
               Bottom = 122
               Right = 202
            End
            DisplayFlags = 280
            TopColumn = 0
         End
         Begin Table = "chamCong"
            Begin Extent = 
               Top = 11
               Left = 363
               Bottom = 127
               Right = 523
            End
            DisplayFlags = 280
            TopColumn = 0
         End
      End
   End
   Begin SQLPane = 
   End
   Begin DataPane = 
      Begin ParameterDefaults = ""
      End
   End
   Begin CriteriaPane = 
      Begin ColumnWidths = 11
         Column = 1440
         Alias = 900
         Table = 1170
         Output = 720
         Append = 1400
         NewValue = 1170
         SortType = 1350
         SortOrder = 1410
         GroupBy = 1350
         Filter = 1350
         Or = 1350
         Or = 1350
         Or = 1350
      End
   End
End
' , @level0type=N'SCHEMA',@level0name=N'dbo', @level1type=N'VIEW',@level1name=N'luongNhaMay'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_DiagramPaneCount', @value=1 , @level0type=N'SCHEMA',@level0name=N'dbo', @level1type=N'VIEW',@level1name=N'luongNhaMay'
GO
/****** Object:  View [dbo].[luongKinhDoanh]    Script Date: 11/18/2013 14:52:32 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE VIEW [dbo].[luongKinhDoanh]
AS
SELECT   DATEDIFF(day, dbo.hosonv.ngayThuviec, dbo.hosonv.ngayKetThuc) AS tongNgay, dbo.hosonv.adID, dbo.chamCong.C AS coMat, dbo.chamCong.N AS nuaBuoi, dbo.chamCong.P AS nghiPhep, dbo.hosonv.docHai, 
                 dbo.chamCong.C + dbo.chamCong.N / 2 AS ngayCom, (dbo.chamCong.C + dbo.chamCong.N / 2) * dbo.hosonv.com AS tongCom, dbo.chamCong.P * (dbo.hosonv.docHai + dbo.tinhPhuCap(dbo.hosonv.adID)) AS tongPhep, 
                 dbo.chamCong.V AS vangMat, (dbo.chamCong.V * (dbo.hosonv.luongCB * (1 + dbo.hosonv.hSCV + dbo.hosonv.hSTN) * dbo.chamCong.V)) / (dbo.chamCong.C + dbo.chamCong.N / 2 + dbo.chamCong.P + dbo.chamCong.V) 
                 + dbo.chamCong.V * (dbo.hosonv.docHai + dbo.tinhPhuCap(dbo.hosonv.adID)) AS tongVang, dbo.tinhThuongNgoaiGio(dbo.hosonv.adID) AS ngoaigio, dbo.hosonv.luongCB * dbo.tinhBH() / 100 AS baoHiemNLD, 
                 dbo.hosonv.luongCB * 23 / 100 AS baoHiemDN, dbo.hosonv.ngayThuviec, dbo.hosonv.ngayKetThuc, dbo.hosonv.ngayBatDau, dbo.hosonv.dangID, dbo.tinhHeSoLuong(dbo.hosonv.adID) AS heSoLuong, dbo.hosonv.luongCB, 
                 dbo.hosonv.hSCV, dbo.hosonv.luongCB * dbo.hosonv.hSCV AS tienHSCV, dbo.hosonv.luongCB * dbo.hosonv.hSTN AS tienHSTN, dbo.hosonv.hSTN, dbo.tinhThuongNgoaiGio(dbo.chamCong.adID) AS lamNgoaiGio, dbo.tinhBH() 
                 AS hesoBH, dbo.hosonv.luongCB * dbo.tinhBH() / 100 AS tienBH, dbo.sanLuongKinhDoanh.sLCT, dbo.sanLuongKinhDoanh.sLTT, ROUND(CAST(dbo.sanLuongKinhDoanh.sLTT AS FLOAT) / dbo.sanLuongKinhDoanh.sLCT, 2) 
                 AS tiLeSanLuong, dbo.dinhLuongSanLuong(dbo.sanLuongKinhDoanh.sLTT * 100 / dbo.sanLuongKinhDoanh.sLCT) AS heSoLuongTheoSanLuong, dbo.hosonv.xang, dbo.tinhPhuCap(dbo.chamCong.adID) AS phuCap, 
                 dbo.chamCong.C, dbo.chamCong.N, dbo.chamCong.P, dbo.chamCong.V, ROUND(dbo.dinhLuongSanLuong(dbo.sanLuongKinhDoanh.sLTT * 100 / dbo.sanLuongKinhDoanh.sLCT) 
                 * ((((dbo.hosonv.luongCB * (1 + dbo.hosonv.hSCV + dbo.hosonv.hSTN)) * (dbo.chamCong.C + dbo.chamCong.N / 2 + dbo.chamCong.P)) / (dbo.chamCong.C + dbo.chamCong.N + dbo.chamCong.P + dbo.chamCong.V) 
                 + dbo.hosonv.com * (dbo.chamCong.C + ROUND(dbo.chamCong.N / 2, 0, 1)) + dbo.hosonv.xang + dbo.tinhPhuCap(dbo.chamCong.adID)) * dbo.tinhHeSoLuong(dbo.chamCong.adID) * dbo.tinhHeSoLuong(dbo.chamCong.adID)) 
                 - dbo.hosonv.luongCB * dbo.tinhBH() / 100, 0) AS tongLuong
FROM      dbo.chamCong INNER JOIN
                 dbo.hosonv INNER JOIN
                 dbo.sanLuongKinhDoanh ON dbo.hosonv.adID = dbo.sanLuongKinhDoanh.adID ON dbo.chamCong.adID = dbo.hosonv.adID
WHERE   (dbo.hosonv.nhomID = 3)
GO
EXEC sys.sp_addextendedproperty @name=N'MS_DiagramPane1', @value=N'[0E232FF0-B466-11cf-A24F-00AA00A3EFFF, 1.00]
Begin DesignProperties = 
   Begin PaneConfigurations = 
      Begin PaneConfiguration = 0
         NumPanes = 4
         Configuration = "(H (1[26] 4[10] 2[46] 3) )"
      End
      Begin PaneConfiguration = 1
         NumPanes = 3
         Configuration = "(H (1 [50] 4 [25] 3))"
      End
      Begin PaneConfiguration = 2
         NumPanes = 3
         Configuration = "(H (1 [50] 2 [25] 3))"
      End
      Begin PaneConfiguration = 3
         NumPanes = 3
         Configuration = "(H (4 [30] 2 [40] 3))"
      End
      Begin PaneConfiguration = 4
         NumPanes = 2
         Configuration = "(H (1 [56] 3))"
      End
      Begin PaneConfiguration = 5
         NumPanes = 2
         Configuration = "(H (2 [66] 3))"
      End
      Begin PaneConfiguration = 6
         NumPanes = 2
         Configuration = "(H (4 [50] 3))"
      End
      Begin PaneConfiguration = 7
         NumPanes = 1
         Configuration = "(V (3))"
      End
      Begin PaneConfiguration = 8
         NumPanes = 3
         Configuration = "(H (1[56] 4[18] 2) )"
      End
      Begin PaneConfiguration = 9
         NumPanes = 2
         Configuration = "(H (1 [75] 4))"
      End
      Begin PaneConfiguration = 10
         NumPanes = 2
         Configuration = "(H (1[66] 2) )"
      End
      Begin PaneConfiguration = 11
         NumPanes = 2
         Configuration = "(H (4 [60] 2))"
      End
      Begin PaneConfiguration = 12
         NumPanes = 1
         Configuration = "(H (1) )"
      End
      Begin PaneConfiguration = 13
         NumPanes = 1
         Configuration = "(V (4))"
      End
      Begin PaneConfiguration = 14
         NumPanes = 1
         Configuration = "(V (2))"
      End
      ActivePaneConfig = 0
   End
   Begin DiagramPane = 
      Begin Origin = 
         Top = 0
         Left = 0
      End
      Begin Tables = 
         Begin Table = "chamCong"
            Begin Extent = 
               Top = 2
               Left = 278
               Bottom = 118
               Right = 438
            End
            DisplayFlags = 280
            TopColumn = 0
         End
         Begin Table = "hosonv"
            Begin Extent = 
               Top = 6
               Left = 38
               Bottom = 122
               Right = 202
            End
            DisplayFlags = 280
            TopColumn = 0
         End
         Begin Table = "sanLuongKinhDoanh"
            Begin Extent = 
               Top = 110
               Left = 273
               Bottom = 211
               Right = 433
            End
            DisplayFlags = 280
            TopColumn = 0
         End
      End
   End
   Begin SQLPane = 
   End
   Begin DataPane = 
      Begin ParameterDefaults = ""
      End
   End
   Begin CriteriaPane = 
      Begin ColumnWidths = 11
         Column = 1440
         Alias = 900
         Table = 1170
         Output = 720
         Append = 1400
         NewValue = 1170
         SortType = 1350
         SortOrder = 1410
         GroupBy = 1350
         Filter = 1350
         Or = 1350
         Or = 1350
         Or = 1350
      End
   End
End
' , @level0type=N'SCHEMA',@level0name=N'dbo', @level1type=N'VIEW',@level1name=N'luongKinhDoanh'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_DiagramPaneCount', @value=1 , @level0type=N'SCHEMA',@level0name=N'dbo', @level1type=N'VIEW',@level1name=N'luongKinhDoanh'
GO
/****** Object:  Default [DF__xnkmai__slxkm__25A691D2]    Script Date: 11/18/2013 14:52:28 ******/
ALTER TABLE [dbo].[xnkmai] ADD  DEFAULT ((0)) FOR [slxkm]
GO
/****** Object:  Default [DF__xnkmai__sltkm__269AB60B]    Script Date: 11/18/2013 14:52:28 ******/
ALTER TABLE [dbo].[xnkmai] ADD  DEFAULT ((0)) FOR [sltkm]
GO
/****** Object:  Default [DF__timeKeeper___1__308E3499]    Script Date: 11/18/2013 14:52:29 ******/
ALTER TABLE [dbo].[timeKeeper] ADD  DEFAULT ((0)) FOR [_1]
GO
/****** Object:  Default [DF__timeKeeper___2__318258D2]    Script Date: 11/18/2013 14:52:29 ******/
ALTER TABLE [dbo].[timeKeeper] ADD  DEFAULT ((0)) FOR [_2]
GO
/****** Object:  Default [DF__timeKeeper___3__32767D0B]    Script Date: 11/18/2013 14:52:29 ******/
ALTER TABLE [dbo].[timeKeeper] ADD  DEFAULT ((0)) FOR [_3]
GO
/****** Object:  Default [DF__timeKeeper___4__336AA144]    Script Date: 11/18/2013 14:52:29 ******/
ALTER TABLE [dbo].[timeKeeper] ADD  DEFAULT ((0)) FOR [_4]
GO
/****** Object:  Default [DF__timeKeeper___5__345EC57D]    Script Date: 11/18/2013 14:52:29 ******/
ALTER TABLE [dbo].[timeKeeper] ADD  DEFAULT ((0)) FOR [_5]
GO
/****** Object:  Default [DF__timeKeeper___6__3552E9B6]    Script Date: 11/18/2013 14:52:29 ******/
ALTER TABLE [dbo].[timeKeeper] ADD  DEFAULT ((0)) FOR [_6]
GO
/****** Object:  Default [DF__timeKeeper___7__36470DEF]    Script Date: 11/18/2013 14:52:29 ******/
ALTER TABLE [dbo].[timeKeeper] ADD  DEFAULT ((0)) FOR [_7]
GO
/****** Object:  Default [DF__timeKeeper___8__373B3228]    Script Date: 11/18/2013 14:52:29 ******/
ALTER TABLE [dbo].[timeKeeper] ADD  DEFAULT ((0)) FOR [_8]
GO
/****** Object:  Default [DF__timeKeeper___9__382F5661]    Script Date: 11/18/2013 14:52:29 ******/
ALTER TABLE [dbo].[timeKeeper] ADD  DEFAULT ((0)) FOR [_9]
GO
/****** Object:  Default [DF__timeKeeper___10__39237A9A]    Script Date: 11/18/2013 14:52:29 ******/
ALTER TABLE [dbo].[timeKeeper] ADD  DEFAULT ((0)) FOR [_10]
GO
/****** Object:  Default [DF__timeKeeper___11__3A179ED3]    Script Date: 11/18/2013 14:52:29 ******/
ALTER TABLE [dbo].[timeKeeper] ADD  DEFAULT ((0)) FOR [_11]
GO
/****** Object:  Default [DF__timeKeeper___12__3B0BC30C]    Script Date: 11/18/2013 14:52:29 ******/
ALTER TABLE [dbo].[timeKeeper] ADD  DEFAULT ((0)) FOR [_12]
GO
/****** Object:  Default [DF__timeKeeper___13__3BFFE745]    Script Date: 11/18/2013 14:52:29 ******/
ALTER TABLE [dbo].[timeKeeper] ADD  DEFAULT ((0)) FOR [_13]
GO
/****** Object:  Default [DF__timeKeeper___14__3CF40B7E]    Script Date: 11/18/2013 14:52:29 ******/
ALTER TABLE [dbo].[timeKeeper] ADD  DEFAULT ((0)) FOR [_14]
GO
/****** Object:  Default [DF__timeKeeper___15__3DE82FB7]    Script Date: 11/18/2013 14:52:29 ******/
ALTER TABLE [dbo].[timeKeeper] ADD  DEFAULT ((0)) FOR [_15]
GO
/****** Object:  Default [DF__timeKeeper___16__3EDC53F0]    Script Date: 11/18/2013 14:52:29 ******/
ALTER TABLE [dbo].[timeKeeper] ADD  DEFAULT ((0)) FOR [_16]
GO
/****** Object:  Default [DF__timeKeeper___17__3FD07829]    Script Date: 11/18/2013 14:52:29 ******/
ALTER TABLE [dbo].[timeKeeper] ADD  DEFAULT ((0)) FOR [_17]
GO
/****** Object:  Default [DF__timeKeeper___18__40C49C62]    Script Date: 11/18/2013 14:52:29 ******/
ALTER TABLE [dbo].[timeKeeper] ADD  DEFAULT ((0)) FOR [_18]
GO
/****** Object:  Default [DF__timeKeeper___19__41B8C09B]    Script Date: 11/18/2013 14:52:29 ******/
ALTER TABLE [dbo].[timeKeeper] ADD  DEFAULT ((0)) FOR [_19]
GO
/****** Object:  Default [DF__timeKeeper___20__42ACE4D4]    Script Date: 11/18/2013 14:52:29 ******/
ALTER TABLE [dbo].[timeKeeper] ADD  DEFAULT ((0)) FOR [_20]
GO
/****** Object:  Default [DF__timeKeeper___21__43A1090D]    Script Date: 11/18/2013 14:52:29 ******/
ALTER TABLE [dbo].[timeKeeper] ADD  DEFAULT ((0)) FOR [_21]
GO
/****** Object:  Default [DF__timeKeeper___22__44952D46]    Script Date: 11/18/2013 14:52:29 ******/
ALTER TABLE [dbo].[timeKeeper] ADD  DEFAULT ((0)) FOR [_22]
GO
/****** Object:  Default [DF__timeKeeper___23__4589517F]    Script Date: 11/18/2013 14:52:29 ******/
ALTER TABLE [dbo].[timeKeeper] ADD  DEFAULT ((0)) FOR [_23]
GO
/****** Object:  Default [DF__timeKeeper___24__467D75B8]    Script Date: 11/18/2013 14:52:29 ******/
ALTER TABLE [dbo].[timeKeeper] ADD  DEFAULT ((0)) FOR [_24]
GO
/****** Object:  Default [DF__timeKeeper___25__477199F1]    Script Date: 11/18/2013 14:52:29 ******/
ALTER TABLE [dbo].[timeKeeper] ADD  DEFAULT ((0)) FOR [_25]
GO
/****** Object:  Default [DF__timeKeeper___26__4865BE2A]    Script Date: 11/18/2013 14:52:29 ******/
ALTER TABLE [dbo].[timeKeeper] ADD  DEFAULT ((0)) FOR [_26]
GO
/****** Object:  Default [DF__timeKeeper___27__4959E263]    Script Date: 11/18/2013 14:52:29 ******/
ALTER TABLE [dbo].[timeKeeper] ADD  DEFAULT ((0)) FOR [_27]
GO
/****** Object:  Default [DF__timeKeeper___28__4A4E069C]    Script Date: 11/18/2013 14:52:29 ******/
ALTER TABLE [dbo].[timeKeeper] ADD  DEFAULT ((0)) FOR [_28]
GO
/****** Object:  Default [DF__timeKeeper___29__4B422AD5]    Script Date: 11/18/2013 14:52:29 ******/
ALTER TABLE [dbo].[timeKeeper] ADD  DEFAULT ((0)) FOR [_29]
GO
/****** Object:  Default [DF__timeKeeper___30__4C364F0E]    Script Date: 11/18/2013 14:52:29 ******/
ALTER TABLE [dbo].[timeKeeper] ADD  DEFAULT ((0)) FOR [_30]
GO
/****** Object:  Default [DF__timeKeeper___31__4D2A7347]    Script Date: 11/18/2013 14:52:29 ******/
ALTER TABLE [dbo].[timeKeeper] ADD  DEFAULT ((0)) FOR [_31]
GO
/****** Object:  Default [DF__sanLuongKi__sLCT__6BAEFA67]    Script Date: 11/18/2013 14:52:29 ******/
ALTER TABLE [dbo].[sanLuongKinhDoanh] ADD  DEFAULT ((1)) FOR [sLCT]
GO
/****** Object:  Default [DF__sanLuongKi__sLTT__6CA31EA0]    Script Date: 11/18/2013 14:52:29 ******/
ALTER TABLE [dbo].[sanLuongKinhDoanh] ADD  DEFAULT ((0)) FOR [sLTT]
GO
/****** Object:  Default [DF__salary__salary__4F12BBB9]    Script Date: 11/18/2013 14:52:29 ******/
ALTER TABLE [dbo].[salary] ADD  DEFAULT ((0)) FOR [salary]
GO
/****** Object:  Default [DF__salary__bonus__5006DFF2]    Script Date: 11/18/2013 14:52:29 ******/
ALTER TABLE [dbo].[salary] ADD  DEFAULT ((0)) FOR [bonus]
GO
/****** Object:  Default [DF__phuCap__tien__7720AD13]    Script Date: 11/18/2013 14:52:29 ******/
ALTER TABLE [dbo].[phuCap] ADD  DEFAULT ((0)) FOR [tien]
GO
/****** Object:  Default [DF__phuCap__chuThich__30592A6F]    Script Date: 11/18/2013 14:52:29 ******/
ALTER TABLE [dbo].[phuCap] ADD  DEFAULT ('') FOR [chuThich]
GO
/****** Object:  Default [DF__users__active__07F6335A]    Script Date: 11/18/2013 14:52:29 ******/
ALTER TABLE [dbo].[users] ADD  DEFAULT ((1)) FOR [active]
GO
/****** Object:  Default [DF__menus__idSTT__173876EA]    Script Date: 11/18/2013 14:52:29 ******/
ALTER TABLE [dbo].[menus] ADD  DEFAULT ((0)) FOR [idSTT]
GO
/****** Object:  Default [DF__menus__level__182C9B23]    Script Date: 11/18/2013 14:52:29 ******/
ALTER TABLE [dbo].[menus] ADD  DEFAULT ((0)) FOR [level]
GO
/****** Object:  Default [DF__menus__code__1920BF5C]    Script Date: 11/18/2013 14:52:29 ******/
ALTER TABLE [dbo].[menus] ADD  DEFAULT ('0') FOR [code]
GO
/****** Object:  Default [DF__permissio__statu__1DE57479]    Script Date: 11/18/2013 14:52:29 ******/
ALTER TABLE [dbo].[permission] ADD  DEFAULT ((1)) FOR [status]
GO
/****** Object:  Default [DF_ngoaigio_dangID]    Script Date: 11/18/2013 14:52:30 ******/
ALTER TABLE [dbo].[ngoaigio] ADD  CONSTRAINT [DF_ngoaigio_dangID]  DEFAULT ((1)) FOR [dangID]
GO
/****** Object:  Default [DF__lxg__slgui__536D5C82]    Script Date: 11/18/2013 14:52:30 ******/
ALTER TABLE [dbo].[lxg] ADD  DEFAULT ((0)) FOR [slgui]
GO
/****** Object:  Default [DF__lxg__slx__546180BB]    Script Date: 11/18/2013 14:52:30 ******/
ALTER TABLE [dbo].[lxg] ADD  DEFAULT ((0)) FOR [slx]
GO
/****** Object:  Default [DF__lxg__slton__5555A4F4]    Script Date: 11/18/2013 14:52:30 ******/
ALTER TABLE [dbo].[lxg] ADD  DEFAULT ((0)) FOR [slton]
GO
/****** Object:  Default [DF__menus1__level__22AA2996]    Script Date: 11/18/2013 14:52:30 ******/
ALTER TABLE [dbo].[menus1] ADD  DEFAULT ((0)) FOR [level]
GO
/****** Object:  Default [DF__dmspham__dgia__6A50C1DA]    Script Date: 11/18/2013 14:52:30 ******/
ALTER TABLE [dbo].[dmspham] ADD  DEFAULT ((0)) FOR [dgia]
GO
/****** Object:  Default [DF__dmspham__dgia_1__6B44E613]    Script Date: 11/18/2013 14:52:30 ******/
ALTER TABLE [dbo].[dmspham] ADD  DEFAULT ((0)) FOR [dgia_1]
GO
/****** Object:  Default [DF__dmspham__dgia_2__6C390A4C]    Script Date: 11/18/2013 14:52:30 ******/
ALTER TABLE [dbo].[dmspham] ADD  DEFAULT ((0)) FOR [dgia_2]
GO
/****** Object:  Default [DF__dmspham__dgia_3__6D2D2E85]    Script Date: 11/18/2013 14:52:30 ******/
ALTER TABLE [dbo].[dmspham] ADD  DEFAULT ((0)) FOR [dgia_3]
GO
/****** Object:  Default [DF__dmspham__dgia_4__6E2152BE]    Script Date: 11/18/2013 14:52:30 ******/
ALTER TABLE [dbo].[dmspham] ADD  DEFAULT ((0)) FOR [dgia_4]
GO
/****** Object:  Default [DF__dhban__tygia__031C6FA4]    Script Date: 11/18/2013 14:52:30 ******/
ALTER TABLE [dbo].[dhban] ADD  DEFAULT ((1)) FOR [tygia]
GO
/****** Object:  Default [DF__dhban__autock__041093DD]    Script Date: 11/18/2013 14:52:30 ******/
ALTER TABLE [dbo].[dhban] ADD  DEFAULT ((0)) FOR [autock]
GO
/****** Object:  Default [DF__dangNgoai__chuTh__26CFC035]    Script Date: 11/18/2013 14:52:30 ******/
ALTER TABLE [dbo].[dangNgoaiGio] ADD  DEFAULT ('Luong ngoai gio') FOR [chuThich]
GO
/****** Object:  Default [DF__danghd__heSoLuon__1975C517]    Script Date: 11/18/2013 14:52:30 ******/
ALTER TABLE [dbo].[danghd] ADD  DEFAULT ((1)) FOR [heSoLuong]
GO
/****** Object:  Default [DF__lsxg__slxg__4EA8A765]    Script Date: 11/18/2013 14:52:30 ******/
ALTER TABLE [dbo].[lsxg] ADD  DEFAULT ((0)) FOR [slxg]
GO
/****** Object:  Default [DF__mhangdhb__dgia__2E3BD7D3]    Script Date: 11/18/2013 14:52:30 ******/
ALTER TABLE [dbo].[mhangdhb] ADD  DEFAULT ((0)) FOR [dgia]
GO
/****** Object:  Default [DF__mhangdhb__sluong__2F2FFC0C]    Script Date: 11/18/2013 14:52:30 ******/
ALTER TABLE [dbo].[mhangdhb] ADD  DEFAULT ((0)) FOR [sluong]
GO
/****** Object:  Default [DF__mhangdhb__ttien__30242045]    Script Date: 11/18/2013 14:52:30 ******/
ALTER TABLE [dbo].[mhangdhb] ADD  DEFAULT ((0)) FOR [ttien]
GO
/****** Object:  Default [DF__mhangdhb__ckhau__3118447E]    Script Date: 11/18/2013 14:52:30 ******/
ALTER TABLE [dbo].[mhangdhb] ADD  DEFAULT ((0)) FOR [ckhau]
GO
/****** Object:  Default [DF__mhangdhb__ckhaut__320C68B7]    Script Date: 11/18/2013 14:52:30 ******/
ALTER TABLE [dbo].[mhangdhb] ADD  DEFAULT ((0)) FOR [ckhaut]
GO
/****** Object:  Default [DF__mhangdhb__ttdck__33008CF0]    Script Date: 11/18/2013 14:52:30 ******/
ALTER TABLE [dbo].[mhangdhb] ADD  DEFAULT ((0)) FOR [ttdck]
GO
/****** Object:  Default [DF__mhangdhb__slhgui__33F4B129]    Script Date: 11/18/2013 14:52:30 ******/
ALTER TABLE [dbo].[mhangdhb] ADD  DEFAULT ((0)) FOR [slhgui]
GO
/****** Object:  Default [DF__mhangdhb__hkmai__34E8D562]    Script Date: 11/18/2013 14:52:30 ******/
ALTER TABLE [dbo].[mhangdhb] ADD  DEFAULT ((0)) FOR [hkmai]
GO