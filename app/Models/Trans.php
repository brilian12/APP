<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trans extends Model
{
    use HasFactory;

    protected $table = 'transaction';

    protected $guarded = [''];

    public $timestamps = true;

    public function getCust()
    {
        return $this->belongsTo("App\Models\Customers", "id_cust", "id");
    }

    public function getPack()
    {
        return $this->belongsTo("App\Models\Packet", "id_pack", "id");
    }
}
