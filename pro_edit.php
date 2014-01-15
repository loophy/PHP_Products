<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>ろくまる農園</title>
</head>
<body>
	<?php

	try
	{
		$pro_code=$_GET['procode'];

		$dsn='mysql:dbname=shop;host=localhost';
		$user='root';
		$password='';
		$dbh=new PDO($dsn, $user, $password);
		$dbh->query('SET NAMES utf8');

		$sql='SELECT name,price FROM mst_product WHERE code=?';
		$stmt=$dbh->prepare($sql);
		$data[]=$pro_code;
		$stmt->execute($data);

		$rec=$stmt->fetch(PDO::FETCH_ASSOC);
		$pro_name=$rec['name'];
		$pro_price=rec['price'];

		$dbh=null;
	}
	catch (Exception $e)
	{
		print 'ただいま障害により大変おg名枠をお掛けしております。';
		exit();
	}

	?>
	商品修正<br />
	<br />
	商品コード<br />
	
	<?php
		print $pro_code;
	?>
	<br />
	<br />
	<form method="post" action="pro_edit_check.php">
		<input type="hidden" name="code" value="<?php print $pro_code; ?>">
		商品名<br />
		<input type="text" name="name" style="width:200px" value="<?php print $pro_name; ?>"><br />

		価格<br />
		<input type="text" name="price" style="width:50px" value="<?php $pro_price; ?>">円<br />
		<br />
		<input type="button" onclick="history.back()" value="戻る">
		<input type="submit" value="OK">
	</form>

</body>
</html>