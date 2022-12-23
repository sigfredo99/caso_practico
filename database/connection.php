<?php
class Connection
{
    public static function Connect()
    {
        define('server', 'localhost');
        define('db_name', 'recharge_deposit');
        define('user', 'root');
        define('pass', '');
        $props = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');

        try {
            $connection = new PDO("mysql:host=" . server . ";dbname=" . db_name, user, pass, $props);
            return $connection;
        } catch (Exception $e) {
            die("Ocurrio un Error en la conexion:" . $e->getMessage());
        }
    }
}
