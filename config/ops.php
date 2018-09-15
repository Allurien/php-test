<?php
require_once('db.php');
$conn = mysqli_connect($db_cred['host'], $db_cred['user'], $db_cred['password'], $db_cred['database']);
if(!$conn) {
    $output['error'] = 'error connect to DB: '. mysqli_error();
    print(json_encode($output));
}
// Data Assignment

// Client Name
$client = $_POST['client'];
// Client ID
$clientID = $_POST['client_id'];
// Section 'id'
$sectionID = $_POST['section'];
// Section Name
$sectionName = $_POST['section_name'];
// Link 'id'
$linkID = $_POST['link'];
// Link Name
$linkName = $_POST['link_name'];
//Task Type
$task = $_POST['task'];

// Add Content Queries
$addClient = "INSERT INTO
                clients ('id', 'name')
            VALUES
                ('$clientID', '$client')
            ";
$addSection = "INSERT INTO
                sections ('id', 'client_id' 'name')
            VALUES
                ('$sectionID', '$clientID' '$sectionName')
            ";
$addLink = "INSERT INTO
                links ('id', 'section_id', 'name')
            VALUES
            ('$linkID', '$sectionID' '$linkName')
            ";

// Update Content Queries
$updateClient = "UPDATE
                    clients
                SET
                    id='$clientID', name='$client'
                WHERE
                    id='$clientID'
                ";
$updateSection = "UPDATE
                    sections
                SET
                    id='$sectionID', name='$sectionName'
                WHERE
                    section_id='$clientID
                ";
$updateLink = "UPDATE
                    sections
                SET
                    id='$linkID', name='$linkName'
                WHERE
                    section_id='$sectionID
                ";

// Delete Content Queries
$deleteClient = "DELETE FROM
                    clients
                WHERE
                    id='$clientID'
                ";
$deleteSection = "DELETE FROM
                    section
                WHERE
                    id='$sectionID'
                ";
$deleteLink = "DELETE FROM
                    links
                WHERE
                    id='$linkID'
                ";

// Check Queries


function updateData($conn, $query) {
    $result = mysqli_query($conn, $query);
    global $output;
    if(empty($result)) {
        $output['error'][] = mysqli_error($conn);
    } else {
        $output['success'] = true;
    }
}
function retrieveData($conn, $query) {
    $result = mysqli_query($conn, $query);
    global $output;
    if(empty($result)) {
        $output['error'][] = mysqli_error($conn);
    } else {
        if(mysqli_num_rows($result) > 0) {
            $output['success'] = true;
            while($row = mysqli_fetch_assoc($result)) {
                $output['data'][] = $row;
            }
        } else {
            $output['error'][] = 'no result';
        }
    }
}

switch($task){
    case "add":
        if($client){
            updateData($conn, $addClient);
        }
        if($sectionName){
            updateData($conn, $addSection);
        }
        if($linkName){
            updateData($conn, $addLink);
        }
        break;
    case "update":
        if($client){
            updateData($conn, $updateClient);
        }
        if($sectionName){
            updateData($conn, $updateSection);
        }
        if($linkName){
            updateData($conn, $updateLink);
        }
        break;
    case "delete":
        if($client){
            updateData($conn, $deleteClient);
        }
        if($sectionName){
            updateData($conn, $deleteSection);
        }
        if($linkName){
            updateData($conn, $deleteLink);
        }
        break;
}




?>