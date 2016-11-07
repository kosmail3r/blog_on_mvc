<?php
	foreach ($data as $row) {
		echo "<p>
		<a href='/topics/" . $row['id'] . "'>" . $row['name'] . '</a>
		</p>';
	}