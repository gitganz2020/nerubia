<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Carbon;
use App\Models\Movie;

class MoviesController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //return $request->user()->movies;
        return Movie::all();
        //return Movie::paginate(5);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id'   => 'required',
            'title'     => 'required|unique:movies',
            'overview'  => 'required',
            'vote'      => 'required',
            'release_at'=> 'required',
        ]);
   
        if($validator->fails()){
            return $this->errorResponse('Validation Error.', $validator->errors());       
        }
        
        $storeMovie = new Movie;
        $storeMovie->user_id    = $request->user_id;
        $storeMovie->title      = $request->title;
        $storeMovie->overview   = $request->overview;
        $storeMovie->vote       = $request->vote;
        $storeMovie->release_at = Carbon::now();
        $query = $storeMovie->save();

        if($query){
            return $this->successResponse($storeMovie, 'Movie posted successfully.');
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $movie = Movie::find( $id );

        if($movie){
            return response()->json($movie, 200);
        }
        
        return response()->json('Movie not found', 404);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $existingMovie = Movie::find( $id );

        if($existingMovie){

            $existingMovie->title      = $request->title;
            $existingMovie->overview   = $request->overview;
            $existingMovie->vote       = $request->vote;
            $existingMovie->release_at = Carbon::now();
            $query = $existingMovie->save();

            if($query){
                return $this->successResponse($existingMovie, 'Movie updated successfully.');
            }
        }

        return response()->json('Movie does not exist', 404);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $existingMovie = Movie::find( $id );
        if($existingMovie){
            $existingMovie->delete();
            return $this->successResponse($existingMovie, 'Movie deleted successfully.');
        }

        return response()->json('Movie not found', 404);
    }
}
