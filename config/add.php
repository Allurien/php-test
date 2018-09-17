<?php
    if($_POST['client']){
        // Client Name
        $client = $_POST['client'];
        // Client ID
        $clientID = $_POST['client_id'];
        $clientCheck = "SELECT id FROM `clients` where id  = $clientID";
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
        }
    };
    if($_POST['section_name']){
        // Client ID
        $clientID = $_POST['client_id'];
        // Section Name
        $sectionName = $_POST['section_name'];
        // Section 'id'
        $sectionID = $_POST['section'];
        $sectionCheck = "SELECT id FROM `sections` where id  = $sectionID";
        $check = mysqli_query($conn, $sectionCheck);
        $addSection = "INSERT INTO
                `sections` (`id`, `client_id`, `name`)
            VALUES
                ({$sectionID}, {$clientID}, {$sectionName})
        ";
        if(mysqli_num_rows($check) === 0){
            updateData($conn, $addSection);
        } else {
            global $output;
            $output['error'][] = 'No duplicate sections';
            $output_json = json_encode($output);
            print($output_json);
        }
    };
    if($_POST['link_name']){
        // Section 'id'
        $sectionID = $_POST['section'];
        // Link Name
        $linkName = $_POST['link_name'];
        // Link 'id'
        $linkID = $_POST['link'];
        $linkCheck = "SELECT id FROM `links` where id  = $linkID";
        $check = mysqli_query($conn, $linkCheck);
        $addLink = "INSERT INTO
                `links` (`id`, `section_id`, `name`)
            VALUES
                ({$linkID}, {$sectionID}, {$linkName})
        ";
        if(mysqli_num_rows($check) === 0){
            updateData($conn, $addLink);
        } else {
            global $output;
            $output['error'][] = 'No duplicate links';
            $output_json = json_encode($output);
            print($output_json);
        }
    }
?>