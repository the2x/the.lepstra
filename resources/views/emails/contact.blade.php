<?php
    if (isset($contact)){
        echo 'Имя: ' . $contact['name'] . '<br />';
        echo 'Email: ' . $contact['email'] . '<br />';
        echo 'Описание: ' . $contact['description'] . '<br />';
    }
?>