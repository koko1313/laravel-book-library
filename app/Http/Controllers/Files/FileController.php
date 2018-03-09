<?php

namespace App\Http\Controllers\Files;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\File;
use DB;
use File as FileP;

class FileController extends Controller
{
    public function Index()
    {
        $files=File::paginate(3);

    	//$files = DB::table('files')->get();
        return view('files.download', compact('files'));
    }

    public function Create()
    {
    	$files = File::get(['id', 'file_name','file_title','language','cover']);
        $book=Book::all();
        return view('files.create',['file' => new File],['book'=>$book]);
    }

    public function Store(Request $req)
    {
    	$this->validate($req, [
            'file_title'=> 'required|max:255',
    		'coverBook' => 'required|max:1024',
    		'file_name'=>'mimes:pdf,docx,txt',
    		'language'=>'required|max:30'
        ]);

    	$model = $req->all();
        $bookFile=new File();

        $file = $req['coverBook'];
        $filebook=$req['file_name'];

        if($file)
        {
            $fileName = str_random(5).$file->getClientOriginalName();
            $file->move('images', $fileName);
            $model['coverBook'] = 'images'.DIRECTORY_SEPARATOR.$fileName;
        }
        
        if($filebook)
        {
            $fileName = str_random(5).$filebook->getClientOriginalName();
            $filebook->move('download', $fileName);
            $model['file_name'] = 'download'.DIRECTORY_SEPARATOR.$fileName;
        }
        $bookFile->file_name=$model['file_name'];
        $bookFile->cover=$model['coverBook'];
        $bookFile->file_title=$req->file_title;
        $bookFile->language=$req->language;
        $bookFile->book_id=$req->book;

        if($bookFile->save())
        {
            return back()->with('message','success');
        }

        return back()->with('message','error');

    }

    public function Edit($id)
    {
        $file = File::where('id', $id)->first();

        if(!$file)
        {
            return redirect(404);
        }

        $files = File::get(['id', 'file_name','file_title','language','cover']);
        $book=Book::all();
        return view('files.create',['file' => $file],['book'=>$book]); 
    }

    public function Update($id, Request $req)
    {
        
        $this->validate($req, [
            'file_title'=> 'required|max:255',
            'coverBook' => 'max:1024',
            'file_name'=>'mimes:pdf,docx,txt',
            'language'=>'required|max:30'
        ]);

        $f = File::find($id);
        if(!$f)
        {
            return redirect(404);
        }

        $f->file_title = $req->file_title;
        $f->language = $req->language;

        $file = $req->file('coverBook');
        $filebook=$req->file('file_name');

        if($file)
        {
            FileP::delete($f->cover);
            $fileName = str_random(5).$file->getClientOriginalName();
            $file->move('images', $fileName);
            $f->cover = 'images'.DIRECTORY_SEPARATOR.$fileName;
        }
        if($filebook)
        {
            FileP::delete($f->file_name);
            $fileName = str_random(5).$filebook->getClientOriginalName();
            $filebook->move('download', $fileName);
            $f->file_name= 'download'.DIRECTORY_SEPARATOR.$fileName;
        }

        if($f->save())
        {
            return back()->with('message','success');
        }

        return back()->with('message','error');

        
    }
    public function Delete($id)
    {
        $f = File::find($id);
        if(!$f)
        {
            return redirect(404);
        }

        if($f->cover)
        {
            FileP::delete($f->cover);
        }

        if($f->file_name)
        {
            FileP::delete($f->file_name);
        }
        

        if($f->delete())
        {
            return back()->with('success','OK');
        }

        return back()->with('error','error');
    }
}
