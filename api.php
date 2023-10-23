<?php
require "settings/init.php";

$data = json_decode(file_get_contents('php://input'), true);



/*
 * password: skal udfyldes og være 123
 * nameSearch: valgfri
 */

/*
 * $header = "HTTP/1.1 400 Bad Request"; // Sending malformed data results in a 400 Bad Request response.
 * $header = "HTTP/1.1 401 Unauthorized"; // Trying to access to the API without authentication results in a 401 response.
 * $header = "HTTP/1.1 404 Not Found"; // Not Found.
 * $header = "HTTP/1.1 405 Method Not Allowed"; // Trying to use a method on a route for which it is not implemented results in a 405
 * $header = "HTTP/1.1 422 Unprocessable Entity"; // Sending invalid data results in a 422
 *
 * $header = "HTTP/1.1 200 OK"; // Getting a resource or a collection resources results in a 200
 * $header = "HTTP/1.1 201 Created"; // Created a resource results in a 201
 * $header = "HTTP/1.1 204 No Content"; // Updating or deleting a resource results in a 204
 */

header('content-type: application/json; charset=utf-8');

if(isset($data["password"]) && $data["password"] == "123"){
    $sql = "SELECT * FROM musik WHERE 1=1";
    $bind = [];

    if (!empty($data["nameSearch"])){
        $sql .= " AND musSangTitel = :musSangTitel ";
        $bind[":musSangTitel"] = $data["nameSearch"];
    }

    $musik = $db->sql($sql, $bind);
    header("HTTP/1.1 200 OK");

    echo json_encode($musik);

} else {
    header("HTTP/1.1 401 Unauthorized");
    $error["errorMessage"] = "Dit kodeord var forkert";
    echo json_encode($error);
}
?>


<?php
require "settings/init.php";

$data = json_decode(file_get_contents('php://input'), true);

if(isset($data["password"]) && $data["password"] == "123"){
    $sql = "SELECT * FROM musik WHERE 1=1";
    $bind = [];

    if (!empty($data["nameSearch"])){
        $sql .= " AND musSangTitel = :musSangTitel ";
        $bind[":musSangTitel"] = $data["nameSearch"];
    }

    $sql .= " ORDER BY musID";

    $musik = $db->sql($sql, $bind);
    header("HTTP/1.1 200 OK");

    echo json_encode($musik);

} else {
    header("HTTP/1.1 401 Unauthorized");
    $error["errorMessage"] = "Incorrect password";
    echo json_encode($error);
    exit;
}


