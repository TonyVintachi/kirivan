<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Project;
use JetBrains\PhpStorm\Internal\ReturnTypeContract;

class Project extends Model
{

    public $name;
    public $description;
    public $project;

    public function create(array $data){

        $this->validateName($data);
        $this->validateDescription($data);

        return this;

    }

    public function update(array $data, Project $project){


        $this->validateName($data);
        if($this->validateDescription($data)){

        }

        return this;

    }

    public function validateName(array $data){
        $name = $data['name'];
        if(!$name||!is_string($name)){
            return false;
        }
    }


    public function validateDescription(array $data){
        $description = $data['description'];
        if(!$description||!is_string($description) || strlen($description)<10){
            return false;
        }
    }

    //open tasks for project
    public function find(Request $request,?int $project_id = null){

        return $this->where('project_id',$project_id)->first();
    }


    $project = Project::find($project_id);
    $project -> name = $name;
    $project -> description = $description;
    $project -> Save();

    use HasFactory;


}
