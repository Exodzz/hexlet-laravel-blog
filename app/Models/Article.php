<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static findOrFail(int $id)
 * @method static paginate()
 * @property mixed $id
 */
class Article extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'body'];

}
