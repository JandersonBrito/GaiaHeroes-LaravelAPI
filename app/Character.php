<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Character extends Model
{

    protected $table = 'chars';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'id_char',
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
        'tipo',
        'raca',
        'grau'
    ];



    static public function GetCharactersAccount($Id_playfab){
        $chars = DB::table('chars')->
        select('*')->where('Id_playfab', $Id_playfab)->get();

        return $chars;
    }
}
