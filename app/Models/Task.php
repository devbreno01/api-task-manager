<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'category_id',
        'name',
        'description',
        'beggining',
        'finishing',
        'break_began',
        'break_finished',
        'status' ,
        'total_time_task'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public  function category(){
        return $this->belongsTo(Category::class);
    }
    protected function casts(){
        return [
            'status' => 'boolean'
        ];
    }


}
