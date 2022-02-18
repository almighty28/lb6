<?php
    $message_string = "Сообщения клиента: ";
    $cursor=$collection_client->find(['login'=>$selected]);
    foreach($cursor as $document){
        foreach($document['messages'] as $message)
        {
            $message_string .= $message;
            $message_string .= "   ";
        }
    }
    echo "$message_string";
?>