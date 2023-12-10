
CREATE DATABASE project_php ;

USE project_php;

-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: localhost    Database: mtm
-- ------------------------------------------------------
-- Server version	8.0.34
--
-- Table structure for table users
--

DROP TABLE IF EXISTS users;

CREATE TABLE users (
  id_user int NOT NULL AUTO_INCREMENT,
  name varchar(220) NOT NULL,
  email varchar(220) NOT NULL,
  password varchar(50) DEFAULT NULL,
  status varchar(1) DEFAULT NULL,
  update_date datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id_user)
) AUTO_INCREMENT=1 ;


DROP TABLE IF EXISTS drivers;

CREATE TABLE drivers (
  id_driver int NOT NULL AUTO_INCREMENT,
  name varchar(100) DEFAULT NULL,
  nickname varchar(50) DEFAULT NULL,
  phone1 varchar(20) DEFAULT NULL,
  phone2 varchar(20) DEFAULT NULL,
  birth_date date DEFAULT CURRENT_TIMESTAMP,
  status varchar(1) DEFAULT NULL,
  update_date datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id_driver)
) AUTO_INCREMENT=1 ;


DROP TABLE IF EXISTS regions;

CREATE TABLE regions (
  id_region int NOT NULL AUTO_INCREMENT,
  city varchar(100) DEFAULT NULL,
  name varchar(100) DEFAULT NULL,
  distance_hq decimal(16,2) DEFAULT NULL,
  status varchar(1) DEFAULT NULL,
  PRIMARY KEY (id_region)
)  AUTO_INCREMENT=1;


