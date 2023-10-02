<?php

namespace App\Http\Controllers;

//the resource method defines the resourse route
 //Route::resource('project', ProjectsController::class);

use App\Models\Project;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;


class ProjectsController extends Controller
{

    public function project(){
        return view("projects.project");
    }

    //
    public function addProject(Request $request){

        $request->validate([
            'name' => 'required',
            'overview' => 'required',
            'objectives' => 'required',
            'due_date' => 'required',
            'goals' => 'required',
            'owner' => 'required',
            'uid' => 'required'
        ]);

        $project = new Project();
        $project ->name = $request->name;
        $project ->overview = $request->overview;
        $project ->objectives = $request->objectives;
        $project ->due_date= $request->due_date;
        $project ->goals= $request->goals;
        $project ->owner = $request->owner;
        $project ->uid = $request->uid;

        //Save data
        $res = $project -> save();

        // Get Response
        if ($res){
            // If response is successful redirect
            return redirect()->intended(route('projects'));
        } else {
            // If response was not successful display error
            return back()-> with('error', 'Something wrong');
        }
    }

    public function tasks(Request $request ){

        $project_id = $request->route('id');

        return view("tasks.task");
    }


    //this method has the code to display a list of projects
    public function index(){

        foreach($projects as $project){

            $project_name = $project->name;
            echo "<h2>$project_name</h2>";
            echo "Project Description:";
            echo $project->description;
            echo "Due Date:" . $project->due_date;
            echo "Goals:" . implode("\n",$project->goals);


            //button to delete a project
            echo '<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete-project">Delete</button>';

            //endforeach
        };

        //@stop


        function delete(Project $project){
            //check if the user is authorized to delete the project

            if(Auth::check()){
                $project->delete();
            }

        }


        function update(Project $project){

            if(Auth::check()){

            }

        }


        function create(){
            $REQUEST = $this->$request();

            if(!$REQUEST -> validate(['name'=>'required',
            'description'=>'required'])){

            }


        }

        $project ->create($REQUEST);

        //return view('projects.index');
        return redirect()->route('project.index');
    }



    //this displays details of the project and it will also handle deletion of the project
    public function show($id){

        if($id === null){
            return redirect('projects');
        }
        $project = Project::find($id);
    }


    public function create(){
        //build your form
    }


    public function validate($project){

        //this tells laravel to validate data before we store
        $this->validate($project,['name'=>'required|string',
    'description'=>'required|min:10']);

    }

    //update methode updates an existing project
    public function update($project_id,$project){
        //use the $project_id to find the project to update
        $project = $project_id::find($project_id);

        //update the $project with the update data
        $project ->update($project);

        //if there are any errors display them to the user
        if($project->errors()){
            $project->errors()['username'];
            echo '<p>Oops!!! something went wrong</p>';
        };

    }


    //the delete method
    public function delete($project_id){

        //find project to delete
        $project = $project_id::find($project_id);

        $project->delete();

    }

}
