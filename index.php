<?php
$dbName="generalklinton";
$dbHost="localhost";
$dbUser="root";
$dbPass="";
$conn=mysqli_connect($dbHost,$dbUser,$dbPass,$dbName);
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
body{margin:0;background-color:skyblue;}
h1{margin:0;width:fit-content;}
.titleContainer{display:flex;justify-content:center;background-color:lightgreen;padding-top:10px;padding-bottom:10px;padding-right:5px;padding-left:5px;}
h1{background-color:white;padding:3px;border-radius:10px;border:3px solid skyblue;}
.formContainer{padding-left:10px;padding-right:10px;justify-content:center;display:flex;align-items:center;height:80vh;}
#username{margin-bottom:20px;}
reder{color:red;}
form{background-color:darkblue;padding:10px;border-radius:5px;border:3px solid pink;}
greener{color:lightgreen;}
</style>
</head>
<body>
<div class="titleContainer">
<h1>Fa-ti Prezenta la Analiza!</h1>
</div>
<div class="formContainer">
<form action="" method="post">
<input type="text" id="username" name="username" placeholder="Scrie numele tau"/>
<br>
<input type="submit" id="submit" name="submit" value="Prezent"/>
<?php
function onlySpace($s){
	for($i=0;$i<strlen($s);$i++){
		$c=$s[$i];
		if($c!=" "){return 0;}
	}
return 1;
}
?>
<?php
if(isset($_POST["submit"])){
	$username=$_POST["username"];
	if(onlySpace($username)==0){echo "<br><greener>$username este baiat bun</greener>";
$query="insert into prezenti(numeStudent,Prezent) values(?,?);";
$configured=mysqli_prepare($conn,$query);
$pre=true;
mysqli_stmt_bind_param($configured,"ss",$username,$pre);
mysqli_stmt_execute($configured);
}
	else{echo "<br><reder>Serios???</reder>";}
}
?>
</form>
</div>
</body>
</html>