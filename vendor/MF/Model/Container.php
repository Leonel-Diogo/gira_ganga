<?php
namespace MF\Model;
use App\Conection;

class Container
{
    public static function getModel($model)
    {
        $class = "\\App\\Models\\" . ucfirst($model);
        $conn = Conection::getDB();
        return new $class($conn);
    }
}
?>