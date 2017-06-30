<?php

class Users
{
    static function getAllUsers()
    {
        $file = fopen('../../users.csv', 'a+');
        $result = array();
        while (($line = fgetcsv($file)) !== FALSE)
        {
            $result[] = array(
                'realName' => $line[2],
                'age' => $line[3],
                'id' => $line[4],
            );
        }
        fclose($file);
        $out = json_encode($result);
        return $out;
    }
}
