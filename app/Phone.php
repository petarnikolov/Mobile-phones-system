<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Phone extends Model
{
    protected $fillable = ['name', 'releaseDate', 'manufacturer_id', 'filename', 'manufacturer_id'];

}
