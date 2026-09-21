<?php

namespace App\Models;
use App\Models\Contact;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = [
        'name',
        'description'
    ];

    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }
}