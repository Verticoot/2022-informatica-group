<?php

namespace App\Models;

use PDO;

/**
 * Example user model
 *
 * PHP version 7.0
 */
class Event extends \Core\Model
{

    /**
     * Get all the users as an associative array
     *
     * @return array
     */
    public static function getAll()
    {
        $db = static::getDB();
        $stmt = $db->query('SELECT id_evento, titolo, costo, organizzatore FROM eventi');
        $result = array();

        if ($stmt->num_rows > 0) {
            // output data of each row
            while($row = $stmt->fetch_assoc()) {
                $obj = [
                    "id_evento" => $row["id_evento"],
                    "titolo" => $row["titolo"],
                    "costo" => $row["costo"],
                    "organizzatore" => $row["organizzatore"],
                ];
                array_push($result,$obj);
            }
        }
        return $result;
    }

    public static function getEvent($id)
    {
        $db = static::getDB();
        $stmt = $db->query('SELECT id_evento, titolo, costo, organizzatore FROM eventi WHERE id_evento='.$id);
        $result = array();
        if ($stmt->num_rows > 0) {
            // output data of each row
            $row = $stmt->fetch_assoc();
            $obj = [
                "id_evento" => $row["id_evento"],
                "titolo" => $row["titolo"],
                "costo" => $row["costo"],
                "organizzatore" => $row["organizzatore"],
            ];
            array_push($result,$obj);
        }
        return $result;
    }
}
