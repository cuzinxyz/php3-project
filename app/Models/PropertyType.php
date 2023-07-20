<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str; 
use Illuminate\Database\Eloquent\SoftDeletes; // add soft delete


class PropertyType extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'property_type';

    protected $fillable = ['description', 'type_name'];

    public function getDescription()
    {
        return Str::limit($this->description, 15);
    }
}
