<?php
// $bdd = new PDO(
//     'mysql:host=localhost;dbname=chocoblast',
//     'root',
//     '',
//     array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
// );

class ConnectBdd
{
   

    static public function getBdd($dbName,$user,$mdp){
        return new PDO($dbName,$user,$mdp,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));;
    }
}

?>