<?php
    echo "<pre>";
    echo '<h3>$_POST</h3>';
    print_r($_POST);
    echo '<h3>$_FILES["file"]</h3>';
    print_r($_FILES["file"]);
    echo "</pre>";

    function insert_loin_DBR($push){
        $DB_conn = mysqli_connect ('localhost','root','123456','LO07_projet');
        $sql_sentence = "INSERT INTO `login` (`login`, `mot_de_passe`, `type`) VALUES(\"$push[0]\",\"$push[1]\",\"$push[2]\");";
        $DB_result = mysqli_query($DB_conn,$sql_sentence);          
        mysqli_close($DB_conn);
    }
    function insert_nounous_DBR($push){
        $DB_conn = mysqli_connect ('localhost','root','123456','LO07_projet');
        $sql_sentence = "INSERT INTO `nounous` (`id_nounous`, `login`, `mot de passe`, `nom`, `prenom`, `age`, `ville`, `disponibilite`, `situation`, `email`, `portable`, `photo`, `langues`, `presentation`, `experience`) VALUES("
            .$push["id_nounous"].","
            ."'".$push['login']."',"
            ."'".$push['mot de passe']."',"
            ."'".$push['nom']."',"
            ."'".$push['prenom']."',"
            .$push["age"].","
            ."'".$push['ville']."',"
            ."'a',"
            ."'".$push['situation']."',"
            ."'".$push['email']."',"
            ."'".$push['portable']."',"
            ."'".$push['photo']."',"
            ."'".$push['langues']."',"
            ."'".$push['presentation']."',"
            ."'".$push['experience']."'"
            .");";
        echo $sql_sentence;
        $DB_result = mysqli_query($DB_conn,$sql_sentence);          
        mysqli_close($DB_conn);
    }
    function id_login_DBR($id,$mdp){
        $DB_conn = mysqli_connect ('localhost','root','123456','LO07_projet');
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
    //插入到login表当中（注册行为）
    if ($_POST['Mdp']!=$_POST['Mdp_r']) {
        echo "<h1>2fois de mot de passe n'est pas le meme!</h1>";
        if ($_POST['identification']=="nounous") {
            echo "<button type='button' class='btn btn-outline-primary Nouveau1' onclick=\"location.href='./nouveau_nounous.html'\">Come back</button>";
        }
        elseif ($_POST['identification']=="parents") {
            echo "<button type='button' class='btn btn-outline-primary Nouveau1' onclick=\"location.href='./nouveau_parents.html'\">Come back</button>";
        }
    }
    else{
        $push = array($_POST['Login'],$_POST['Mdp'],$_POST['identification']);
        print_r($push);
        insert_loin_DBR($push);
        echo "<h1>Succeed to sign in!</h1>";
        echo "<button type='button' class='btn btn-outline-primary Nouveau1' onclick=\"location.href='./index.html'\">Come back</button>";
    }

    //根据类型插入到nounous,parents表当中
    $id_utilisateur = id_login_DBR($_POST['Login'],$_POST['Mdp']);
    $_FILES["file"]["name"]=$_POST['Login'];
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
        echo '<h3>$push</h3>';
        print_r($push);
        echo "</pre>";
        insert_nounous_DBR($push);

        echo "<h1>Succeed to insert into table: nousnous!</h1>";
        // 判断当期目录下的 upload 目录是否存在该文件
        // 如果没有 upload 目录，你需要创建它，documents 目录权限为 777
        if (file_exists($photo_path)){
            echo $_FILES["file"]["name"] . " fichier existe déja! ";
        }
        else{ //将文件上传到 documents 目录下
            move_uploaded_file($_FILES["file"]["tmp_name"],$photo_path);
        }
    } 
    else if ($_POST['identification']=="parents"){
        echo "insert into table:parents";
    }
    else if ($_POST['identification']=="administrateur"){
        echo "insert into table:administrateur";
    }
?>

