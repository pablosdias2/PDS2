<?php
class Connection
{
    protected static  $conn;


    private function __construct()
    {

        self::$conn = new PDO('mysql:host=localhost;dbname=infootball;charset=utf8', 'root', '123456', array(PDO::MYSQL_ATTR_FOUND_ROWS => true));
    }

    public static function getConn()
    {
        if (!self::$conn)
            new Connection();
        return self::$conn;
    }

    public static function showLog($message)
  {
    echo "<script>
                console.log('" . $message  . "');
            </script>";
  }
}
