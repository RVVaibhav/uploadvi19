<?php

namespace Vision\Http\Controllers;

use Vision\Algorithm;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Vision\Level;
use Vision\Slideuser;
use Vision\User;
use Log;

class AlgorithmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $level = Level::with(['algorithms','slideuser'])->get();
        return view('algorithms.index')->with('level', $level);
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
        $percentage = $request->input('percentage');
        $reachto = $request->input('reachto');
        $array = [];
        for($i = 0; $i < 5; $i++){
            $array[$i]['percentage'] = $percentage[$i];
            $array[$i]['reachto'] = $reachto[$i];
            $array[$i]['level_id'] = $request->input('level_id');
        }
        $algorithm = Algorithm::where("level_id", $request->input('level_id'))->delete();
        Algorithm::insert($array);
        return redirect('/algorithms');
    }

    /**
     * Display the specified resource.
     *
     * @param  \Vision\Algorithm  $algorithm
     * @return \Illuminate\Http\Response
     */
    public function show(Algorithm $algorithm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Vision\Algorithm  $algorithm
     * @return \Illuminate\Http\Response
     */
    public function edit(Algorithm $algorithm)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Vision\Algorithm  $algorithm
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Algorithm $algorithm)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Vision\Algorithm  $algorithm
     * @return \Illuminate\Http\Response
     */
    public function destroy($level_id)
    {
        $algorithm = Algorithm::where("level_id", $level_id)->delete();
        $slideuser = Slideuser::where("level_id", $level_id)->delete();
        $level = Level::find($level_id)->delete();
        return redirect('/algorithms');
    }

    public function addRole(Request $request)
    {
        $validatedData = $request->validate([
            'levelno' => 'required|regex:/[0-9]/',
            'from_coin' => 'required|regex:/[0-9]/',
            'to_coin' => 'required|regex:/[0-9]/',
        ]);
            
        $level = new Level();
        $level->levelno = $request->input('levelno');
        $level->from_coin = $request->input('from_coin');
        $level->to_coin = $request->input('to_coin');
        $level->save();
        return redirect('/algorithms');
    }

    public function editRole(Request $request, $id)
    {
        $validatedData = $request->validate([
            'levelno' => 'required|regex:/[0-9]/',
            'from_coin' => 'required|regex:/[0-9]/',
            'to_coin' => 'required|regex:/[0-9]/',
        ]);
            
        $level = Level::findOrFail($id);
        $level->levelno = $request->input('levelno');
        $level->from_coin = $request->input('from_coin');
        $level->to_coin = $request->input('to_coin');
        $level->save();
        return redirect('/algorithms');
    }

    public function addSlideuser(Request $request)
    {
        $position = $request->input('position');
        $reachto = $request->input('reachto');
        $array = [];
        for($i = 0; $i < 4; $i++){
            $array[$i]['position'] = $position[$i];
            $array[$i]['reachto'] = $reachto[$i];
            $array[$i]['level_id'] = $request->input('level_id');
        }
        $algorithm = Slideuser::where("level_id", $request->input('level_id'))->delete();
        Slideuser::insert($array);
        return redirect('/algorithms');
    }

    public function getAlgorithmUser(Request $request, $level_id)
    {
        $user = User::algorithUser($level_id);
        $users = $this->paginate($user);
        $users->withPath('');
        return view('algorithms.users', compact('users'));
    }

    public function paginate($items, $perPage = 10, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }
}
