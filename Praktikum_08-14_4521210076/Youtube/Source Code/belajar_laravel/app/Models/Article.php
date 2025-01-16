<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model{
    protected   $fillable = [
        "title",
        "slug",
        "body",
        "teaser",
        "meta_title",
        "meta_description",
    ];
}