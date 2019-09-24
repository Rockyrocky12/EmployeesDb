create database Employees;

use Employees;

CREATE TABLE `Employees` (
  `eid` int(11) NOT NULL auto_increment,
  `eFirstName` varchar(100) NOT NULL,
  `eLastName` varchar(100) NOT NULL,
  `eGender` varchar(100) NOT NULL,
  `eDepartment` varchar(100) NOT NULL,
  `eDateEmployed` int(4) NOT NULL,
  `eSalary` float NOT NULL,

  PRIMARY KEY  (`eid`)
);