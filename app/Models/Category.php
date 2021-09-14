<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';
    //ничего не надо защищать
    protected $guarded = false;
//    protected $fillable = [];

public function posts()
{
    return $this->hasMany(Post::class,'category_id', 'id');
}


}
