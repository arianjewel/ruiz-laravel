<?php

namespace App\Http\Controllers;

use Auth;
use App\Shipping;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function index(){
    	return view('front-end.address.add');
    }

    public function store(Request $request){

        $this->validate($request, [
            'first_name' => 'required | string',
            'last_name' => 'required | string',
            'phone' => 'required | numeric',
            'email' => 'required | email',
            'address' => 'required | string',
            'post_office' => 'required | string',
            'post_code' => 'required | numeric',
            'thana' => 'required | string',
            'district' => 'required | string',
        
        ]);

    	Shipping::create($request->all());
    	return redirect('/my-account/view')->with('message','Thanks to with us. your info saved!');
    }

    public function show(){
    	$shippings = Shipping::where('user_id', Auth::user()->id)->first(); 
    	return view('front-end.address.view', compact('shippings'));
    }

    public function edit($id){
    	$shippings = Shipping::findOrFail($id); 
    	return view('front-end.address.edit', compact('shippings'));
    }

     public function update(Request $request, $id){
     	$input = $request->except(['_token']);
    	Shipping::where('user_id', $id)->update($input); 
    	return redirect('/my-account/view/')->with('message','Thanks for with us. your info updated!');
    }

}
