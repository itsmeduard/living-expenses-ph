<?php
namespace App\Models;
use Illuminate\Database\Eloquent\{Model, SoftDeletes};
use OwenIt\Auditing\Contracts\Auditable;
class Category extends Model implements Auditable
{
    use SoftDeletes,\OwenIt\Auditing\Auditable;
    protected $table='expenses';

    protected $fillable = [
        'item',
        'amount',
        'quantity',
        'category_id',
        'description',
        'datetime_added',
    ];
    public $timestamps = true;
}
