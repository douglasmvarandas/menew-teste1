<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Schedule extends Model
{
    use HasFactory, SoftDeletes;

    protected $date = ['deleted_at'];
    protected $fillable = ['name', 'telephone', 'email', 'city', 'user_id', 'state_id', 'category_id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function state()
    {
        return $this->belongsTo(State::class, 'state_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
