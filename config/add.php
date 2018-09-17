<?php
    if($_POST['client']){
        // Client Name
        $client = $_POST['client'];
        // Client ID
        $clientID = $_POST['client_id'];
        $addClient = "INSERT INTO
                `clients` (`id`, `name`)
            VALUES
                ({$clientID}, {$client})
        ";
        updateData($conn, $addClient);
    }
    if($_POST['section']){
        // Client ID
        $clientID = $_POST['client_id'];
        // Section 'id'
        $sectionID = $_POST['section'];
        // Section Name
        $sectionName = $_POST['section_name'];
        $addSection = "INSERT INTO
                `sections` (`id`, `client_id`, `name`)
            VALUES
                ({$sectionID}, {$clientID}, {$sectionName})
        ";
        updateData($conn, $addSection);
        }
    if($_POST['link']){
        // Section 'id'
        $sectionID = $_POST['section'];
        // Link 'id'
        $linkID = $_POST['link'];
        // Link Name
        $linkName = $_POST['link_name'];
        $addLink = "INSERT INTO
                `links` (`id`, `section_id`, `name`)
            VALUES
                ({$linkID}, {$sectionID}, {$linkName})
        ";
        updateData($conn, $addLink);
    }
?>