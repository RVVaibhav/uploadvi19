<?php

namespace Vision\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Vision\Coin;
use Vision\CallRate;
use Vision\ConvertCoin;
use Vision\Gift;
use Vision\SecretChat;
use Storage;
use Log;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('products.index');
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

    public function gift()
    {
        $gift = Gift::all();
        return view('products.gift')->with('gift', $gift);
    }

    public function addGift(Request $request)
    {
        $validatedData = $request->validate([
            'gift_img' => 'required|image|mimes:jpg,png|max:2048',
            'gift_name' => 'required',
            'gift_coin' => 'required',
        ]);
        $user = Auth::user();
        $gift = new Gift();
        if($request->file('gift_img')){
            $path = Storage::put('user/'.$user->id, $request->file('gift_img'), 'public');
            $gift->gift_img =  $path;
        }
        $gift->gift_name = $request->input('gift_name');
        $gift->gift_coin = $request->input('gift_coin');
        $gift->save();

        return redirect('/products/gift');
    }

    public function editGift(Request $request, $id)  {
        $validatedData = $request->validate([
            'gift_name' => 'required',
            'gift_coin' => 'required',
        ]);
        $user = Auth::user();
        $gift = Gift::findOrFail($id);
        if($request->file('gift_img')){
            $path = Storage::put('user/'.$user->id, $request->file('gift_img'), 'public');
            $gift->gift_img =  $path;
        }
        $gift->gift_name = $request->input('gift_name');
        $gift->gift_coin = $request->input('gift_coin');
        $gift->save();

        return redirect('/products/gift');
    }

    public function deleteGift($id)
    {
        $gift = Gift::findOrFail($id)->delete();
        return redirect('/products/gift');
    }

    public function coinCenter()
    {
        $coin = Coin::all();
        return view('products.coin')->with('coin', $coin);
    }

    public function getCoinsRate()
    {
        $coin = Coin::all();
        return response()->json($coin);
    }


    public function editcoinCenter(Request $request, $id)
    {
        $validatedData = $request->validate([
            'coin_rs' => 'required',
            'coins' => 'required',
        ]);
        $coin = Coin::findOrFail($id);
        $coin->coin_rs = $request->input('coin_rs');
        $coin->coins = $request->input('coins');
        $coin->save();

        return redirect('/products/coin-center');
    }

    public function secretChat()
    {
        $secretChat = SecretChat::all();
        return view('products.secret_chat')->with('secretChat', $secretChat);
    }
    public function editSecretChat(Request $request, $id)
    {
        $validatedData = $request->validate([
            'secret_chat_min' => 'required',
            'secret_chat_coin' => 'required',
        ]);
        $coin = SecretChat::findOrFail($id);
        $coin->secret_chat_min = $request->input('secret_chat_min');
        $coin->secret_chat_coin = $request->input('secret_chat_coin');
        $coin->save();

        return redirect('/products/secret-chat');
    }

    public function convertConin()
    {
        $convertCoin = ConvertCoin::all();
        return view('products.convert_coin')->with('convertCoin', $convertCoin);
    }
    public function editConvertCoin(Request $request, $id)
    {
        $validatedData = $request->validate([
            'convert_coin_rs' => 'required',
            'convert_coin' => 'required',
        ]);
        $coin = ConvertCoin::findOrFail($id);
        $coin->convert_coin_rs = $request->input('convert_coin_rs');
        $coin->convert_coin = $request->input('convert_coin');
        $coin->save();

        return redirect('/products/coin-center');
    }
    public function callRate()
    {
        $callRate = CallRate::all();
        return view('products.call_rate')->with('callRate', $callRate);
    }
    public function editCallRate(Request $request, $id)
    {
        $validatedData = $request->validate([
            'coin_per_sec' => 'required',
        ]);
        $coin = CallRate::findOrFail($id);
        $coin->coin_per_sec = $request->input('coin_per_sec');
        $coin->save();

        return redirect('/products/call-rate');
    }

}
