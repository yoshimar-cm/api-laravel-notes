<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Requests\StoreRequestNotes;
use App\Http\Requests\UpdateRequestNotes;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() : object
    {
        $notes = Note::all();

        return response()->json([
            'notes' => $notes,
            'status' => true
        ],200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequestNotes $request) : object|null
    {
        $note = Note::create([
            'slug' => Str::slug($request->name),
            'name' => $request->name,
            'description' => $request->description,
            'category_id' => $request->category
        ]);

        return response()->json([
            'note' => $note,
            'status' => true
        ],200);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function show(Note $note) : object
    {
        return response()->json([
            'note' => $note,
            'status' => true
        ],200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequestNotes $request, Note $note) : object
    {

        $note->slug = Str::slug($request->name);
        $note->name = $request->name;
        $note->description = $request->description;
        $note->save();

        return response()->json([
            'note' => $note,
            'status' => true
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function destroy(Note $note)
    {
        $note->delete();

        return response()->json([
            'status' => true
        ],200);
    }
}
