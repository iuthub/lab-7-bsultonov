<?php
error_reporting(0);

$name=$_REQUEST["name"];
$email=$_REQUEST["email"];
$zip=$_REQUEST["zip"];

$isPost= $_SERVER["REQUEST_METHOD"]=="POST";
$isGet = $_SERVER["REQUEST_METHOD"]=="GET";

$isNameError = $isPost && !preg_match('/^[A-Za-z]{2}$/', $name);;
$isEmailError = $isPost && !preg_match('/^[a-z]{2}$/i', $email);
$isZipError = $isPost && !preg_match('/^\d{5}$/i', $zip);

$isFormError = $isNameError || $isEmailError || $isZipError;
//echo $city." ".$state." ".$zip;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Validating Forms</title>
		<link href="style.css" type="text/css" rel="stylesheet" />
	</head>
	
	<body>
		<?php if($isGet || $isFormError) { ?>

      <h1>Validation Form</h1>
      <form action="index.php" method="post">
          <dl>
              <dt>Name <span class="error"><?= $isNameError?"Your name can not be less than 2 chars ":"" ?></span> </dt>
              <dd> <input type="text" name="name" value="<?= $name ?>"></dd>

              <dt>Email <span class="error"><?= $isEmailError?"Please, enter valid email":"" ?></span> </dt>
              <dd> <input type="text" name="email" value="<?= $email ?>"></dd>

              <dt>Zip Code <span class="error"><?= $isZipError?"Please, enter zip code with 5 chars":"" ?></span> </dt>
              <dd> <input type="text" name="zip" value="<?= $zip ?>"></dd>
          </dl>
			<input type="radio" checked="false">
			
          <input type="submit" value="Submit">
      </form>
    <?php } else { ?>
          <h1>Thank you for your submission. Your name is <?=  $name ?>!</h1>
    <?php } ?>
		
	</body>
</html>