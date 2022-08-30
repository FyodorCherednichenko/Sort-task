<?php
declare(strict_types=1);

abstract class CaseOne
{
    public static function RunCaseOne(DataBaseConnection $db, int $moving_element_id, int $id_element_in_front): void
    {
        $line = $db->db->query("SELECT * FROM test")->fetch_all();

        $moving_element = self::getElement($db, $moving_element_id);

        $new_line = self::makeNewLine($line, $moving_element_id);

        if ($id_element_in_front === 0) {
            $steps = $id_element_in_front - $moving_element[1];

            $new_line = self::sortArrayByPositionOrId(self::sortElementsForStartOfLine($moving_element, $steps, $new_line), 1);
        } else {
            $element_in_front = self::getElement($db, $id_element_in_front);

            $steps = $element_in_front[1] - $moving_element[1];

            $new_line = self::sortArrayByPositionOrId(self::sortElements($moving_element, $steps, $new_line), 1);
        }

        self::update($db, $new_line);

        print_r($new_line);

    }

    public static function sortArrayByPositionOrId(array $array, int $key): array
    {
        usort($array, function ($a, $b) use ($key) {
            return $a[$key] - $b[$key];
        });

        return $array;
    }

    private static function getElement(DataBaseConnection $db, int $id): mixed
    {
        $element = $db->db->query("SELECT * FROM test where id = {$id}")->fetch_all();

        return array_pop($element);
    }

    public static function update(DataBaseConnection $db, array $data): void
    {
        $sql = "UPDATE test set sort = case id ";
        foreach ($data as $elem) {
            $sql .= "when {$elem[0]} then {$elem[1]} ";
        }
        $sql .= "end;";

        $db->db->query($sql);
    }

    private static function sortElements(array $moving_element, int $steps, array $new_line): array
    {
        if ($steps > 0) {
            $moving_element[1] += $steps;
            for ($i = 0; $i < $steps; $i++) {
                $new_line[$i][1] -= 1;
            }
        }

        if ($steps < 0) {
            $steps = abs($steps) - 1;
            $moving_element[1] -= $steps;

            for ($i = $steps; $i > 0; $i--)
            {
                $new_line[$i][1] += 1;
            }
        }

        $new_line[] = $moving_element;

        return $new_line;
    }

    private static function sortElementsForStartOfLine(array $moving_element, int $steps, array $new_line): array
    {
        $steps = abs($steps) - 1;
        $moving_element[1] -= $steps;
        for ($i = $steps-1; $i >= 0; $i--)
        {
            if ((int) $new_line[$i][1] !== count($new_line)+1) {
                $new_line[$i][1] += 1;
            }
        }

        $new_line[] = $moving_element;

        return $new_line;
    }


    private static function makeNewLine(array $line, $moving_element_id): array
    {
        $new_line = array();

        foreach ($line as $elem)
        {
            if (!((int) $elem[0] === $moving_element_id)) {
                $new_line[] = $elem;
            }
        }

        return self::sortArrayByPositionOrId($new_line, 1);
    }
}