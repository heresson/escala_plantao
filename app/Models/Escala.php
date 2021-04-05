<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Sofa\Eloquence\Eloquence;
use Sofa\Eloquence\Mappable;
use Sofa\Eloquence\Mutable;

class Escala extends Model
{
    use Eloquence, Mappable, Mutable;

    protected $table = 'TAB_ESCALA';
    protected $primaryKey 	= 'ES_NR_SEQ';

    public $timestamps = false;

    protected $fillable = [
        'ES_READ_NR_SEQ','ES_MEMB_CD', 'ES_MUNI_NR_SEQ', 'ES_DT', 'ES_CD_ESPECIALIDADE'
    ];

    // protected $hidden = [
    //     'ES_NR_SEQ','ES_READ_NR_SEQ','ES_MEMB_CD', 'ES_MUNI_NR_SEQ', 'ES_DT', 'ES_CD_ESPECIALIDADE'
    // ];

    // protected $maps = [
    //     'id' => 'ES_NR_SEQ',
    //     'regiao_adm' => 'ES_READ_NR_SEQ',
    //     'membro' => 'ES_MEMB_CD',
    //     'cidade' => 'ES_MUNI_NR_SEQ',
    //     'data' => 'ES_DT',
    //     'especialidade' => 'ES_CD_ESPECIALIDADE',
    // ];

    // protected $appends = [
    //     'id', 'regiao_adm', 'membro', 'cidade', 'data', 'especialidade'
    // ];

}
