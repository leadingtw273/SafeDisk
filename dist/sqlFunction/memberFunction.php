<?php
	class memberFunction{
		//add 新增註冊成員資料
		function add($memberUser,$memberPwd,$memberPhone,$memberEmail){
			header("Content-Type:text/html; charset=utf-8");
          	require_once 'dbConfig.php';
          	$mysqli = new mysqli(host, username, password, dbname);
          	//確認連線
          	if($mysqli -> connect_errno){
          		echo "Failed to connect to MySQL: " . $mysqli->connect_error;
          	}
          	$mysqli -> set_charset("utf-8");
          	$sql = "INSERT INTO member (ID, user, email, phone, password) VALUES (null,'".$memberUser."','".$memberEmail."','".$memberPhone."','".$memberPwd."')";
          	if($mysqli->query($sql)){
          		$mysqli->close();
          		return '1';
          	}else{
          		$mysqli->close();
          		return "0";
          	}
		}
          //login 登入
          function login($userName,$userPassword){
               header("Content-Type:text/html; charset=utf-8");
               require_once 'dbConfig.php';
               $mysqli = new mysqli(host, username, password, dbname);
               //確認連線
               if($mysqli -> connect_errno){
                    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
               }
               $mysqli -> set_charset("utf-8");
               $sql = "SELECT * FROM member WHERE user='".$userName."' AND password='".$userPassword."' ";
               $record = mysqli_fetch_row($mysqli->query($sql));
               $mysqli->close();
               if($record){
                    $_SESSION["member_user"]=$record[1];
                    $_SESSION["member_email"]=$record[2];
                    $_SESSION["member_phone"]=$record[3];
                    $_SESSION["member_pwd"]=$record[4];
                    return '1';
               }else{
                    return '0';
               }

          }
          //check 檢查登入
          function check(){
               if(isset($_SESSION["member_user"])){
                    return $_SESSION["member_user"];
               }else{
                    return '1';
               }
          }
          //signout 登出，刪除session
          function signout(){
               session_destroy();
               return '1';
          }
          //addKey key驗證與註冊
          function addKey($addKey){
               header("Content-Type:text/html; charset=utf-8");
               require_once 'dbConfig.php';
               $mysqli = new mysqli(host, username, password, dbname);
               //確認連線
               if($mysqli -> connect_errno){
                    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
               }
               $mysqli -> set_charset("utf-8");

               $sql = "SELECT * FROM keyView WHERE keyView_key='".$addKey."'";
               $record = mysqli_fetch_array($mysqli -> query($sql));
               if($record["keyView_user"] == '' && $record["keyView_key"] == $addKey){
                    $sql = "UPDATE keyView SET keyView_user = '".$_SESSION["member_user"]."' WHERE keyView_key='".$addKey."'";
                    $mysqli->query($sql);
                    $mysqli->close();

                    return $record["keyView_url"];
               }else{
                    $mysqli->close();
                    return '0';
               }
          }
          //checkUsername 找尋是否有重複的Username
          function checkUsername($username){
               header("Content-Type:text/html; charset=utf-8");
               require_once 'dbConfig.php';
               $mysqli = new mysqli(host, username, password, dbname);
               //確認連線
               if($mysqli -> connect_errno){
                    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
               }
               $mysqli -> set_charset("utf-8");

               $sql = "SELECT user FROM member WHERE user='".$username."'";
               $record = mysqli_fetch_row($mysqli -> query($sql));
               $mysqli->close();
               return ($username == $record[0])?'false':'true';

          }
	}
?>