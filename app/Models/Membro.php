<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Sofa\Eloquence\Eloquence;
use Sofa\Eloquence\Mappable;
use Sofa\Eloquence\Mutable;

class Membro extends Model
{
    use Eloquence, Mappable, Mutable;

    protected $table = 'V_MEMBROS';
    protected $primaryKey 	= 'MEMB_CD';

    public $timestamps = false;

}
