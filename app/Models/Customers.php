<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    use HasFactory;

    protected $table = 'customers';

    protected $guarded = [''];

    public $timestamps = true;

    public function getRole()
    {
        return $this->belongsTo("App\Models\Role", "role_id", "id");
    }
}
