<?php
declare(strict_types=1);

spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});

$connection = new DataBaseConnection();

$connection->connect();

$command = '';

while ($command != '3') {
    echo ("[1] => run caseOne" . PHP_EOL . "[2] => run caseTwo" . PHP_EOL ."[3] => Exit" . PHP_EOL);
    $command = readline();
    print_r("Current state of table: \n");
    print_r($connection->db->query("SELECT * FROM test ORDER BY sort")->fetch_all());
    switch ($command) {
        case '1' :
            $moving_elem_id = readline('Input the id of element witch you want to move:');
            $id_element_in_front = readline('Enter the element id that must come before the element you want to move:');
            CaseOne::RunCaseOne($connection, (int) $moving_elem_id, (int) $id_element_in_front);
            echo 'Result:' . PHP_EOL;
            print_r($connection->db->query("SELECT * FROM test ORDER BY sort")->fetch_all());
            break;
        case '2' :
            CaseTwo::RunCaseTwo($connection);
            echo 'Result:' . PHP_EOL;
            print_r($connection->db->query("SELECT * FROM test ORDER BY id")->fetch_all());
            break;
    }
}

$connection->disconnect();
