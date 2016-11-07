<?php
foreach ($data as $row) {
 $text = $row['text'];
    $name = $row['name'];
    $created_at = $row['created_at'];
    echo "<p>";
   // echo "<p>Сообщение создано ". $created_at  ."в теме от пользователя <strong>" . $ame . "</strong></a></p>";
    echo "<p>" . $text . "</p>";
    echo "</p>";
}

