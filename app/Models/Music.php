<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Music extends Model
{
    use HasFactory;
    protected $table='table_music';

    protected $fillable = ["title","artist","lyrics","audio"];
    protected $guarded = [
        'id'
    ];
}
