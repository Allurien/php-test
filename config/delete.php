<?php
    if($_POST['client']){
        // Client Name
        $client = $_POST['client'];
        // Client ID
        $clientID = $_POST['client_id'];
        $deleteClient = "DELETE FROM
                `clients`
            WHERE
                id={$clientID}
        ";
        updateData($conn, $deleteClient);
    };
    if($_POST['section_name']){
        // Client ID
        $clientID = $_POST['client_id'];
        // Section Name
        $sectionName = $_POST['section_name'];
        // Section ID
        $sectionID = $_POST['section'];
        $deleteSection = "DELETE FROM
                `sections`
            WHERE
                id={$sectionID}
        ";
        updateData($conn, $deleteSection);
    };
    if($_POST['link_name']){
        // Section ID
        $sectionID = $_POST['section'];
        // Link Name
        $linkName = $_POST['link_name'];
        // Link ID
        $linkID = $_POST['link'];
        $deleteLink = "DELETE FROM
                `links`
            WHERE
                `id`={$linkID}
        ";
        updateData($conn, $deleteLink);
    };
?>