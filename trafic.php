<?php
    $cursor=$collection_seanse->find();
    $in = 0;
    $out = 0;
    echo "<table border = 1> <tr> <th>Входящий трафик</th> <th>Исходящий трафик</th></tr>";
    foreach($cursor as $document){
        $in+=$document['in'];
        $out+=$document['out'];
    }
    echo "<tr> <th>$in</th> <th>$out</th></tr>";
    echo "</table>";

?>