<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CharsSuporte extends Model
{

    protected $table = 'chars_suporte';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'nome',
        'Id_playfab',
        'unlocked',
        'level',
        'currentExperience',
        'nextExperienceForLevelUp',
        'forca',
        'habilidade',
        'resistencia',
        'inteligencia',
        'armadura',
        'vida',
        'critico_percent',
        'esquiva_percent',
        'armadura_fisica',
        'armadura_magica',
        'qtd_fragmentos',
        'raca',
        'tipo',
        'grau'
    ];
}
