<?php
    if($_POST['client']){
        // Client Name
        $client = $_POST['client'];
        // Client ID
        $clientID = $_POST['client_id'];
        //New Client ID
        $newClientID = $_POST['new_client_id'];
        $clientCheck = "SELECT
                id
            FROM
                `clients`
            WHERE
                id  = $newClientID
        ";
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
        };
    };
    if($_POST['section_name']){
        // Client ID
        $clientID = $_POST['client_id'];
        // Section Name
        $sectionName = $_POST['section_name'];
        // Section ID
        $sectionID = $_POST['section'];
        //New Section ID
        $newSectionID = $_POST['new_section_id'];
        $sectionCheck = "SELECT
                id
            FROM
                `sections`
            WHERE
                id = $newSectionID
        ";
        $clientCheck = "SELECT
                id
            FROM
                `clients`
            WHERE id = $clientID
        ";
        $checkExistingClient = mysqli_query($conn, $clientCheck);
        $checkExistingSection = mysqli_query($conn, $sectionCheck);
        $updateSection = "UPDATE
                `sections`, `links`
            SET
                `sections`.name={$sectionName}, `sections`.id={$newSectionID}, `sections`.client_id={$clientID}, `links`.section_id={$newSectionID}
            WHERE
                `sections`.id={$sectionID} AND `links`.section_id={$sectionID} OR `sections`.id={$sectionID}
        ";
        if(mysqli_num_rows($checkExistingClient) !== 0){
            if(mysqli_num_rows($checkExistingSection) === 0){
                updateData($conn, $updateSection);
            } else {
                global $output;
                $output['error'][] = 'No duplicate sections';
                $output_json = json_encode($output);
                print($output_json);
            };
        } else {
            global $output;
            $output['error'][] = 'Client does not exist';
            $output_json = json_encode($output);
            print($output_json);
        };
    };
    if($_POST['link_name']){
        // Section ID
        $sectionID = $_POST['section'];
        // Link Name
        $linkName = $_POST['link_name'];
        // Link ID
        $linkID = $_POST['link'];
        //New Link ID
        $newLinkID = $_POST['new_link_id'];
        $sectionCheck = "SELECT
                id
            FROM
                `sections`
            WHERE
                id = $sectionID
        ";
        $linkCheck = "SELECT
                id
            FROM
                `links`
            WHERE
                id = $newLinkID
        ";
        $checkExistingSection = mysqli_query($conn, $sectionCheck);
        $checkExistingLink = mysqli_query($conn, $linkCheck);
        $updateLink = "UPDATE
                `links`
            SET
                `name`={$linkName}, `section_id`={$sectionID}, `id`={$newLinkID}
            WHERE
                `id`={$linkID}
        ";
        if(mysqli_num_rows($checkExistingSection) !== 0){
            if(mysqli_num_rows($checkExistingLink) === 0){
                updateData($conn, $updateLink);
            } else {
                global $output;
                $output['error'][] = 'No duplicate links';
                $output_json = json_encode($output);
                print($output_json);
            };
        } else {
            global $output;
            $output['error'][] = 'Section does not exist';
            $output_json = json_encode($output);
            print($output_json);
        };
    };
?>