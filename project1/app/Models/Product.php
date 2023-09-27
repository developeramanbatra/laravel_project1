<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['companyId','product_name','price','quantity'];

    public function companyfunc()
    {
        return $this->hasOne('App\Models\Company','id','companyId');
    }
}
