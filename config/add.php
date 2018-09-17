<?php
    if($_POST['client']){
        // Client Name
        $client = $_POST['client'];
        // Client ID
        $clientID = $_POST['client_id'];
        $clientCheck = "SELECT
                id
            FROM
                `clients`
            WHERE
                id  = $clientID
        ";
        $check = mysqli_query($conn, $clientCheck);
        $addClient = "INSERT INTO
                `clients` (`id`, `name`)
            VALUES
                ({$clientID}, {$client})
        ";
        if(mysqli_num_rows($check) === 0){
            updateData($conn, $addClient);
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
        $sectionCheck = "SELECT
                id
            FROM
                `sections`
            WHERE
                id = $sectionID
        ";
        $clientCheck = "SELECT
                id
            FROM
                `clients`
            WHERE
                id = $clientID
        ";
        $checkExistingClient = mysqli_query($conn, $clientCheck);
        $checkExistingSection = mysqli_query($conn, $sectionCheck);
        $addSection = "INSERT INTO
                `sections` (`id`, `client_id`, `name`)
            VALUES
                ({$sectionID}, {$clientID}, {$sectionName})
        ";
        if(mysqli_num_rows($checkExistingClient) !== 0){
            if(mysqli_num_rows($checkExistingSection) === 0){
                updateData($conn, $addSection);
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
                id = $linkID
        ";
        $checkExistingSection = mysqli_query($conn, $sectionCheck);
        $checkExistingLink = mysqli_query($conn, $linkCheck);
        $addLink = "INSERT INTO
                `links` (`id`, `section_id`, `name`)
            VALUES
                ({$linkID}, {$sectionID}, {$linkName})
        ";
        if(mysqli_num_rows($checkExistingSection) !== 0){
            if(mysqli_num_rows($checkExistingLink) === 0){
                updateData($conn, $addLink);
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