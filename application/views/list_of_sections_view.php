<?php
	foreach ($data as $row) {
		echo "<p>
		<a href='/sections/topics/" . $row['id'] . "'>" . $row['name'] . '</a>
		</p>';
	}
