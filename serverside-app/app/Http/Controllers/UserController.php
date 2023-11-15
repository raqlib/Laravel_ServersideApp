<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function getAllUsers(){
        $cesaeInfo= $this ->getCesaeInfo();
        $users=$this->allUsers();
        return view('users.all_users', compact('cesaeInfo', 'users'));
    }

    public function getAddUser(){
        return view('users.add_user');
    }

    protected function getCesaeInfo(){
        $cesaeInfo = [
            'name' => 'Cesae',
            'address' => 'Europarque',
            'email' => 'cesae@gmail.com',
        ];
        $cesaeInfo['name'];
        $cesaeInfo['address'];
        $cesaeInfo['email'];
        return $cesaeInfo;
        }

        public function viewUser($id){
            $user= DB::table('users')
                ->where('id', $id)
                ->first();
            return view ('users.add_user', compact('user'));
        }


        public function deleteContact($id){
            $user= DB::table('users')
                ->where('id', $id)->delete();

            return redirect()->route('users.all');
        }

        public function storeUser(Request $request){

            if($request->user_id){
                $request->validate([
                    'name' => 'string|max:50',
                    'password' => 'min:6'
                   ]);

                   User::where('id', $request->user_id)
                   ->update([
                    'name' => $request->name,
                    'address' => $request->address,
                    'password' => Hash::make($request->password),
                   ]);
            }else{
                $request->validate([
                    'email' => 'required|unique:users|email',
                    'name' => 'string|max:50',
                    'password' => 'min:6'
                   ]);

                   User::insert([
                    'email' => $request->email,
                    'name' => $request->name,
                    'password' => Hash::make($request->password),
                   ]);
            }


           return redirect()->route('users.all');
        }

    protected function allUsers(){
            $utilizadores = DB::table('users')
            ->get();
            //dd($utilizadores);
            return ($utilizadores);
        }

    }

