<?php    
// User Input form Data Count
function InputCount($col,$value){
    global $connection;
    $stm = $connection->prepare("SELECT $col FROM users WHERE $col=?");
    $stm->execute(array($value));
    $count=$stm->rowCount(); 
    return  $count;
}

    // function getAdmin($id,$col){
    //   global $connection;
    //   $stm=$connection->prepare("SELECT $col FROM admins WHERE id=?");
    //   $stm->execute(array($id));
    //   $result=$stm->fetch(PDO::FETCH_ASSOC);
    //   return $result[$col];
    // }

    function getProfile($id){
        global $connection;
        $stm=$connection->prepare("SELECT * FROM users WHERE id=?");
        $stm->execute(array($id));
        $result=$stm->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    function get_header(){
        require_once('includs/header.php');
    }
    function get_footer(){
        require_once('includs/footer.php');
    }

