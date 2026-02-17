<?php
function db_connection()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "e_commerce";

    $mysql_conn = new mysqli($servername, $username, $password, $database);
    if ($mysql_conn->connect_error) {
        die("Connection failed: " . $mysql_conn->connect_error);
    }
    return $mysql_conn;
}
function admin_url()
{
    return realpath(dirname(__FILE__) . '/../');
}
function siderbar()
{
    $admin_url = admin_url();
    include($admin_url . '/layouts/siderbar.php');
}
function headerbar()
{
    $admin_url = admin_url();
    include($admin_url . '/layouts/header.php');
}
function footer()
{
    $admin_url = admin_url();
    include($admin_url . '/layouts/footer.php');
}
