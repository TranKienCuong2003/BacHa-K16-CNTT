-- Xóa cơ sở dữ liệu nếu đã tồn tại
USE master;
GO
IF EXISTS (SELECT * FROM sys.databases WHERE name = N'QuanLyNhanVien')
BEGIN
    ALTER DATABASE QuanLyNhanVien SET SINGLE_USER WITH ROLLBACK IMMEDIATE;
    DROP DATABASE QuanLyNhanVien;
END
GO

-- Tạo cơ sở dữ liệu
CREATE DATABASE QuanLyNhanVien;
GO

USE QuanLyNhanVien;
GO

-- Xóa các bảng nếu đã tồn tại
IF OBJECT_ID('PHANCONG', 'U') IS NOT NULL DROP TABLE PHANCONG;
IF OBJECT_ID('DEAN', 'U') IS NOT NULL DROP TABLE DEAN;
IF OBJECT_ID('NHANVIEN', 'U') IS NOT NULL DROP TABLE NHANVIEN;
IF OBJECT_ID('PHONGBAN', 'U') IS NOT NULL DROP TABLE PHONGBAN;
GO

-- Tạo bảng PHONGBAN
CREATE TABLE PHONGBAN (
    PHG INT PRIMARY KEY,
    TenPHG NVARCHAR(50)
);
GO

-- Tạo bảng DEAN
CREATE TABLE DEAN (
    TenDA NVARCHAR(50),
    MaDA INT PRIMARY KEY,
    DDIEM_DA NVARCHAR(50),
    PHG INT,
    FOREIGN KEY (PHG) REFERENCES PHONGBAN(PHG)
);
GO

-- Tạo bảng NHANVIEN
CREATE TABLE NHANVIEN (
    HoNV NVARCHAR(50),
    TENLOT NVARCHAR(50),
    TENNV NVARCHAR(50),
    PHAI NVARCHAR(50),
    LUONG DECIMAL(10, 2),
    MANV INT PRIMARY KEY,
    NGSINH DATE,
    DIACHI NVARCHAR(100),
    PHG INT,
    FOREIGN KEY (PHG) REFERENCES PHONGBAN(PHG)
);
GO

-- Tạo bảng PHANCONG
CREATE TABLE PHANCONG (
    MANV INT,
    MADA INT,
    SOGIO INT,
    PRIMARY KEY (MANV, MADA),
    FOREIGN KEY (MANV) REFERENCES NHANVIEN(MANV),
    FOREIGN KEY (MADA) REFERENCES DEAN(MaDA)
);
GO

-- Nhập dữ liệu mẫu cho các bảng
INSERT INTO PHONGBAN VALUES 
(1, N'Nhân sự'), 
(2, N'Kế hoạch'), 
(3, N'Kinh doanh'), 
(4, N'Marketing'), 
(5, N'Kế toán');
GO

INSERT INTO DEAN VALUES 
(N'Sản phẩm X', 1, N'Quy Nhơn', 5), 
(N'Sản phẩm Y', 2, N'Nha Trang', 5), 
(N'Sản phẩm Z', 3, N'TP HCM', 5),
(N'Tin học hóa', 10, N'Bình Dương', 4);
GO

INSERT INTO NHANVIEN VALUES 
(N'Đinh', N'Lê', N'Tiên', N'Nam', 4000, 123456789, '1965-09-01', N'Nguyễn Trãi, Q5', 1),
(N'Nguyễn', N'Thị', N'Loan', N'Nữ', 2500, 33445555, '1955-08-12', N'Nguyễn Huệ, Q1', 5),
(N'Nguyễn', N'Lan', N'Anh', N'Nữ', 4300, 666884444, '1962-09-15', N'Lê Lợi, Q1', 5),
(N'Trần', N'Thanh', N'Tâm', N'Nam', 3800, 453453453, '1972-07-31', N'Trần Não, Q2', 2);
GO

INSERT INTO PHANCONG VALUES 
(123456789, 1, 32), 
(33445555, 2, 8), 
(666884444, 3, 40), 
(453453453, 1, 20);
GO

-- Hiển thị tất cả thông tin của bảng NHANVIEN
SELECT * FROM NHANVIEN;
GO

-- Hiển thị thông tin của những nhân viên ở phòng số 5
SELECT * FROM NHANVIEN WHERE PHG = 5;
GO

-- Hiển thị mã nhân viên, họ nhân viên, tên lót và tên nhân viên của những nhân viên ở phòng số 5 và có lương >= 3000
SELECT MANV, HoNV, TENLOT, TENNV 
FROM NHANVIEN 
WHERE PHG = 5 AND LUONG >= 3000;
GO

-- Hiển thị mã nhân viên, tên nhân viên của những nhân viên có lương từ 2000 đến 8000
SELECT MANV, TENNV 
FROM NHANVIEN 
WHERE LUONG BETWEEN 2000 AND 8000;
GO

-- Hiển thị thông tin của những nhân viên ở địa chỉ có tên đường là Nguyễn
SELECT * FROM NHANVIEN 
WHERE DIACHI LIKE N'%Nguyễn%';
GO

-- Cho biết số lượng nhân viên
SELECT COUNT(*) AS SoLuongNhanVien FROM NHANVIEN;
GO

-- Cho biết số lượng nhân viên trong từng phòng ban
SELECT PB.PHG, PB.TenPHG, COUNT(NV.MANV) AS SoLuongNhanVien 
FROM NHANVIEN NV
JOIN PHONGBAN PB ON NV.PHG = PB.PHG
GROUP BY PB.PHG, PB.TenPHG;
GO

-- Hiển thị thông tin về mã nhân viên, tên nhân viên và tên phòng ban ở phòng kế toán
SELECT NV.MANV, NV.TENNV, PB.TenPHG 
FROM NHANVIEN NV 
JOIN PHONGBAN PB ON NV.PHG = PB.PHG 
WHERE PB.TenPHG = N'Kế toán';
GO
