<?php require_once 'inc/config.php'; ?>
<?php


class Auth{
 
    static function islog(){
        global $pdo;

        //Si des données sont saisies..
        if(isset($_SESSION['Auth']) && isset($_SESSION['Auth']['email']) && isset($_SESSION['Auth']['password'])){
            $q = array('email'=>$_SESSION['Auth']['email'],'password'=>$_SESSION['Auth']['password']);
            $sql = 'SELECT email,password FROM nm_devoir1 WHERE email = :email AND password =  :password';
            $req = $pdo->prepare($sql);
            $req->execute($q);
            $count = $req->rowCount($sql);
            //Si les données saiseis corresponde à deux present dans la base de donnés...
                if($count == 1){
                    return true;
                }else{
                    return false;
                }
        }else{
            return false;
        }
    }
}
?>