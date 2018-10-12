<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function create(){
        $author = [
            'id' => NULL,
            'name' => NULL,
            'date_of_birth' => NULL,
            'biography' => NULL,
            'photo' => NULL
        ];
        $form = view('author/author', ['author' => $author]);
        $html_page = view('author/html_page', ['form' => $form]);
        return $form;
    }

    public function store(Request $request)
    {
        if ($request->input('id')) {
            // retrieve existing SONG from database
            $id = $request->input('id');
            $authors = DB::selectOne('
            SELECT * FROM `author` 
            WHERE `id` = ?', [$id]);
            $authors = (array)$authors;

        } else {
            // create empty SONG
            $authors = [
                'id' => NULL,
                'name' => NULL,
                'date_of_birth' => NULL,
                'biography' => NULL,
                'photo' => NULL
                // ...
            ];
           
        }

            $authors['name'] = $request->input('name');
            $authors['date_of_birth'] = $request->input('date_of_birth');
            $authors['biography'] = $request->input('biography');
            $authors['photo'] = $request->input('photo');

        // SKIP VALIDATION IN LARAVEL
 
        // save the data
        if ($request->input('id')) {
            $query = '
            UPDATE `author`
                SET `name` = ?,
                    `date_of_birth` = ?,
                    `biography` = ?,
                    `photo` = ?
            WHERE `id` = ?
            ';
            $authors = [
                $authors['name'],
                $authors['date_of_birth'],
                $authors['biography'],
                $authors['photo'],
                $authors['id']
            ];
            DB::update($query,$authors);

        } else {
            $query = '
            INSERT INTO `author`
                (`name`, `date_of_birth`, `biography`, `photo`)
                VALUES(?,?,?,?)
                ';
                $authors = [
                    $authors['name'],
                    $authors['date_of_birth'],
                    $authors['biography'],
                    $authors['photo']
                ];
                DB::insert($query,$songs);
            
            $authors['id'] = DB::getPdo()->lastInsertId();

        }
        // inform the user
        
        session()->flash('success_message', 'Success!');
 
        // redirect (ideally to the edit page of the inserted song)
        return redirect('/author/edit?id='.$author['id']);
    }

    public function edit(Request $request){
        $id = $request->input('id');
        $authors = DB::selectOne('
        SELECT * FROM `songs` 
        WHERE `id` = ?', [$id]);
        $authors = (array)$authors;

        //dd($song);

        $form = view('author/author', ['author' => $authors]);
        $html_page = view('author/html_page', ['form' => $form]);
        return $html_page;

    }
}
