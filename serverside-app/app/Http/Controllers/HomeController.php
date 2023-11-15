<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function getMain(){
        $hello = 'Hello World';
        $weekDays= [
            'Segunda' => 'ISI',
            'Terca' => 'Python',
            'Quarta' => 'ISI',
            'Quinta',
            'Sexta',
            'Sabado',
            'Domingo'];


            $user= $this->getOneUser();
            $utilizadores= $this->getAllUsers();

        return view('general.home', compact('hello', 'weekDays', 'user', 'utilizadores'));
    }


    protected function getOneUser(){

        $user = DB::table('users')
        ->where('id', 2)
        ->first();
        //dd($user);
        return($user);
    }

    protected function getAllUsers(){

        $utilizadores = DB::table('users')
        ->get();
        //dd($utilizadores);
        return ($utilizadores);
    }


}

