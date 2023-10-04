<!--the show.blade extends the app layout-->
@import(app.models.Project);
@extends('layouts.app')
@section('content')
    <h1>{{$project->name}}</h1>
    <p>{{$project->description}}</p>
    <h1>{{$project_id}}</h1>

    <!--form element used to update project details -->
    <form method="POST" action="/update/{{$project_id}}">

        <!--form fields go here-->
        <input type="text" name="description" required id="description">
        <button type="submit">Update Project</button>

    </form>


    @foreach ($project as @Key => $project)


    @endforeach

@endsection


