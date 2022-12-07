<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;


class Blogpost extends Model
{
    use HasFactory;
    protected $date =[
        'publish_date',
    ];
    protected $fillable=[
        'title',
        'slug',
        'image',
        'short_drescreption',
        'drescreption',
        'status',
        'publish_date',
    ];
    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }
    public function users(){
        return $this->belongsTo(User::class,'user_id');
    }
    //  public function tags(){
    //      return $this->belongsToMany(Tag::class);
    // }
   
}
