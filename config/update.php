<?php
if($_POST['client']){
    // Client Name
    $client = $_POST['client'];
    // Client ID
    $clientID = $_POST['client_id'];
    //New Client ID
    $newClientID = $_POST['new_client_id'];
    $clientCheck = "SELECT id FROM `clients` where id  = $newClientID";
    $check = mysqli_query($conn, $clientCheck);
    $updateClient = "UPDATE
            `clients`, `sections`
        SET
            `clients`.name={$client}, `clients`.id={$newClientID}, `sections`.client_id={$newClientID}
        WHERE
            `clients`.id={$clientID} AND `sections`.client_id={$clientID} OR `clients`.id={$clientID}
    ";
    if(mysqli_num_rows($check) === 0){
        updateData($conn, $updateClient);
    } else {
        global $output;
        $output['error'][] = 'No duplicate clients';
        $output_json = json_encode($output);
        print($output_json);
    }
    
}
if($_POST['section_name']){
    // Client ID
    $clientID = $_POST['client_id'];
    // Section Name
    $sectionName = $_POST['section_name'];
    // Section 'id'
    $sectionID = $_POST['section'];
    //New Section ID
    $newSectionID = $_POST['new_section_id'];
    $sectionCheck = "SELECT id FROM `sections` where id  = $newSectionID";
    $check = mysqli_query($conn, $sectionCheck);
    $updateSection = "UPDATE
            `sections`, `links`
        SET
            `sections`.name={$sectionName}, `sections`.id={$newSectionID}, `sections`.client_id={$clientID}, `links`.section_id={$newSectionID}
        WHERE
            `sections`.id={$sectionID} AND `links`.section_id={$sectionID} OR `sections`.id={$sectionID}
    ";
    if(mysqli_num_rows($check) === 0){
        updateData($conn, $updateSection);
    } else {
        global $output;
        $output['error'][] = 'No duplicate sections';
        $output_json = json_encode($output);
        print($output_json);
    }
}
if($_POST['link_name']){
    // Section 'id'
    $sectionID = $_POST['section'];
    // Link Name
    $linkName = $_POST['link_name'];
    // Link 'id'
    $linkID = $_POST['link'];
    //New Link ID
    $newLinkID = $_POST['new_link_id'];
    $linkCheck = "SELECT id FROM `links` where id  = $newLinkID";
    $check = mysqli_query($conn, $linkCheck);
    $updateLink = "UPDATE
            `links`
        SET
            `name`={$linkName}, `section_id`={$sectionID}
        WHERE
            `id`={$linkID}
    ";
    if(mysqli_num_rows($check) === 0){
        updateData($conn, $updateLink);
    } else {
        global $output;
        $output['error'][] = 'No duplicate links';
        $output_json = json_encode($output);
        print($output_json);
    }
}
?>