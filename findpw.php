<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
//資料庫設定
//資料庫位置
$db_server = "localhost";
//資料庫名稱
$db_name = "final";
//資料庫管理者帳號
$db_user = "root";
//資料庫管理者密碼
$db_passwd = "root";
//對資料庫連線
if(!@mysqli_connect($db_server, $db_user, $db_passwd))
        die("無法對資料庫連線");

$account = addslashes($_POST['account']);
$ques = addslashes($_POST['ques']);
$Captcha = $_POST['Captcha'];
$chk1=NULL;

if(!isset($_SESSION))$SEC = "";
else $SEC = $_SESSION['checkNum'];
//如果驗證碼為空
if($Captcha == ""){
    $chk1=1;
    echo "<script type=\"text/javascript\">alert(\"驗證碼請勿空白\")</script>";
    echo '<meta http-equiv=REFRESH CONTENT=2;url=http://localhost/forgetpassword.php>';
}
//如果驗證碼不是空白但輸入錯誤
else if($Captcha != $SEC && $Captcha !=""){
    $chk1=1;
    echo "<script type=\"text/javascript\">alert(\"驗證碼請錯誤，請重新輸入\")</script>";
    echo '<meta http-equiv=REFRESH CONTENT=2;url=http://localhost/forgetpassword.php>';
}

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>Findpw</title>
		<meta name="description" content="">
		<meta name="keywords" content="">
		<link href="" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="http://localhost/css/home.css">
		<link rel="stylesheet" href="http://localhost/css/announce.css">
	</head>
	<body>
		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="http://localhost/index.php">N C T U &nbsp;&nbsp; S p o r t s</a>
				</div>
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav navbar-link">
						<li><a href="http://localhost/index.php">首頁 <span class="sr-only">(current)</span></a></li>
					</ul>
					<ul class="nav navbar-nav navbar-link">
						<li><a href="http://localhost/events.php">活動列表 <span class="sr-only">(current)</span></a></li>
					</ul>
					<ul class="nav navbar-nav navbar-link">
						<li ><a href="http://localhost/register.php">註冊 <span class="sr-only">(current)</span></a></li>
					</ul>
					<ul class="nav navbar-nav navbar-link">
						<li class="active"><a href="http://localhost/login.php">登入 <span class="sr-only">(current)</span></a></li>
					</ul>
				</div>
			</div>
		</nav>
		<div class="container announce-wrapper">
			<?php
			if($chk1==NULL && $account!=NULL && $ques!=NULL){
			$dsn = "mysql:host=$db_server;dbname=$db_name";
			$db = new PDO($dsn, $db_user, $db_passwd);
            
			$sql="SELECT * FROM `$db_name`.`user` where `user`.account='$account'";
			$people_rs = $db->prepare($sql);
			$people_rs->execute();
			$person = $people_rs->fetchObject();
			if($person->account==NULL) {
				echo "<script>alert('你尚未申請！!')</script>";
    			echo '<meta http-equiv=REFRESH CONTENT=1;url=http://localhost/register.php>'; 
			}
			else if( $person->question!=$ques) {
				echo "<script>alert('你愛的人變了ＱＱ')</script>";
    			echo '<meta http-equiv=REFRESH CONTENT=1;url=http://localhost/forgetpassword.php>'; }
			else{
			?>
			
			<h3 class="title">學號 ： <?php echo $person->account; ?></h3>
			<h3 class="title">密碼 ： <?php echo base64_decode($person->pw); ?></h3>
			<?php 
			}
		}
		else{
			echo "<script>alert('請填滿填好')</script>";
    		echo '<meta http-equiv=REFRESH CONTENT=1;url=http://localhost/forgetpassword.php>';
			}
			 ?>
		
		</div>
	</body>
</html>
