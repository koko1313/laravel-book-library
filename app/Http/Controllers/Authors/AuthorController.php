<?php

namespace App\Http\Controllers\Authors;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Author;
use Auth;
use DB;

class AuthorController extends Controller
{
    public function Index()
    {
        
       // $authors = Author::get(['id', 'name']); // взима авторите от базата
        $authors=Author::paginate(5);
        return view('authors.index', ['authors' => $authors]); // връща view с параметър масив, съдържащ арторите
    }

    public function Edit($id)
    {
        $author = Author::where('id',$id)->first(); // взима автора със съответното ID
        return view('authors.form',['author' => $author]); // връща view с параметър автора
    }

    public function Update($id, Request $req)
    {
        Author::where('id', $id)->update(['name' => $req->name]); // взимаме автора и го update-ваме
        return redirect()->route('authors.list'); // редиректваме
    }

    public function Delete($id)
    {
        Author::where('id', $id)->delete(); // взимаме автора със съответното ID и го изтриваме
        return redirect()->route('authors.list'); // редиректваме
    }

    public function Create()
    {
        return view('authors.form');
    }

    public function Store(Request $req)
    {
        // валидираме информацията
        $this->validate($req, [
            'name' => 'required|max: 255'
        ]);

        Author::create($req->all()); // добавяме в базата

        return redirect()->route('authors.list'); // редиректваме
    }
}
