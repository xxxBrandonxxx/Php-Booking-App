<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 'On');

session_start();
include __DIR__ . "/../model/apartments.php";
include __DIR__ . "/config.php";

Booking::createBooking();
