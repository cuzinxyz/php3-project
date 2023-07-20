<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes; // add soft delete

class Blog extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'news';

    protected $fillable = [
        'title',
        'slug',
        'content',
        'thumbnail',
        'category_id',
        'user_id'
    ];

    public function getTime()
    {
        // Lấy thông tin created_at từ đối tượng $post
        $createdAt = $this->created_at;

        // Tính thời gian từ hiện tại đến created_at
        $currentTime = Carbon::now();
        return $timeDifference = $currentTime->diffForHumans($createdAt);
    }

    public function getContent()
    {
        $string = Str::limit($this->content, 35);

        return strip_tags($string);
    }
}
