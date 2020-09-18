<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $table = 'contacts';

    protected $fillable = ['name', 'telephone', 'email', 'city', 'state', 'category'];

    public function user(){
        return $this->hasOne('App\Models\User');
    }
}
