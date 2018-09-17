<?php
if($_POST['client']){
    // Client Name
    $client = $_POST['client'];
    // Client ID
    $clientID = $_POST['client_id'];
    $updateClient = "UPDATE
            `clients`
        SET
            `name`={$client}
        WHERE
            `id`={$clientID}
    ";
    updateData($conn, $updateClient);
}
if($_POST['section']){
    // Client ID
    $clientID = $_POST['client_id'];
    // Section 'id'
    $sectionID = $_POST['section'];
    // Section Name
    $sectionName = $_POST['name'];
    $updateSection = "UPDATE
            `sections`
        SET
            `name`={$sectionName}
        WHERE
            `id`={$sectionID}
    ";
    updateData($conn, $updateSection);
    }
if($_POST['link']){
    // Section 'id'
    $sectionID = $_POST['section'];
    // Link 'id'
    $linkID = $_POST['link'];
    // Link Name
    $linkName = $_POST['name'];
    $updateLink = "UPDATE
            `links`
        SET
            `name`={$linkName}
        WHERE
            `id`={$linkID}
    ";
    updateData($conn, $updateLink);
}
?>