<?php

require_once 'config/Database.php';

try {

    $db = Database::getInstance()->getConnection();

    echo "✅ PostgreSQL Connected Successfully!";

} catch (Exception $e) {

    echo $e->getMessage();

}