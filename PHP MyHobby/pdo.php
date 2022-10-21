<?php
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=myhobby','root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
error_reporting(0);
