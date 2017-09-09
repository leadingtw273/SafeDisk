<?php
    session_start();
	  require_once 'memberFunction.php';
      
    //ajax:將註冊資料加入資料庫[Username,Password,Email,Phonenumber]
    if(isset($_POST["addUser"])){
      $sqlin = new memberFunction;
      echo $sqlin -> add($_POST["addUser"],$_POST["addPwd"],$_POST["addPhone"],$_POST["addEmail"]);
    }
    //ajax:登入驗證&&給予session
    if(isset($_POST["loginUser"])){
    	$sqlin = new memberFunction;
    	echo $sqlin -> login($_POST["loginUser"],$_POST["loginPwd"]);
    }
    //ajax:檢查是否登錄過
    if(isset($_POST["check"])){
      $sqlin = new memberFunction;
      echo $sqlin -> check();        
    }
    //ajax:登出，刪除所有session
    if(isset($_POST["signout"])){
      $sqlin = new memberFunction;
      echo $sqlin -> signout();  
    }
    //ajax:驗證key
    if(isset($_POST["addKey"])){
      $sqlin = new memberFunction;
      echo $sqlin -> addKey($_POST["addKey"]);  
    }
    //ajax:檢查使用者是否重複
    if(isset($_POST["username"])){
      $sqlin = new memberFunction;
      $isAvailable = $sqlin -> checkUsername($_POST["username"]);
      echo json_encode(array('valid' => $isAvailable,));
    }
    //ajax:取得userInfo
    if(isset($_POST["userInfo"])){
      $info = [
      "user"  => $_SESSION["member_user"],
      "email" => $_SESSION["member_email"],
      "phone" => $_SESSION["member_phone"]
      ];
      echo json_encode($info);
    }
?>