<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class business_info extends Model
{
    use HasFactory;
    protected $table = 'business_infos';
    //Primary Key
    public $primaryKey = 'business_id';
    // Timestamps
    protected $fillable=['lastname','firstname',
    'middlename',
    'telephone_no',
    'mobile_no',
    'businessname',
    'businessaddress',
    'businesstype'];
    public $timestamps = true;
}
