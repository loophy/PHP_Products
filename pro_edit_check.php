<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>ろくまる農園</title>
</head>
<body>

	<?php

	$pro_code=$_POST['code'];
	$pro_name=$_POST['name'];
	$pro_price=$_POST['price'];

	$pro_code=htmlspecialchars($pro_code);
	$pro_name=htmlspecialchars($pro_name);
	$pro_price=htmlspecialchars($pro_price);

	if($pro_name=='')
	{
		print '商品名が入力されていません。<br />';
	}
	else
	{
		print '商品名：';
		print $pro_name;
		print '<br />';
	}

	// 半角チェック
	if (preg_match('/^[0-9]+$/', $pro_price)==0)
	{
		print '価格を性格に入力してください。<br />';
	}
	else
	{
		print '価格：';
		print $pro_price;
		print '円<br />';
	}

	if($pro_name=='' || preg_match('/^[0-9]+$/', $pro_price)==0)
	{
		print '<form>';
		print '<input type="button" onclick="history.back()" value="戻る">';
		print '</form>'; 
	}
	else
	{
		print '上記のように変更します。<br />';
		print '<form method="post" action="pro_edit_done.php">';
		print '<input type="hidden" name="code" value="'.$pro_code.'">';
		print '<input type="hidden" name="name" value="'.$pro_name.'">';
		print '<input type="hidden" name="price" value="'.$pro_price.'">';
		print '<br />';
		print '<input type="button" onclick="history.back()" value="戻る">';
		print '<input type="submit" value="OK">';
		print '</form>';
	}

	?>

</body>
</html>