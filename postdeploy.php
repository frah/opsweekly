<?php
    $url = parse_url(getenv("CLEARDB_DATABASE_URL"));

    $server = $url["host"];
    $username = $url["user"];
    $password = $url["pass"];
    $db = substr($url["path"], 1);

    $link = mysqli_connect($server, $username, $password, $db);
    mysqli_query("create database opsweekly;");
    $command = "mysql -u{$username} -p{$password} -h {$server} -D {$db} < opsweekly.sql";
    $ret = shell_exec($command);
    print($ret)
?>

