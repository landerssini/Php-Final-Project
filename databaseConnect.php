<?php


class databaseConnect {
    protected function connect() {
        try {
            $username = "root";
            $password = "";
            $connect = new PDO("mysql:host=localhost;dbname=favourite_movies");
            return $connect;
        }
        catch (PDOException $e) {
            print "Error!";
            die();
        }
    }
}