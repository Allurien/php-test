<?php
    if($_POST['client']){
        // Client Name
        $client = $_POST['client'];
        // Client ID
        $clientID = $_POST['client_id'];
        $deleteClient = "DELETE FROM
                `clients`
            WHERE
                `id`={$clientID}
        ";
        updateData($conn, $deleteClient);
    }
    if($_POST['section']){
        // Client ID
        $clientID = $_POST['client_id'];
        // Section 'id'
        $sectionID = $_POST['section'];
        $deleteSection = "DELETE FROM
                `sections`
            WHERE
                `id`={$sectionID}
        ";
        updateData($conn, $deleteSection);
        }
    if($_POST['link']){
        // Section 'id'
        $sectionID = $_POST['section'];
        // Link 'id'
        $linkID = $_POST['link'];
        $deleteLink = "DELETE FROM
                `links`
            WHERE
                `id`={$linkID}
        ";
        updateData($conn, $deleteLink);
    }
?>