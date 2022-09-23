-- phpMyAdmin SQL Dump
-- version 2.11.9.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 24, 2022 at 06:57 PM
-- Server version: 5.0.67
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_tokorendy`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` varchar(5) NOT NULL default '',
  `nama_lengkap` varchar(40) default NULL,
  `jenkel` varchar(6) default NULL,
  `alamat` varchar(50) default NULL,
  `telp` varchar(12) default NULL,
  `username` varchar(10) default NULL,
  `password` varchar(20) default NULL,
  PRIMARY KEY  (`id_admin`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_lengkap`, `jenkel`, `alamat`, `telp`, `username`, `password`) VALUES
('AD001', 'Muhammad Teguh', 'Pria', 'padang', '082375677101', 'teguh', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE IF NOT EXISTS `barang` (
  `id_barang` varchar(8) NOT NULL default '',
  `nama_barang` varchar(50) default NULL,
  `harga_beli` int(10) default NULL,
  `harga_jual` int(10) default NULL,
  `stok` int(10) default NULL,
  `satuan` varchar(20) default NULL,
  PRIMARY KEY  (`id_barang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `harga_beli`, `harga_jual`, `stok`, `satuan`) VALUES
('B0000001', 'komix', 2000, 250000, 200, 'Pcs'),
('B0000002', 'vix 44 anak', 9000, 15000, 50, 'Botol'),
('B0000003', 'zenirex', 10000, 15000, 50, 'Botol'),
('B0000004', 'termorex 30 ml', 10000, 14000, 25, 'Botol');

-- --------------------------------------------------------

--
-- Table structure for table `detil_pembelian`
--

CREATE TABLE IF NOT EXISTS `detil_pembelian` (
  `tanggal` date NOT NULL,
  `id_faktur` varchar(10) NOT NULL,
  `id_barang` varchar(8) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `harga_beli` int(10) NOT NULL,
  `jumlah_barang` int(10) NOT NULL,
  `total` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detil_pembelian`
--

INSERT INTO `detil_pembelian` (`tanggal`, `id_faktur`, `id_barang`, `nama_barang`, `harga_beli`, `jumlah_barang`, `total`) VALUES
('2022-06-23', 'F000000001', 'B0000001', 'komix', 2000, 3, 6000),
('2022-06-24', 'F000000002', 'B0000002', 'obh', 50000, 4, 200000),
('2022-06-24', 'F000000003', 'B0000002', 'obh', 50000, 7, 350000);

-- --------------------------------------------------------

--
-- Table structure for table `detil_penjualan`
--

CREATE TABLE IF NOT EXISTS `detil_penjualan` (
  `tanggal` date NOT NULL,
  `no_nota` varchar(10) NOT NULL,
  `id_barang` varchar(20) NOT NULL,
  `nama_barang` varchar(20) NOT NULL,
  `harga_jual` int(10) NOT NULL,
  `jumlah_barang` int(10) NOT NULL,
  `total` int(10) NOT NULL,
  `bayar` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detil_penjualan`
--

INSERT INTO `detil_penjualan` (`tanggal`, `no_nota`, `id_barang`, `nama_barang`, `harga_jual`, `jumlah_barang`, `total`, `bayar`) VALUES
('2022-06-23', 'N000000001', 'B0000002', 'obh', 65000, 4, 260000, 2000000),
('2022-06-24', 'N000000002', 'B0000002', 'obh', 65000, 4, 260000, 1000000),
('2022-06-24', 'N000000003', 'B0000004', 'betadine', 50000, 6, 300000, 560000);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `id_satuan` varchar(10) NOT NULL,
  `satuan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_satuan`, `satuan`) VALUES
('P001', 'Pcs'),
('P002', 'Dus'),
('P003', 'Botol');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE IF NOT EXISTS `pembelian` (
  `id_barang` varchar(8) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `harga_beli` int(10) NOT NULL,
  `jumlah_barang` int(10) NOT NULL,
  `total` int(10) NOT NULL,
  PRIMARY KEY  (`id_barang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian`
--


-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE IF NOT EXISTS `penjualan` (
  `id_barang` varchar(8) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `harga_jual` int(10) NOT NULL,
  `jumlah_barang` int(10) NOT NULL,
  `total` int(10) NOT NULL,
  PRIMARY KEY  (`id_barang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjualan`
--

