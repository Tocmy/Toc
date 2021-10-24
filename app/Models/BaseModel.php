<?php
namespace App\Models;

use Altek\Accountant\Recordable;
use Altek\Eventually\Eventually;
use Illuminate\Database\Eloquent\Model;



abstract class BaseModel extends Model implements Recordable
{
    use Recordable, Eventually;
}


?>
