<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;

use App\Library;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class Libraries extends Controller
{
    //
    /**
     * Display a listing of the images.
     *
     * @return Response
     */
    public function index($active = 1) {
        return Library::where('active', $active)
            ->orderBy('id', 'asc')
            ->get();
    }

    /**
     * Update image active status in library
     *
     * @param $id
     * @param $active
     * @return string
     */
    public function update(Request $request) {

        $lib = Library::find($request->input('id'));
        $lib->active = $request->input('active');
        $lib->save();

        return "Success updating image #" . $lib->id;
    }

    /**
     * Get single image form db by id
     * @param $id
     * @return mixed
     */
    public function getSingleImage($id) {
        return Library::find($id);
    }
}
