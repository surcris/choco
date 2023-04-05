<?php
// $bdd = new PDO(
//     'mysql:host=localhost;dbname=chocoblast',
//     'root',
//     '',
//     array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
// );

class ConnectBdd
{
    
    static public function getBdd(){
        //importer le fichier de config
        include './env.php';

        return new PDO("mysql:host=$host;dbname=$database", $login, $password,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));;
    }
}

?>