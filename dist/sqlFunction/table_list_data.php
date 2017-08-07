<?php
	header('Content-Type: text/html;charset=UTF-8');
	require_once 'dbConfig.php';
    $mysqli = new mysqli(host, username, password, dbname);
    //確認連線
    if($mysqli -> connect_errno){
    	echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    }
    $mysqli -> set_charset("utf-8");

    session_start();
	$SQL="SELECT keyView_key, keyView_url FROM keyView WHERE keyView_user='".$_SESSION["member_user"]."'"; 
	$stock=array(); 

	if(!$result= $mysqli -> query($SQL)){
  		echo("Error description: ") . mysqli_error($mysqli);
  	}

	for ($i=0; $i<mysqli_num_rows($result); $i++) { //走訪紀錄集 (列)
	    $row=mysqli_fetch_array($result); //取得列陣列
	    $stock_key=$row["keyView_key"];
	    $stock_url=$row["keyView_url"];
	    $button_sendemail='<button type="button" class="send btn btn-primary btn-lg btn-block" data-url="'.$stock_url.'" ><span class="glyphicon glyphicon-envelope "></span></button>';
	    $button_QRcode='<button type="button" class="qr btn btn-success btn-lg btn-block" data-url="'.$stock_url.'"><span class="glyphicon glyphicon-qrcode"></span></button>';
	    $stock[$i]=array($i+1,$stock_key, $stock_url,$button_sendemail,$button_QRcode); //存入二維陣列
	} //end of for
	$arr["aaData"]=$stock;
	echo json_encode($arr);  //將陣列轉成 JSON 資料格式傳回
    $mysqli->close();
?>