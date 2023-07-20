<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes; // add soft delete

class NewsCategories extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'news_categories';

    protected $fillable = ['category_name', 'description'];

    public function getDescription()
    {
        return Str::limit($this->description, 25);
    }
}
