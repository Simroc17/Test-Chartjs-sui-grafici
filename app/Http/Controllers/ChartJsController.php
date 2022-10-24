<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Click;
use App\Models\User;
use App\Models\View as ModelsView;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View as FacadesView;
use Illuminate\View\View as ViewView;
use LengthException;
use Spatie\FlareClient\View as FlareClientView;

class ChartJsController extends Controller
{

    public function chartjs()  
{  
    $viewer = ModelsView::select(DB::raw("SUM(numberofview) as count"))  
        //->orderBy("created_at")  
        ->groupBy(DB::raw("day(created_at)"))  
        ->get()->toArray();  
    $viewer = array_column($viewer, 'count');  
      
    $click = Click::select(DB::raw("SUM(numberofclick) as count"))  
        //->orderBy("created_at")  
        ->groupBy(DB::raw("day(created_at)"))  
        ->get()->toArray();  
    $click = array_column($click, 'count');  
      
    return view('chart2')  
            ->with('viewer',json_encode($viewer,JSON_NUMERIC_CHECK))  
            ->with('click',json_encode($click,JSON_NUMERIC_CHECK));  
}  



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $densitaCitta = DB::table('cities')->select('densita', 'superfice')->get();
        //dd($densitaCitta);
        $arrayDensita = [];
        for( $i=0; $i<count($densitaCitta); $i++ ){
            $arrayDensita[$i] = $densitaCitta[$i]->densita;
        }
        //dd($arrayDensita);
        $arraySup = [];
        for( $i=0; $i<count($densitaCitta); $i++ ){
            $arraySup[$i] = $densitaCitta[$i]->superfice;
        }


        $cities = City::all();
        //dd($cities[0]->popolation);

        $nomeCitta = DB::table('cities')->select('name')->get();
        // QUI HO UN ARRAY DI OGGETTI con due attributi "name" e "popolation"
        //dd($nomeCitta);
        
        $arrayNomi =[];
        for(  $i = 0;  $i < count($nomeCitta); $i++){
            $arrayNomi[$i] = $nomeCitta[$i]->name;
        }
        //dd($array);
        
        $data = array($nomeCitta[0]->name, $nomeCitta[1]->name, $nomeCitta[2]->name, $nomeCitta[3]->name, $nomeCitta[4]->name, $nomeCitta[5]->name);
        //dd($data);


    


        foreach ($nomeCitta as $post) {
            isset($post->name) ? $test[] = array('name' => $post->name ) : null;
        }
        //QUI HO UN ARRAY DI ARRAY
        //dd($test[0]);

        foreach ($nomeCitta as $post) {
            isset($post->name) ? $test[] = $post->name : null;
        }
        //dd($test);


        $popCitta = DB::table('cities')->select('popolation')->get();
        //dd($popCitta);
        $arrayCitta =[];
        for(  $i = 0;  $i < count($popCitta); $i++){
            $arrayCitta[$i] = $popCitta[$i]->popolation;
        }
        //dd($arrayCitta);

        $data1 = array($popCitta[0]->popolation, $popCitta[1]->popolation, $popCitta[2]->popolation, $popCitta[3]->popolation, $popCitta[4]->popolation, $popCitta[5]->popolation);
        //dd($popCitta);
        
        
       
        
        return view('chart', compact( 'popCitta', 'nomeCitta', 'arrayNomi', 'arrayCitta', 'arrayDensita', 'arraySup'));
        // ->with('nomeCitta',json_encode($nomeCitta,JSON_NUMERIC_CHECK))  
        // ->with('popCitta',json_encode($popCitta,JSON_NUMERIC_CHECK));

        /////////////////// PRIMO GRAFICO DINAMICO ///////////////////////////////////      
        //     $userNumber = User::count();
        //     //dd($userNumber);
        //     //$userProva = DB::table('users')->select('id','name','cognome')->get();
        //     $users = User::select(DB::raw("COUNT(*) as count"))
        //     //dd($users);
        //     ->whereYear('created_at', date('Y'))
        //     //dd($users);
        //     ->groupBy(DB::raw("year(created_at)"))  
        //     //dd($users);
        //     //->orderBy('id', 'ASC');
        //     //dd($users);
        //     //->pluck('count', 'month_name');
        //     //dd($users);
        //     ->get()->toArray();
        //     //dd($users);
            

        //     $utenteId = User::select(DB::raw("count(id) as id"))
        //     //dd($labels);
        //     ->whereYear('created_at', date('Y'))
        //     ->groupBy(DB::raw("id"))
        //     ->get()->toArray();
        //     //dd($labels);
        //     // $users = $users->values();
        //     // $labels = $users->keys(); 
        //     //dd($users);

        //     $array =[];
        //     $utenteId = array_column($utenteId, 'id');
        //     $users = array_column($users, 'count');
        //     //dd($labels);
        //     //dd($users);
        

        // //return view('chart', compact('labels', 'users'));
        // return view('chart', compact('userNumber'))
        // ->with('users',json_encode($users,JSON_NUMERIC_CHECK))  
        // ->with('utenteId',json_encode($utenteId,JSON_NUMERIC_CHECK))
        // ;
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
