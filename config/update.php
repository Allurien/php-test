<?php
if($_POST['client']){
    // Client Name
    $client = $_POST['client'];
    // Client ID
    $clientID = $_POST['client_id'];
    //New Client ID
    $newClientID = $_POST['new_client_id'];
    $updateClient = "UPDATE
            `clients`, `sections`
        SET
            `clients`.name={$client}, `clients`.id={$newClientID}, `sections`.client_id={$newClientID}
        WHERE
            `clients`.id={$clientID} AND `sections`.client_id={$clientID}
    ";
    updateData($conn, $updateClient);
}
if($_POST['section']){
    // Client ID
    $clientID = $_POST['client_id'];
    // Section 'id'
    $sectionID = $_POST['section'];
    // Section Name
    $sectionName = $_POST['section_name'];
    //New Section ID
    $newSectionID = $_POST['new_section_id'];
    $updateSection = "UPDATE
            `sections`, `links`
        SET
            `sections`.name={$sectionName}, `sections`.id={$newSectionID}, `sections`.client_id={$clientID}, `links`.section_id={$newSectionID}
        WHERE
            `sections`.id={$sectionID} and `links`.section_id={$sectionID}
    ";
    updateData($conn, $updateSection);
    }
if($_POST['link']){
    // Section 'id'
    $sectionID = $_POST['section'];
    // Link 'id'
    $linkID = $_POST['link'];
    // Link Name
    $linkName = $_POST['link_name'];
    $updateLink = "UPDATE
            `links`
        SET
            `name`={$linkName}, `section_id`={$sectionID}
        WHERE
            `id`={$linkID}
    ";
    updateData($conn, $updateLink);
}
?>