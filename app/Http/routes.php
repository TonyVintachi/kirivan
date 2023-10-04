<php>

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProjectsController;

use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::middleware('auth')->group(
    function (){
        Route::get('dashboard', function(){
            $projects = DB::table('projects')->get();
            return view("dashboard", ["projects" => $projects]);
        })->name('dashboard');

        Route::get('projects', function(){
            $projects = DB::table('projects')->get();
            $tasks = DB::table('tasks')->get();
            return view("projects", [
                "projects" => $projects,
                "tasks" => $tasks
            ]);
        })->name('projects');

        Route::get('diary', function(){
            return view('diary');
        })->name('diary');

        Route::get('team', function(){
            return view('team');
        })->name('team');
    }
);

Route::controller(ProjectsController::class)->group(
    function(){

        Route::post('addProject',  [ProjectsController::class, 'addProject'])->name('addProject');

        Route::get('projects/{id}/addtask/', function(){


        })->name('tasks');

        Route::get('projects/{id}/tasks/', function(){
            $projects = DB::table('projects')->get();
            $project = DB::table('projects')->find('id');
            return view("tasks.tasks", ["projects" => $projects]);
        })->name('tasks');

    }
);

Route::get('/update/{project_id}',['as'=>'update']);

Route::get('/update/{project_id}');

Route::get('/edit/{project_id}',[ProjectsController::class,'edit']);

Route::get('/delete/{project_id}',['as'=>'delete']);


</php>
