<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ParentAttachment extends Model
{
    //  php artisan make:model Models/ParentAttachment -m

    protected $fillable=['file_name','parent_id'];
}
