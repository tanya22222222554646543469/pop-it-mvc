<?php

namespace Controller;

use Model\Post;
use Src\View;
use Src\Request;
use Model\User;
use Src\Auth\Auth;



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
        //Если просто обращение к странице, то отобразить форму
        if ($request->method === 'POST') {
            // return new View('site.login');
            if (Auth::attempt($request->all())) {
                if (Auth::user()->roles_id === 1) {
                    app()->route->redirect('post');
               } else {
                    app()->route->redirect('menu');
               }
               return new View ('site.login', ['message'=> 'ty popa vonuchaya and perduchaya']);
            }
            echo '<pre>';
            var_dump($request->all());
            echo '</pre>';
        }
        return new View ('site.login',  ['message'=> 'u tebya piska krochotnaya']);
        
        //Если удалось аутентифицировать пользователя, то редирект
        // if (Auth::attempt($request->all())) {
        //     app()->route->redirect('/hello');
        // }
        //Если аутентификация не удалась, то сообщение об ошибке
        // return new View('site.login', ['message' => 'Неправильные логин или пароль']);
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
        return new View('site.menu');
    }

    public function disciplines(): string
    {
        return new View('site.disciplines');
    }
    public function disciplines_attendance(): string
    {
        return new View('site.disciplines_attendance');
    }
    public function groups(): string
    {
        return new View('site.groups');
    }
    public function group_students(): string
    {
        return new View('site.group_students');
    }
    
}
