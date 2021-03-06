<?php
	function print_title() {
		if(isset($_GET['id'])) {
			echo $_GET['id'];
		} else {
			echo "Welcome!";
		}
	}

	function print_description() {
		if(isset($_GET['id'])) {
			echo file_get_contents("data/".$_GET['id']);
		} else {
			echo "Hello, PHP";
		}
	}

	function print_list() {
		// data directory 안의 파일 읽어오는 방법  : scandir()
		$list = scandir('./data');
		// var_dump($list); //형식 알아보기

		$i = 0;
		while($i < count($list)) {
			if($list[$i] != '.') {
				if($list[$i] != '..') {
					echo "<li><a href=\"index.php?id=$list[$i]\">$list[$i]</a></li>\n";
				}
			}
			$i = $i + 1;
		}

		/*
		echo "<li>$list[0]</li>\n";
		echo "<li>$list[1]</li>\n";
		echo "<li>$list[2]</li>\n";
		echo "<li>$list[3]</li>\n";
		echo "<li>$list[4]</li>\n";
		echo "<li>$list[5]</li>\n";
		*/
	}
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>
		<?php
		print_title();
		?>
	</title>
</head>
<body>
	<h1><a href="index.php">WEB</a></h1>
	<ol>
		<?php
			print_list();
		?>
	</ol>
	<a href="create.php">create</a>
	<form action="create_process.php" method="post">
		<p>
			<input type="text" name="title" placeholder="Title">
		</p>
		<p>
			<textarea name="description" placeholder="Description"></textarea>
		</p>
		<p>
			<input type="submit">
		</p>
	</form>
</body>
</html>
