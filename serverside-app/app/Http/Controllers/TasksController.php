<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Task;

class TasksController extends Controller
{
    public function getMain(){
        $tasks= $this->getAllTasks();

        return view('tasks.all_tasks', compact('tasks'));

    }

    public function viewTask($id){
        $tasks= DB::table('tasks')
            ->where('id', $id)
            ->first();

        $users =DB:: table('users')->get();

        return view ('tasks.view_task', compact('tasks'), compact('users'));
    }


    public function deleteTask($id){
        $task= DB::table('tasks')
            ->where('id', $id)->delete();

        return redirect()->route('tasks.all');
    }


    protected function getAllTasks(){
        $tasks = DB::table('tasks')
        ->join('users', 'tasks.user_id','=', 'users.id')
        ->select('tasks.*', 'users.name as resname')
        ->get();

        return($tasks);
    }


      //Função para mostrar o formulário(retorna a view do formulário)
      public function getAddTask(){

        //ir buscar os users todos à tabela
        $users = DB::table('users')->get();

        //dd($users);

        return view('tasks.add_task', compact('users'));
    }

    //Função para fazer o post dos dados inseridos no formulário e mandá-los para a base de dados
    public function storeTask(Request $request){
        //dd($request->all());
            $request->validate([
                'name' => 'required|string',
                'description' => 'required|string',
                'user_id' => 'required|string'
               ]);

               Task::insert([
                'name' => $request->name,
                'description' => $request->description,
                'due_at' => $request->date,
                'user_id' => $request->user_id,
               ]);

        return redirect()->route('tasks.all');
    }


//Função para fazer o update dos dados inseridos no formulário e mandá-los para a base de dados

    public function updateTask(Request $request){

        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'user_id' => 'required|string'
           ]);

           Task::where('id', $request->tasks_id)
           ->update([
                'name' => $request->name,
                'description' => $request->description,
                'due_at' => $request->date,
                'user_id' => $request->user_id,
           ]);

        return redirect()->route('tasks.all');
    }
}
