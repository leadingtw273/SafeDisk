<?php
    session_start();
	header('Content-Type: text/html;charset=UTF-8');
	require_once 'dbConfig.php';
    $mysqli = new mysqli(host, username, password, dbname);
    //確認連線
    if($mysqli -> connect_errno){
    	echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    }
    $mysqli -> set_charset("utf-8");

	$SQL="SELECT user, email, phone FROM member"; 
	$stock=array(); 

	if(!$result= $mysqli -> query($SQL)){
  		echo("Error description: ") . mysqli_error($mysqli);
  	}

	for ($i=0; $i<mysqli_num_rows($result); $i++) { //走訪紀錄集 (列)
	    $row=mysqli_fetch_array($result); //取得列陣列
	    $stock_user=$row["user"];
	    $stock_email=$row["email"];
	    $stock_phone=$row["phone"];
	    //make table button
	    //$button_sendemail='<button type="button" class="send btn btn-primary btn-lg btn-block" data-url="'.$stock_url.'" data-key="'.$stock_key.'"><span class="glyphicon glyphicon-envelope "></span></button>';
	    //$button_QRcode='<button type="button" class="qr btn btn-success btn-lg btn-block" data-url="'.$stock_url.'"><span class="glyphicon glyphicon-qrcode"></span></button>';
	    $stock[$i]=array($i+1,$stock_user, $stock_email,$stock_phone); //存入二維陣列
	} 
	$arr["aaData"]=$stock;
	echo json_encode($arr);  //將陣列轉成 JSON 資料格式傳回
    $mysqli->close();
?>