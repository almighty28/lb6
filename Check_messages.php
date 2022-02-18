<?php
    //echo "<script>localStorage.clear();</script>";
    //$i=0;
    $cursor=$collection_client->find(['login'=>$selected]);
    echo "<table border = 1> <tr> <th>Сообщения</th></tr>";
    foreach($cursor as $document){
        foreach($document['messages'] as $message){
        echo "<tr> <th>$message</th></tr>";
        //echo "<script>localStorage.setItem('$i','$message');</script>";
        //$i++;
        }
    }
    echo "</table>";

?>