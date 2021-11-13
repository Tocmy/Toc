<?php
namespace App\Models;

use Altek\Accountant\Contracts\Recordable;
use Altek\Accountant\Recordable as RecordableTrait;
use Altek\Eventually\Eventually;
use Illuminate\Database\Eloquent\Model;



abstract class BaseModel extends Model implements Recordable
{
    use RecordableTrait, Eventually;
}
/**
 * erp/law-helper
 */

?>
