<?php

namespace App\Http\Controllers\Books;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Author;
use Auth;
use DB;

class BookController extends Controller
{
    public function Index()
    {
        $books=Book::paginate(5);
        // правим го със DB::table, защото не знам как се прави join с ORM
        /**$books = DB::table('books')
            ->join('authors','author_id','=','authors.id')
            ->get(['books.id','title','year','name','description']);
            **/

        return view('books.index', ['books' => $books]);
    }

    public function Edit($id)
    {
        $book = Book::where('id', $id)->first(); // взима книгата със съответното ID
        $authors = Author::get(['id', 'name']); // взима авторите
        return view('books.form',['book' => $book, 'authors' => $authors]); // връща view с параметър книгата и списъка с авторите, за да полълни select
    }

    public function Update($id, Request $req)
    {
        // валидираме
        $this->validate($req, [
            'title' => 'required|max: 255',
            'author_id' => 'not_in: 0',
            'year' => 'required|max: 4| min: 4',
            'description' => 'required'
        ]);

        // взимаме книгата и я update-ваме
        Book::where('id', $id)->update([
            'title' => $req->title,
            'year' => $req->year,
            'author_id' => $req->author_id,
            'description' => $req->description
        ]);

        return redirect()->route('books.list'); // редиректваме
    }

    public function Delete($id)
    {
        Book::where('id', $id)->delete(); // взимаме книгата със съответното ID и я изтриваме
        return redirect()->route('books.list'); // редиректваме
    }

    public function Create()
    {
        $book=Book::all();
        $authors = Author::get(['id', 'name']); // взимаме авторите
        return view('books.form',['book'=>new Book()],['authors' => $authors]); // връща view с параметър авторите, за да се полълни select-а
    }

    public function Store(Request $req)
    {
        // валидираме
        $this->validate($req, [
            'title' => 'required|max: 255',
            'author_id' => 'not_in: 0',
            'year' => 'required|max: 4| min: 4',
            'description' => 'required'
        ]);

        Book::create($req->all()); // добавяме в базата

        return redirect()->route('books.list'); // редиректваме
    }
}
