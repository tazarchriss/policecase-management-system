<?php
require_once '../../path.php';
require_once ROOT_PATH . '/connect.php';
?>
<?php

$sql = "SELECT * FROM evidence";
$result = mysqli_query($conn, $sql);

$files = mysqli_fetch_all($result, MYSQLI_ASSOC);


// Downloads files
if (isset($_GET['file_id'])) {
    $id = $_GET['file_id'];

    // fetch file to download from database
    $sql = "SELECT * FROM evidence WHERE evidenceId=$id";
    $result = mysqli_query($conn, $sql);

    $file = mysqli_fetch_assoc($result);
    $filepath = 'uploads/' . $file['attachment_name'];

    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('uploads/' . $file['attachment_name']));
        readfile('uploads/' . $file['attachment_name']);

        // Now update downloads count
        $newCount = $file['downloads'] + 1;
        $updateQuery = "UPDATE evidence SET downloads=$newCount WHERE `evidence`.`evidenceId`='$id'";
        mysqli_query($conn, $updateQuery);
        exit;

    }

}

?>
