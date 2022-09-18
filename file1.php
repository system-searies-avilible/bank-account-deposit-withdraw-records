<html>
<head>
<title>Bank account</title>
</head>

<body>
<form method="post">
<table border="2">
<tr>
<th>Name</th>
<td><input type="text" name="txtname"></td>
</tr>

<tr>
<th>Ammount</th>
<td><input type="text" name="txtamount"></td>
</tr>



<tr>
<th> : </th>
<td><input type="submit" name="btn_next" value="Next"></td>
</tr>
</table>
</form>
</body>
</html>
<?php
$connect=mysqli_connect("localhost","root","","bank");

if(isset($_POST['btn_next'])){
$name=$_POST['txtname'];	
$amount=$_POST['txtamount'];	
$id=rand(10000,99999);
$insert=mysqli_query($connect,"insert into accounts values('$id','$name','$amount');");
if($insert){

echo"<script>alert('data inserted');</script>";

}
else{
echo"<script>alert('data can't be insert');</script>";	
}

}

if(isset($_POST['btn_sub'])){
	$account=$_POST['txtacc'];
	$ammount2=$_POST['txtamm'];
	$account_type=$_POST['txtaccount_type'];
$select_account=mysqli_query($connect,"select * from accounts where id='$account'");
$num=mysqli_num_rows($select_account);
$row=mysqli_fetch_array($select_account);
$ant=$row[2];
	if($account_type==1){
		//payment Add
$deposit=mysqli_query($connect,"update accounts set amount='$ant+$ammount2' where id='$account'");		

	
//payment withdraw
$insert3=mysqli_query($connect,"insert into transiction2 values('','$account','$ammount2','0');");
echo"<script>alert('ammount deposited sucessfully')</script>";			
	}
elseif($account_type==0){
	if($ammount2<$ant){
mysqli_query($connect,"update accounts set amount=$ant-$ammount2 where id='$account'");


$insert4=mysqli_query($connect,"insert into  transiction2 values('','$account','0','$ammount2')");
echo"<script> alert('ammount has been withdraw');</script>";		
		
	}
else{
echo"<h5>".'you have only '.$row[2].'in your account'."</h5>";
echo"out of limit";
}	
}
}

?>
<form method="post">
<table border="2">
<tr>
<th>Account</th>
<td><input type="text" name="txtacc"></td>
</tr>

<tr>
<th>Amount</th>
<td><input type="text" name="txtamm"></td>
</tr>

<tr>
<th>Account-type</th>
<td><select name="txtaccount_type">
<option value='1'>Add</option>
<option value='0'>Withdraw</option>
</select></td>
</tr>


<tr>
<th>:</th>
<td><input type="submit" name="btn_sub"></td>
</tr>
</table>
</form>
<br><br>

<form method="post">
<h1>Genrate Statment</h1>
<table border="2">
<tr>
<th>Account Number</th>
<td><input type="text" name="txtacco_num"/></td>
</tr>

<tr>

<td><input type="submit" name="btn_state" value="Genrate statement"/></td>
</tr>
</table>

<br><br>


<table border="2">
<tr>
<th>Sno.</th>
<th>Account No:</th>
<th>Dabit</th>
<th>Credit</th>
</tr>
<?php
//to show the record of dabit and credit:

if(isset($_POST['btn_state'])){
$acc1=$_POST['txtacco_num'];
$add=0;
$sub=0;
$net=0;
$select=mysqli_query($connect,"select * from transiction2 where account_no='$acc1'");
$num=mysqli_num_rows($select);
for($i=0; $i<$num; $i++){
$row=mysqli_fetch_array($select);
echo"<tr>";
echo"<td>".($i+1)."</td>";
echo"<td>".$row[1]."</td>";
echo"<td>".$row[3]."</td>";
echo"<td>".$row[2]."</td>";
echo"</tr>";
$sub=$sub+$row[3];
$add=$add+$row[2];
}
echo"<tr>";
echo"<th colspan='2'>Total</th>";
echo"<th>".$sub."</th>";
echo"<th>".$add."</th>";
echo"</tr>";

echo"<tr>";
echo"<th colspan='2'>Net Balance</th>";
echo"<th colspan='2'>".$add-$sub."</th>";
echo"</tr>";	
}
?>

</table>
</form>