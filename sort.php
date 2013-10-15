<meta charset="utf-8">

<?php

	$host = ''; // Hostname
	$dbname = ''; // Database name
	$user = ''; // MySQL username
	$password = ''; // MySQL password
	$charset = 'utf8'; // Database charset
	$table = ''; // Table with data

	// Connect to mysql and set charset
	$pdo = new pdo("mysql:host={$host};dbname={$dbname}", $user, $password);
	$pdo->query("set names {$charset}");
	
	// Get all posts sorted by alphabet
	$rows = $pdo->query("select * from `{$table}` order by `title`")->fetchAll(PDO::FETCH_ASSOC);
	
	// Array with first characters of the string
	$chars = array();

	foreach($rows as $row) {
		
		// Get the first character and play with ASCII and UTF-8 encoding (for Russian and English)
		$alph = mb_substr($row['title'], 0, 1, mb_detect_encoding(mb_substr($row['title'], 0, 1)));
		
		// If array don't have character - add it!
		if(!in_array($alph, $chars)) {
		
			$chars[] = $alph;
		
		}
		
	}
	
?>
<!-- Add some html -->
<select style="width: 200px">
	<option selected disabled>Выберите пост...</option> 
	<?php
	
	// Foreach all characters for get 'search' rows and display optiongroups
	foreach($chars as $ch) {
		
		// Get all rows with $ch first character
		$rows = $pdo->query("select * from {$table} where substring(`title`, 1, 1) = '{$ch}'")->fetchAll(PDO::FETCH_ASSOC);
		
		// Display option group (category)
		echo '<optgroup label="'.$ch.'">';
		
			// If `rows` array have rows - foreach and display it with option tag
			if(!empty($rows)) {
				foreach($rows as $row) {
					echo '<option>' . $row['title'] . '</option>';
				}
			}

		echo '</optgroup>';
		
	}

	?>
</select>
