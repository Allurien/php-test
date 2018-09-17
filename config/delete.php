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
    }
    if($_POST['section']){
        // Client ID
        $clientID = $_POST['client_id'];
        // Section 'id'
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