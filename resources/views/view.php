<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
	foreach ($comments as $key) {
		print_r($key->blog->title).'<br>';
	
	}
	?>
	<div>
		<h2 >Comments</h2>

	</div>
	<?php 
	foreach ($blogs as $key) {
		foreach ($key->comment as $key2) {?>
			<p> {{$key2->text?>}}
<?php
		}
	}
		

?>
</body>
</html>