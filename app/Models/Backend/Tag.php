<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable=[
        'name',
        'status',
        'slug',
        'drescreption',
    ];
    use HasFactory;
    public function blogpost(){
        return $this->belongsToMany(Blogpost::class);
    }
}
