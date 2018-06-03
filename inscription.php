<?php
    function insert_loin_DBR($push){
        $DB_conn = mysqli_connect ('localhost','solange','abc1234567','nounous');
        $sql_sentence = "INSERT INTO `login` (`login`, `mot_de_passe`, `type`) VALUES(\"$push[0]\",\"$push[1]\",\"$push[2]\");";
        $DB_result = mysqli_query($DB_conn,$sql_sentence);          
        mysqli_close($DB_conn);
    }
    function insert_nounous_DBR($push){
        $DB_conn = mysqli_connect ('localhost','solange','abc1234567','nounous');
        $sql_sentence = "INSERT INTO `nounous` (`id_nounous`, `login`, `mot de passe`, `nom`, `prenom`, `age`, `ville`, `situation`, `email`, `portable`, `photo`, `langues`, `presentation`, `experience`) VALUES("
            .$push["id_nounous"].","
            ."'".$push['login']."',"
            ."'".$push['mot de passe']."',"
            ."'".$push['nom']."',"
            ."'".$push['prenom']."',"
            .$push["age"].","
            ."'".$push['ville']."',"
            ."'".$push['situation']."',"
            ."'".$push['email']."',"
            ."'".$push['portable']."',"
            ."'".$push['photo']."',"
            ."'".$push['langues']."',"
            ."'".str_replace("'", "''", $push['presentation'])."',"
            ."'".str_replace("'", "''", $push['experience'])."'"
            .");";
        echo $sql_sentence;
        $DB_result = mysqli_query($DB_conn,$sql_sentence);          
        mysqli_close($DB_conn);
    }
    function insert_parents_DBR($push){
        $DB_conn = mysqli_connect ('localhost','solange','abc1234567','nounous');
        $sql_sentence = "INSERT INTO `parents` (`id_parents`, `login`, `mot de passe`, `nom`,  `ville`,  `email`, `portable`, `photo`) VALUES("
            .$push["id_parents"].","
            ."'".$push['login']."',"
            ."'".$push['mot de passe']."',"
            ."'".$push['nom']."',"
            ."'".$push['ville']."',"
            ."'".$push['email']."',"
            ."'".$push['portable']."',"
            ."'".$push['photo']."');";
        echo $sql_sentence;
        $DB_result = mysqli_query($DB_conn,$sql_sentence);          
        mysqli_close($DB_conn);
    }
    function is_doublon_DBR($id){
       $DB_conn = mysqli_connect ('localhost','solange','abc1234567','nounous');
        $sql_sentence = "select * from login where `login`.`login`='".$id."';";
        $DB_result = mysqli_query($DB_conn,$sql_sentence); 
        if ($DB_result){
            while($temp = mysqli_fetch_array ($DB_result,MYSQLI_ASSOC)){
                if ($temp['login']==$id){
                    return TRUE;
                }
            }
        }
        mysqli_close($DB_conn);
        return FALSE;
    }
    function id_login_DBR($id,$mdp){
       $DB_conn = mysqli_connect ('localhost','solange','abc1234567','nounous');
        $DB_result = mysqli_query($DB_conn,'select * from login;'); 
        if ($DB_result){
            while($temp = mysqli_fetch_array ($DB_result,MYSQLI_ASSOC)){
                if ($temp['login']==$id and $temp['mot_de_passe']==$mdp){
                    return $temp['id_utilisateur'];
                }
            }
        }
        mysqli_close($DB_conn);
        return "false";
    }
    function move_photo($photo_path){
        global $_FILES;
        if ($_FILES["file"]["error"]==0) {
            // 判断当期目录下的 upload 目录是否存在该文件
            // 如果没有需要创建它，且目录权限为 777
            if (file_exists($photo_path)){
                echo $_FILES["file"]["name"] . " fichier existe déja! ";
            }
            else{
                move_uploaded_file($_FILES["file"]["tmp_name"],$photo_path);
                echo "<h3>Photo move to $photo_path!</h3>";
            }
        } else {
        echo '<h3>Photo error!</h3>';
        }
    }
    function second_table(){
        global $_POST; 
        global $_FILES;
        //根据类型插入到nounous,parents表当中
        $id_utilisateur = id_login_DBR($_POST['Login'],$_POST['Mdp']);
        $_FILES["file"]["name"]=$_POST['Nom'];
        $photo_path = "./database/photos/" . $_FILES["file"]["name"];
        if ($_POST['identification']=="nounous") {
            $push = array(
                "id_nounous" => $id_utilisateur,
                "login" => $_POST['Login'],
                "mot de passe" => $_POST['Mdp'],
                "nom" => $_POST['Nom'],
                "prenom" => $_POST['Prenom'],
                "age" => $_POST['Age'],
                "ville" => $_POST['Ville'],
                "situation" => "candidat",
                "email" => $_POST['Email'],
                "portable" => $_POST['Portable'],
                "photo" => $photo_path,
                "langues" => implode(",",$_POST['Language']),
                "presentation" => $_POST['Presentation'],
                "experience" => $_POST['Expérience']
            );
            echo "<br/><br/><pre>";
            echo '<h3>informations du nounous</h3>';
            print_r($push);
            echo "</pre>";
            insert_nounous_DBR($push);
            echo "<h1>Succeed to insert into table: nousnous!</h1>";
            move_photo($photo_path);
        } 
        else if ($_POST['identification']=="parents"){
            $push = array(
                "id_parents" => $id_utilisateur,
                "login" => $_POST['Login'],
                "mot de passe" => $_POST['Mdp'],
                "nom" => $_POST['Nom'],
                "ville" => $_POST['Ville'],
                "email" => $_POST['Email'],
                "portable" => $_POST['Portable'],
                "photo" => $photo_path
            );
            echo "<br/><br/><pre>";
            echo '<h3>information du parents</h3>';
            print_r($push);
            echo "</pre>";
            insert_parents_DBR($push);
            echo "<h1>Succeed to insert into table: parents!</h1>";
            move_photo($photo_path);
            echo "<button type='button' onclick=\"location.href='./gerer_enfants.html'\">Gerer enfant(s)</button>";
        }
    }


    echo "<pre>";
    echo '<h3>$_POST</h3>';
    print_r($_POST);
    echo '<h3>$_FILES["file"]</h3>';
    print_r($_FILES["file"]);
    echo "</pre>";
    //插入到login表当中（注册行为）
    global $_POST; 
    if ($_POST['Mdp']!=$_POST['Mdp_r']) {
        echo "<h1>2fois de mot de passe n'est pas le meme!</h1>";
        if ($_POST['identification']=="nounous") {
            echo "<button type='button' onclick=\"location.href='./nouveau_nounous.html'\">Come back</button>";
        }
        elseif ($_POST['identification']=="parents") {
            echo "<button type='button' onclick=\"location.href='./nouveau_parents.html'\">Come back</button>";
        }
    }
    else{
        //存在一个login是doublon的问题
        if (is_doublon_DBR($_POST['Login'])) {
            echo '<h3>Login exisistes!Il faut changer un autre</h3>';

        } else {
            $push_login = array($_POST['Login'],$_POST['Mdp'],$_POST['identification']);
            insert_loin_DBR($push_login);
            echo "<h1>Succeed to sign in!</h1>";            
            second_table();
        }
        echo "<button type='button' onclick=\"location.href='./index.html'\">Come back</button>";
    }
    

?>

