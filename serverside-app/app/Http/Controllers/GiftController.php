<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Gift;

class GiftController extends Controller
{
    public function getMain(){
        $gifts= $this->getAllGifts();

        return view('gifts.all_gifts', compact('gifts'));

    }

    //Função que vai buscar todos os gifts
    protected function getAllGifts(){
        $gifts = DB::table('gifts')
        ->join('users', 'gifts.user_id','=', 'users.id')
        ->select('gifts.*', 'users.name as resname')
        ->get();

        return($gifts);
    }


     //Função para mostrar o formulário(retorna a view dos gifts)
     public function getAddGift(){
        //ir buscar os users todos à tabela
        $users = DB::table('users')->get();

        //dd($users);

        return view('gifts.add_gift', compact('users'));
    }

    //Função para fazer o post dos dados inseridos no formulário dos gifts e mandá-los para a base de dados
    public function storeGift(Request $request){
        //dd($request->all());
            $request->validate([
                'name' => 'required|string',
                'estimated_cost' => 'required',
                'real_cost' => 'required',
                'user_id' => 'required'
               ]);

               Gift::insert([
                'name' => $request->name,
                'estimated_cost' => $request->estimated_cost,
                'real_cost' => $request->real_cost,
                'user_id' => $request->user_id,
               ]);

        return redirect()->route('gifts.all');
    }


    //Função para ver as tarefas
    public function viewGift($id){
        $gifts= DB::table('gifts')
            ->where('id', $id)
            ->first();

        $users =DB:: table('users')->get();

        return view ('gifts.view_gift', compact('gifts'), compact('users'));
    }


    //Função para fazer o update dos dados inseridos no formulário e mandá-los para a base de dados
    public function updateGift(Request $request){

        //dd($request->all());
        $request->validate([
            'name' => 'required|string',
            'estimated_cost' => 'required',
            'real_cost' => 'required',
            'user_id' => 'required'
           ]);

           Gift::where('id', $request->gift_id)
           ->update([
            'name' => $request->name,
            'estimated_cost' => $request->estimated_cost,
            'real_cost' => $request->real_cost,
            'user_id' => $request->user_id,
           ]);

        return redirect()->route('gifts.all');
    }


    //Função para calcular a diferença entre o custo estimado e o custo real
    public function getCostDifference($id){

        $gift = DB::table('gifts')
            ->where('id', $id)
            ->first();

        $costDifference = $gift->estimated_cost - $gift->real_cost;

        return view('gifts.all', compact('gift', 'costDifference'));
    }

}
