<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Sofa\Eloquence\Eloquence;
use Sofa\Eloquence\Mappable;
use Sofa\Eloquence\Mutable;


class Cidade extends Model
{
    use Eloquence, Mappable, Mutable;

    protected $table = 'V_MUNICIPIO_NUCLEUS';
    protected $primaryKey 	= 'MUNI_NR_SEQ';

    public $timestamps = false;

}
