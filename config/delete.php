<?php
    if($_POST['client']){
        // Client Name
        $client = $_POST['client'];
        // Client ID
        $clientID = $_POST['client_id'];
        $deleteClient = "DELETE
                `clients`, `sections`, `links`
            FROM
                `clients`
            INNER JOIN `sections`
                ON `sections`.client_id = `clients`.id
            INNER JOIN `links`
                ON `links`.section_id = `sections`.id
            WHERE
                `clients`.id={$clientID}
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
        $deleteSection = "DELETE
                `sections`, `links`
            FROM
                `sections`
            INNER JOIN `links`
                ON `links`.section_id = `sections`.id
            WHERE
                `sections`.id={$sectionID}
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