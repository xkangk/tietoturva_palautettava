<?php
function openDb(){

    try{
        $dbcon = new PDO('mysql:host=localhost;dbname=n0jaka00', 'root', '');
        $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $e){
        echo '<br>'.$e->getMessage();
    }

    return $dbcon;
}

// Functio joka tarkastaa onko kirjautuja validi
function checkUser($db, $mail, $password, $fname){

    $db = openDb();
    $json = json_decode(file_get_contents('php://input'), true);
    //Sanitointi
    $mail = filter_var($json['username'], FILTER_SANITIZE_EMAIL);
    $password = filter_var($json['password'], FILTER_SANITIZE_STRING);
    try{
        $sql = "SELECT password FROM kayttaja 
        WHERE username=?";
        $prepare = $db->prepare($sql);
        $prepare->execute(array($mail));
        //Haetaan tulokser fetch functiolla.
        $rows = $prepare->fetchAll();
        //$data = array('first_name' => $first_name);
        //Etsitään salasanarivi ja jos palautetaan true arvo jos kaikki ok.
        foreach($rows as $row){
            $pw = $row["password"];
            //purkaa salasanan HASHin
            if(password_verify($password, $pw) ){ 
                //print json_encode($data);
                return true;
            }
        }
        //Jos tiedot eivät tästää. palautetaan false
        
        return false;

    }catch(PDOException $e){
        echo '<br>'.$e->getMessage();
    }
}

function selectAsJson(object $db,string $sql): void {
    $query = $db->query($sql);
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    header('HTTP/1.1 200 OK');
    echo json_encode($result);
}

function executeInsert(object $db,string $sql): int {
    $query = $db->query($sql);
    return $db->lastInsertId();
}

function returnError(PDOException $pdoex): void {
    header('HTTP/1.1 500 Internal Server Error');
    $error = array('error' => $pdoex->getMessage());
    echo json_encode($error);
    exit;
}