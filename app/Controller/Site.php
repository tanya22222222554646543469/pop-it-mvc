<?php

namespace Controller;

use Model\GroupToDiscipline;
use Model\Post;
use Src\View;
use Src\Request;
use Model\User;
use Model\Discipline;
use Model\Group;
use Model\Student;
use Src\Auth\Auth;
use Illuminate\Database\Capsule\Manager as DB;



class Site
{
    public function index(Request $request): string
    {
       $posts = Post::where('id', $request->id)->get();
       return (new View())->render('site.post', ['posts' => $posts]);
    }
    

   public function hello(): string
   {
       return new View('site.hello', ['message' => 'hello working']);
   }

   public function signup(Request $request): string
    {
        if ($request->method === 'POST' && User::create($request->all())) {
            app()->route->redirect('/go');
        }
        return new View('site.signup');
    }
    public function login(Request $request): string
    {
        if ($request->method === 'GET') {
            return new View('site.login');
        }
        //Если удалось аутентифицировать пользователя, то редирект
        if (Auth::attempt($request->all())) {
            app()->route->redirect('/menu');
        }
        //Если аутентификация не удалась, то сообщение об ошибке
        return new View('site.login', ['message' => 'Неправильные логин или пароль']);
    }

    public function logout(): void
    {
        Auth::logout();
        app()->route->redirect('/hello');
    }
    public function post(): string
    {
        return new View('site.post');
    }


    public function menu(): string
    {
        if(app()->auth->user()->roles_id == '1') {
            return (new View())->render('site.admin_menu');
        } else{
            return new View('site.menu');
        }
    }

    public function disciplines(): string
    {
        $employees = DB::table('discipline')->get();
        return (new View())->render('site.disciplines', ['employees' => $employees]);
    }
    public function disciplines_attendance(): string
    {
        $employees = DB::table('grade')->get();
        return (new View())->render('site.disciplines_attendance', ['employees' => $employees]);
    }
    public function groups(): string
    {
        $employees = DB::table('group of students')->get();
        return (new View())->render('site.groups', ['employees' => $employees]);
    }
    public function group_students(): string
    {
        return new View('site.group_students');
    }
    public function admin_menu(): string
    {
        return new View('site.admin_menu');
    }
    public function create_user(Request $request): string
    {
        if ($request->method === 'POST' && User::create($request->all())) {
            app()->route->redirect('/menu');
        }
        return new View('site.create_user');
    }
    public function all_user(): string
    {
        $employees = DB::table('user')->get();
        return (new View())->render('site.all_user', ['employees' => $employees]);
    }
    public function add_disciplines(Request $request): string
    {
        if ($request->method === 'POST' && Discipline::create($request->all())) {
            app()->route->redirect('/disciplines');
        }
        return new View('site.add_disciplines');
    }
    public function add_group(Request $request): string
    {
        $discipline = DB::table('discipline')->get();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Создание новой группы
            $group = new Group();
            $group->name = $_POST['name'];
            $group->course = $_POST['course'];
            $group->semester = $_POST['semester'];
            $group->save();

            // Привязка предметов к группе
            if (isset($_POST['discipline'])) {
                foreach ($_POST['discipline'] as $subjectId) {
                    $groupToDiscipline = new GroupToDiscipline();
                    $groupToDiscipline->subject_id = $subjectId;
                    $groupToDiscipline->group_name = $group->name;
                    $groupToDiscipline->save();
                }
            }
            app()->route->redirect('/groups');
        }
        return new View('site.add_group', ['discipline' => $discipline]);
    }
    public function add_student(Request $request): string
    {
        if ($request->method === 'POST') {
            $studentData = $request->all();

            $group = Group::where('discipline_id', $studentData['group_id'])->first();

            if ($group) {
                unset($studentData['group_students']);
                $gender = $request->get('gender');

                $student = new Student();
                $student->fill($studentData);
                $student->gender = $gender;
                $student->group_id = $group->discipline_id;
                $student->save();

                app()->route->redirect('/students');
            }
        }
        return new View('site.add_student');
    }
}
