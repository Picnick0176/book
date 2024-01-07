<?php
include  'config.php';

//สมัครสมาชิก
if($_GET['cmd'] == "register"){
	
	$username = $_POST["username"];
	$password = $_POST["password"];
	$confirm_password = $_POST["confirm-password"];
	$MTitle = $_POST["MTitle"];
	$MFname = $_POST["MFname"];
	$MLname = $_POST["MLname"];
	$MGender = $_POST["MGender"];
	$MLevel = $_POST["MLevel"];
	$MRoom = $_POST["MRoom"];

	if($password != $confirm_password){
		echo "
		<script>
		alert('Password ไม่ตรงกัน');
		window.location = 'index.php';
		</script>";
		exit;
	}else{
		$sql = "INSERT INTO member (MTitle, MFname, MLname, MGender, MLevel, MRoom, Username, Password)
				VALUES ('$MTitle', '$MFname', '$MLname', '$MGender', '$MLevel', '$MRoom', '$username', '$password')";

		if (mysqli_query($conn, $sql)) {
		echo "
		<script>
		alert('บันทึกข้อมูลสำเร็จ, ไปหน้าเข้าสู่ระบบ');
		window.location = 'index.php';
		</script>";
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}

		mysqli_close($conn);
		exit;
	}	
}

//ล็อกอิน
if($_GET['cmd'] == "login"){	
session_start();


$strSQL = "SELECT * FROM member WHERE Username = '".mysqli_real_escape_string($conn,$_POST["username"])."' 
	and Password = '".mysqli_real_escape_string($conn,$_POST["password"])."'";
	$objQuery = mysqli_query($conn,$strSQL);
	$objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);
	if(!$objResult)
	{
			echo "
		<script>
		alert('Username หรือ Password ไม่ถูกต้อง');
		window.location = 'index.php';
		</script>";
	}else{
		
			$_SESSION["memberid"] = $objResult["memberid"];

			session_write_close();
			
		
			header("location:member.php");
			
	}
	mysqli_close($conn);

}	
//ยืมหนังสือ
if($_GET["cmd"] == "borrow"){
date_default_timezone_set("Asia/Bangkok");
session_start();
	
	if($_SESSION['memberid'] == "")
	{
		echo "
		<script>
			alert('กรุณาล็อกอินก่อน');
			window.location = 'index.php';
		</script>";
		exit();
	}else{
		
		$memberid = $_GET["memberid"];
		$idbook = $_GET["idbook"];
		$BookName = $_GET["BookName"];
		
		$date = date("Y-m-d H:i:s");
		$date_s = strtotime("+7 day");
		$xx = date("Y-m-d H:i:s",$date_s);
	
		$sql = "INSERT INTO borrow (memberid, DateBrw, DateReturn, BookID, BookName)
				VALUES ('$memberid', '$date', '$xx', '$idbook', '$BookName')";

		if (mysqli_query($conn, $sql)) {
		echo "
		<script>
			alert('ยืมหนังสือสำเร็จ, ".$BookName.", ระยะเวลา 7 วัน, กรุณาคืนตามกำหนดด้วย');
			window.location = 'member.php';
		</script>";
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}

		mysqli_close($conn);
		exit();
	}
}

//คืนหนังสือ
if($_GET['cmd'] == "return"){	

date_default_timezone_set("Asia/Bangkok");
session_start();
	
	if($_SESSION['memberid'] == "")
	{
		echo "
		<script>
			alert('กรุณาล็อกอินก่อน');
			window.location = 'index.php';
		</script>";
		exit();
	}else{
		
		
		$idborrow = $_GET["idborrow"];

		
		$date = date("Y-m-d H:i:s");
		$date_s = strtotime("+7 day");
		$xx = date("Y-m-d H:i:s",$date_s);
	
		$sql = "DELETE FROM borrow WHERE id = '".$idborrow."'";

		if (mysqli_query($conn, $sql)) {
		echo "
		<script>
			alert('คืนหหนังสือสำเร็จ ขอบคุณครับ');
			window.location = 'member.php';
		</script>";
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}

		mysqli_close($conn);
		exit();
	}

}	

//ออกจากระบบ
if($_GET['cmd'] == "logout"){	
	session_start();
	unset($_SESSION['memberid']);
	header("Location: index.php");
	exit();
}	

	

	
	


?>