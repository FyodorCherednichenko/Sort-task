<?php
declare(strict_types=1);

abstract class CaseTwo extends CaseOne
{
    public static function RunCaseTwo(DataBaseConnection $db): void
    {
        $line = $db->db->query("SELECT * FROM test ORDER BY id")->fetch_all();
        print_r($line);
        $sort_value = 1;

        foreach ($line as $key => $elem) {
            $line[$key][1] = $sort_value;
            $sort_value++;
        }

        self::update($db, $line);
    }

}