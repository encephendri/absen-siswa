DROP TABLE absensi;

CREATE TABLE `absensi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nik` varchar(10) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `masuk` time DEFAULT NULL,
  `pulang` time DEFAULT NULL,
  `ijin` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

INSERT INTO absensi VALUES("2","1140","2018-11-01","10:03:35","22:52:08","");
INSERT INTO absensi VALUES("3","1120","2018-11-01","08:24:55","22:49:21","");
INSERT INTO absensi VALUES("4","1100","2018-11-01","22:36:57","22:54:47","");
INSERT INTO absensi VALUES("5","1140","2018-11-02","07:24:40","20:00:00","");
INSERT INTO absensi VALUES("6","1111","2018-11-02","17:02:41","23:00:00","");
INSERT INTO absensi VALUES("7","1140","2018-11-03","07:12:04","18:11:40","");
INSERT INTO absensi VALUES("8","1120","2018-11-03","07:12:12","18:11:55","");
INSERT INTO absensi VALUES("11","1111","2018-11-03","","","sakit");
INSERT INTO absensi VALUES("12","1100","2018-11-03","","","cuti");



DROP TABLE aplikasi;

CREATE TABLE `aplikasi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_aplikasi` varchar(255) DEFAULT NULL,
  `nama_perusahaan` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO aplikasi VALUES("1","Sistem Absensi Karyawan","PT. Angkasa Pura Solusi ","file_20181104090837.logo.jpg","test 1");



DROP TABLE area;

CREATE TABLE `area` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_area` varchar(255) DEFAULT NULL,
  `area` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

INSERT INTO area VALUES("1","T1","Terminal 1");
INSERT INTO area VALUES("2","T2","Terminal 2");
INSERT INTO area VALUES("3","T3","Terminal 3");



DROP TABLE jobtitle;

CREATE TABLE `jobtitle` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_jobtitle` varchar(255) DEFAULT NULL,
  `jobtitle` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO jobtitle VALUES("1","CL","Cleaner");
INSERT INTO jobtitle VALUES("2","ST","Staff");



DROP TABLE karyawan;

CREATE TABLE `karyawan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nik` char(10) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `job_title` varchar(255) DEFAULT NULL,
  `no_telp` varchar(255) DEFAULT NULL,
  `jenis_kelamin` varchar(255) DEFAULT NULL,
  `agama` varchar(255) DEFAULT NULL,
  `lokasi` varchar(255) DEFAULT NULL,
  `area` varchar(255) DEFAULT NULL,
  `sub_area` varchar(255) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO karyawan VALUES("1","1140","Adi Bagaskara","Cleaner","081213888888","Pria","islam","Jakarta","Terminal 3","Domestik","2018-10-01","2019-10-01","p2.jpg");
INSERT INTO karyawan VALUES("2","1120","Siti Badriyah","Cleaner","081314151617","Wanita","Islam","Jakarta","Terminal 1","Internasional","2018-10-01","2019-10-01","p3.jpg");
INSERT INTO karyawan VALUES("3","1100","Fachrur Rozi Utomo","Cleaner","081213876746","Pria","Islam","Jakarta","Terminal 2","Internasional","2018-10-01","2019-10-01","p4.jpg");
INSERT INTO karyawan VALUES("4","1111","Anama","Cleaner","","","Islam","Jakarta","Terminal 3","Domestik","2018-11-01","2019-11-02","file_20181102163643.t3.jpg");



DROP TABLE lokasi;

CREATE TABLE `lokasi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(255) DEFAULT NULL,
  `lokasi` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO lokasi VALUES("1","JKT","Jakarta");
INSERT INTO lokasi VALUES("2","SUB","Surabaya");



DROP TABLE sub_area;

CREATE TABLE `sub_area` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_subarea` varchar(255) DEFAULT NULL,
  `subarea` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

INSERT INTO sub_area VALUES("1","D","Domestik");
INSERT INTO sub_area VALUES("2","I","International");
INSERT INTO sub_area VALUES("3","1A","1A");
INSERT INTO sub_area VALUES("4","1B","1B");
INSERT INTO sub_area VALUES("5","1C","1C");



DROP TABLE user;

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(15) DEFAULT NULL,
  `password` varchar(8) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `area` varchar(50) DEFAULT NULL,
  `level` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO user VALUES("1","admin","admin","Administrator","","superadmin");
INSERT INTO user VALUES("2","adminarea","area","Area Terminal 1","","adminarea");



DROP TABLE user_level;

CREATE TABLE `user_level` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `level` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO user_level VALUES("1","superadmin");
INSERT INTO user_level VALUES("2","adminarea");
INSERT INTO user_level VALUES("3","adminall");
INSERT INTO user_level VALUES("4","karyawan");



