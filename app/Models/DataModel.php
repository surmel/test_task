<?php

namespace App\Models;

use App\Core\Model;

class DataModel extends Model
{
    /**
     * @param $data
     * @return void
     */
    public function insert($data)
    {
        $stmt = $this->dbh->prepare("INSERT INTO `data` (`text`, `created_at`) VALUES (:data, NOW());");
        $stmt->bindParam(":data", $data);
        $stmt->execute();
    }
}

