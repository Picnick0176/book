<?php
session_start();
	if($_SESSION['memberid'] == "")
	{
		echo "
		<script>
		alert('กรุณาล็อกอินก่อน');
		window.location = 'index.php';
		</script>";
		exit();
	}

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <title>ระบบยืมคืนหนังสือ</title>
<style>
	@font-face {
    font-family: supermarket;
    src: url('font/supermarket.ttf');
}
.container{
  background: rgb(255,255,255);
  background: linear-gradient(0deg, rgba(255,255,255,1) 100%, rgba(255,255,255,0.6026785714285714) 100%);
  border-radius: 20px;
  border-color: #ccc;
	-webkit-box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.2);
	-moz-box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.2);
	box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.2);
}
	body {
    padding-top: 20px;
	padding-bottom: 20px;
	 font-family: supermarket;
	 background-image:url("img/bg.jpg");
     background-position: center;
     background-repeat: no-repeat;
}
.colorgraph {
  height: 5px;
  border-top: 0;
  background: #c4e17f;
  border-radius: 5px;
  background-image: -webkit-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
  background-image: -moz-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
  background-image: -o-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
  background-image: linear-gradient(to right, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
}
	</style>
  </head>
  <body>
<div class="container">
<h1>ระบบ ยืม/คืน หนังสือ </h1>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Book</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="member.php">หน้าแรก</a></li>
      <li class="active"><a href="#">หนังสือ</a></li>
      <li><a href="list.php">รายการยืมของคุณ</a></li>
      <li><a href="process.php?cmd=logout">ออกจากระบบ</a></li>
    </ul>
  </div>
</nav>
  <?php
  include  'config.php';
  
    $sqlcode = "SELECT * FROM member WHERE memberid = '".$_SESSION['memberid']."' ";
	$query = mysqli_query($conn,$sqlcode);
	$result = mysqli_fetch_array($query,MYSQLI_ASSOC);
	
  ?>
  

   <h2>รายการหนังสือ</h2>
  <hr class="colorgraph">
 <?php
	        $query = "SELECT * FROM book ORDER BY BookID DESC";
            $result = mysqli_query( $conn, $query);
                ?>
				
     <table width="100%" class="table table-bordered">
        		  <tbody>
        		    <tr>
        		      <th bgcolor="#333333"><span style="color:#F90;"> รูป</span></th>
					   <th width="85%" bgcolor="#333333"><span style="color:#F90;"> รายละเอียด</span></th>
       		        </tr>
                <?php 
				while( $row = mysqli_fetch_array( $result, MYSQLI_ASSOC))		
					{

						echo '<tr>';
						echo '<td bgcolor="#CCCCCC">';						 
						echo '<img src="'.$row["img"].'" height="268" width="180">';
						echo '</td>';
						echo '<td bgcolor="#CCCCCC">';
						echo '<h3>';
						echo 'รหัสหนังสือ : ';
						echo  $row['BookID'];
						echo '<br>';
						echo 'ชื่อหนังสือ : ';
						echo  $row['BookName'];
						echo '<br>';
						echo 'ผู้เขียน : ';
						echo  $row['BookAuthor'];
						echo '<br>';
						echo 'เลขทะเบียน : ';
						echo  $row['Regno'];
						echo '<br>';
						echo 'ประเภทหนังสือ : ';
						echo  $row['Type'];
						echo '<br>';
						echo 'ระยะเวลายืม : ';
						echo  "7 วัน";
						echo '<br>';
						echo '<br>';
						echo '<br>';
						echo '<a class="btn btn-success" href="process.php?cmd=borrow&memberid='.$_SESSION['memberid'].'&idbook='.$row['BookID'].'&BookName='.$row['BookName'].'">ยืมหนังสือ - "'.$row["BookName"].'"</a>';
						echo '</td>';	
						echo '</h3>';
						echo '</tr>';			
                }

            ?>
      		 </tbody>
     </table>  


                 
      	




  
 
  
  
  
  
</div>


  
  
  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>