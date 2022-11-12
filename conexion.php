
<?php
function conexion() {
    $host= "host='localhost'";
    $dbname= "dbname=proyecto2";
    $port= "port=5432";
    $user= "user=postgres";
    $password= "password=p4D3Yt4#eJQATnmY";

    $db = pg_connect("$host $port $dbname $user $password") or die ("Error de conexion");
    return $db;
}
?>