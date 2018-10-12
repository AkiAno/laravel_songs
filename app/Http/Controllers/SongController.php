<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class SongController extends Controller
{
    public function create()
    {
        // create empty SONG
        //$song = new \stdClass();
        $song = [
            'id' => NULL,
            'name' => NULL,
            'code_of_video' => NULL,
            'author' => NULL,
            'description' => NULL,
            'released_at' => NULL
        ];
        $form = view('songs/create_song', ['song' => $song]);
        $songs_list = $this->listing();
        $html_page = view('songs/html_page', ['create_song' => $form]);
        return $html_page;
        // display the form
    }
 
    public function edit(Request $request)
    {
        // retrieve existing SONG from database
        $id = $request->input('id');
        $song = DB::selectOne('
        SELECT * FROM `songs` 
        WHERE `id` = ?', [$id]);
        $song = (array)$song;

        //dd($song);

        $form = view('songs/create_song', ['song' => $song]);
        $html_page = view('songs/html_page', ['create_song' => $form]);
        return $html_page;
        // display the form
    }
 
    public function store(Request $request)
    {
        if ($request->input('id')) {
            // retrieve existing SONG from database
            $id = $request->input('id');
            $song = DB::selectOne('
            SELECT * FROM `songs` 
            WHERE `id` = ?', [$id]);
            $song = (array)$song;

        } else {
            // create empty SONG
            $song = [
                'id' => NULL,
                'name' => NULL,
                'code_of_video' => NULL,
                'author' => NULL,
                'description' => NULL,
                'released_at' => NULL
                // ...
            ];
           
        }

            $song['name'] = $request->input('name');
            $song['code_of_video'] = $request->input('code_of_video');
            $song['author'] = $request->input('author');
            $song['description'] = $request->input('description');
            $song['released_at'] = $request->input('released_at');
 
        // SKIP VALIDATION IN LARAVEL
 
        // save the data
        if ($request->input('id')) {
            $query = '
            UPDATE `songs`
                SET `name` = ?,
                    `code_of_video` = ?,
                    `author` = ?,
                    `description` = ?,
                    `released_at` = ?
            WHERE `id` = ?
            ';
            $songs = [
                $song['name'],
                $song['code_of_video'],
                $song['author'],
                $song['description'],
                $song['released_at'],
                $song['id']
            ];
            DB::update($query,$songs);

        } else {
            $query = '
            INSERT INTO `songs`
                (`name`, `code_of_video`, `author`, `description`, `released_at`)
                VALUES(?,?,?,?,?)
                ';
                $songs = [
                    $song['name'],
                    $song['code_of_video'],
                    $song['author'],
                    $song['description'],
                    $song['released_at']
                ];
                DB::insert($query,$songs);
            
            $song['id'] = DB::getPdo()->lastInsertId();

        }
        // inform the user
        
        session()->flash('success_message', 'Success!');
 
        // redirect (ideally to the edit page of the inserted song)
        return redirect('/songs/edit?id='.$song['id']);
    }

        public function listing(){
            $query = "
            SELECT * FROM
            `songs` WHERE 1";
            $songs = DB::select($query);
            $songs = (array)$songs;
            return view('/songs/songs_list', ['songs' => $songs]);
        } 

        public function deleteItems(Request $request){
            $id = $request->input('id');
            $query = "
            DELETE FROM
            `songs` WHERE id=?";
            DB::delete($query, [$id]);
            return redirect('/songs/list');
        }

        public function userSongs(){
            $query ="
                SELECT * FROM
                `songs`
            ";
            $songs = DB::select($query);
                
        }
}
