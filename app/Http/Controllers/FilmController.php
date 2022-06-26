<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Http\Resources\FilmResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public static $wrap = 'films';

    public function index()
    {
        $films=Film::all();

        $my_films=array();
        foreach($films as $film){
            array_push($my_films,new FilmResource($film));
        }

        return $my_films;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function getByReziser($reziser_id){
        $films=Film::get()->where('reziser_id',$reziser_id);

        if(count($films)==0){
            return response()->json('Designer with this id does not exist!');
        }

        $my_films=array();
        foreach($films as $film){
            array_push($my_films,new FilmResource($film));
        }

        return $my_films;
    }

    public function films(Request $request){
        // $films=Film::get()->where('user_id',Auth::user()->id);
        // if(count($films)==0){
        //     return 'You do not have saved films!';
        // }
        // $my_films=array();
        // foreach($films as $film){
        //     array_push($my_films,new FilmResource($film));
        // }

        return $films;
    }

    public function getByZanr($zanr_id){
        $film=Film::get()->where('zanr_id',$zanr_id);

        if(count($films)==0){
            return response()->json('ID of this zanr does not exist!');
        }

        $my_films=array();
        foreach($films as $film){
            array_push($my_films,new FilmResource($film));
        }

        return $my_films;
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator=Validator::make($request->all(),[
            'naziv'=>'required|String|max:255',
            'produkcija'=>'required|String|max:255',
            'godina_premijere'=>'required|Integer|max:2023',
            'reziser_id'=>'required',
            'zanr_id'=>'required'


        ]);
        if($validator->fails()){
            return response()->json($validator->errors());
        }
        $film=new Film;
        $film->naziv=$request->naziv;
        $film->produkcija=$request->produkcija;
        $film->godina_premijere=$request->godina_premijere;
        $film->user_id=Auth::user()->id;
        $film->zanr_id=$request->zanr_id;
        $film->reziser_id=$request->reziser_id;

        $film->save();

        return response()->json(['Film is saved successfully!',new FilmResource($film)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function show(Film $film)
    {
        return new FilmResource($film);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function edit(Film $film)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Film $film)
    {
        $validator=Validator::make($request->all(),[
            'naziv'=>'required|String|max:255',
            'produkcija'=>'required|String|max:255',
            'godina_premijere'=>'required|Integer|max:2023',
            'reziser_id'=>'required',
            'zanr_id'=>'required'


        ]);
        if($validator->fails()){
            return response()->json($validator->errors());
        }
        $film=new Film;
        $film->naziv=$request->naziv;
        $film->produkcija=$request->produkcija;
        $film->godina_premijere=$request->godina_premijere;
        $film->user_id=Auth::user()->id;
        $film->zanr_id=$request->zanr_id;
        $film->reziser_id=$request->reziser_id;


        $result=$film->update();

        if($result==false){
            return response()->json('Difficulty with updating!');
        }
        return response()->json(['Film is updated successfully!',new FilmResource($film)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function destroy(Film $film)
    {
        $film->delete();

        return response()->json('Film is deleted successfully!');
    }
}
