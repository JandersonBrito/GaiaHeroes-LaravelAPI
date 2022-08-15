<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Account extends Model
{

    protected $table = 'tbaccount';

    protected $primaryKey = 'Id';

    public $timestamps = false;

    protected $fillable = [
        'Id_playfab',
        'email',
        'nome',
        'lv_account'
    ];



    static public function GetAccountByIdplayfab($Id_playfab)
    {
        $acc = DB::table('tbaccount')->
        select('*')->where('Id_playfab', $Id_playfab)->first();

        return $acc;
    }  

    static public function GetCharactersAccount($Id_playfab){
        $acc = DB::table('tbaccount')->
        select('*')->where('Id_playfab', $Id_playfab)->first();

        return $acc;
    }
}
