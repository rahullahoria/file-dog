<?php
/**
 * Created by PhpStorm.
 * User: spider-ninja
 * Date: 6/22/16
 * Time: 3:06 PM
 */


function getFile($username, $fileId){

    $sql = "SELECT * FROM files WHERE id=:id and username =:username ";

    try {
        $db = getDB();
        $stmt = $db->prepare($sql);

        $stmt->bindParam("id", $fileId);
        $stmt->bindParam("username", $username);

        $stmt->execute();
        $file = $stmt->fetchAll(PDO::FETCH_OBJ);



        $db = null;

        if (file_exists($file[0]->location)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="'.basename($file[0]->location).'"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($file[0]->location));
            readfile($file[0]->location);
            exit;
        }


    } catch (PDOException $e) {
        //error_log($e->getMessage(), 3, '/var/tmp/php.log');
        echo '{"error":{"text":' . $e->getMessage() . '}}';
    }
}