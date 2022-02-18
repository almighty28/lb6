<?php
    $cursor=$collection_client->find(['balance'=>['$lt' => 0]]);
    echo "<table border = 1> <tr> <th>Login</th> <th>IP</th> <th>Баланс</th> </tr>";
    foreach ($cursor as $document) {
        echo "<tr> <th>$document[login]</th> <th>$document[IP]</th> <th>$document[balance]</th></tr>";
    }
    echo "</table>";

?>