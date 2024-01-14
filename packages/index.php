<?php

require_once("../db.inc.php");

$conn = @new mysqli($host, $db_user, $db_password, $db_name);

$res = $conn->query("SELECT * FROM packages");

if ($res->num_rows > 0) {
    $packages = array();

    while ($row = mysqli_fetch_assoc($res)) {
        $package_name = $row['name'];
        $packages[$package_name] = array(
            'version' => $row['version'],
            'pkg_url' => $row['url'],
            'install_script' => $row['install'],
            'uninstall_script' => $row['uninstall']
        );
    }

    $json = array(
        'easy_version' => '1.01',
        'packages' => $packages
    );

    header('Content-Type: application/json');
    echo json_encode($json);
} else {
    $json = array(
        'error' => true,
        'message' => 'No packages were found'
    );
    header('Content-Type: application/json');
    echo json_encode($json);
}

?>
