<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public $table = 'customers';
    public $primary_key = 'id';
   // const CREATED_AT = 'createDate';
   // const UPDATED_AT = 'updateDate';

	protected $fillable = [
        'full_name', 'mobile_no','country_name','city_name','latitude','longitude'];
}
