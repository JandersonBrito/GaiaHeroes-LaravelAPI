<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Request;

use App\Account;
use App\Character;
use App\CharsSuporte;
use App\Teste;


class GameController extends Controller
{

    public function GetAccountCharactersByID($idaccount){

        $acc = $this->VerifyAccount($idaccount);
        $chars = Character::GetCharactersAccount($idaccount);
        return ($chars);
        
    }
    
    public function GetAccountCharacters(Request $request){


       // $idaccount = $request->input("id_playfab");
        $idaccount = "4036A561F5B1DC3B1";
        $acc = $this->VerifyAccount($idaccount);

        $chars = Character::GetCharactersAccount($idaccount);
        echo $chars;
    }

    public function VerifyAccount($idaccount){
        
        $account = Account::GetAccountByIdplayfab($idaccount);

        if($account === null){
            $acc = $this->CreateAccount($idaccount);
            
            if($acc){
                return $acc;
            }
        }else{
            return $account;
        }
    }

    public function SetCharacter(Request $request){

        $char = new Character();

        $char->Id_playfab = $request->input("Id_playfab");
        $char->id_char = $request->input("id_char");
        $char->name = $request->input("name");
        $char->forca = $request->input("forca");
        $char->habilidade = $request->input("habilidade");
        $char->resistencia = $request->input("resistencia");
        $char->inteligencia = $request->input("inteligencia");
        $char->armadura = $request->input("armadura");

        if($char->save()){

            http_response_code(404);
        }

    }

    public function CreateAccount($idaccount){

        $acc = new Account();
        $acc->Id_playfab = $idaccount;
        $acc->email = $idaccount . "teste";
        $acc->nome = $idaccount . "teste";
        $acc->lv_account = "1";

        if($acc->save()){
            $acc = $this->VerifyAccount($idaccount);

            $this->SetAllCharacters($idaccount);

            return $acc;
        }
    }

    public function UpdateCharacter(Request $request, $id){

        $character = Character::find($id);

        $character->nome = $request->input("nome");

        if($character->save()){
            echo "atualized in database";
        }
    }

    public function UpdateShardCharacter(Request $request, $id){

        $character = Character::find($id);

        $character->qtd_fragmentos += $request->input("qtd_fragmentos");

        if($character->save()){
            echo "atualized in database";
        }
    }

    public function GetAllCharacters(){

        $chars = CharsSuporte::all();
        return ($chars);
    }

    public function SetAllCharacters($idaccount){

        $chars = CharsSuporte::all();

        foreach ( $chars as $c){

            $ch = new Character();
            $ch->id_char = $c->id;
            $ch->Id_playfab = $idaccount;
            $ch->nome = $c->nome;
            $ch->unlocked = $c->unlocked;
            $ch->level = $c->level;
            $ch->currentExperience = $c->currentExperience;
            $ch->nextExperienceForLevelUp = $c->nextExperienceForLevelUp;
            $ch->forca = $c->forca;
            $ch->habilidade = $c->habilidade;
            $ch->resistencia = $c->resistencia;
            $ch->inteligencia = $c->inteligencia;
            $ch->armadura = $c->armadura;
            $ch->vida = $c->vida;
            $ch->critico_percent = $c->critico_percent;
            $ch->esquiva_percent = $c->esquiva_percent;
            $ch->armadura_fisica = $c->armadura_fisica;
            $ch->armadura_magica = $c->armadura_magica;
            $ch->qtd_fragmentos = $c->qtd_fragmentos;
            $ch->tipo = $c->tipo;
            $ch->grau = $c->grau;
            $ch->raca = $c->raca;

            $ch->save();
        }
    }
}
