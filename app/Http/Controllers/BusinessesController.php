<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Business;
use Illuminate\Http\File;
use App\Events\DeleteBusiness;

class BusinessesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //Shows One Specific Business
    public function show(Business $business){
        return view('businesses.show', ['business' => $business]);
    }

    
    //Shows All businesses
    public function index(){
        $businesses = Business::paginate(10);
        return view('businesses.index', ['businesses' => $businesses]);
    }

    
    //Creates An Business
    public function create(){
        return view('businesses.create');
    }

    //Saves A Created Business
    public function store(Business $business, Request $request){
        
        //Validate
        $this->validateBusiness();

        //Upload Logo
        if(request('logo') != null){
            $logolocation = request('logo')->store('/');
        } else {
            $logolocation = "default_business_logo.png";
        }
        

        $Business = new Business(request(['name', 'email']));
        $Business->logo = $logolocation;
        $Business->save();
        return redirect('/businesses');
    }

    
    //Edits An Business
    public function edit($id){
        $Business = Business::find($id);
        return view('businesses.edit', ['Business' => $Business]);
    }


    //Updates The Business
    public function update(Business $Business){
        $this->validateBusiness();

        //Upload Logo
        if(request('logo') != null){
            $logolocation = request('logo')->store('/');
            $Business->logo = $logolocation;
        } else {
        }
        
        $Business->update($this->validateBusiness());

        return redirect($Business->path());
    }
    

    //Destroy/Delete An Business
    public function destroy(Business $Business){

        //Delete Logo
        $url = Business::where('id', request('id'))->first()->logo;
        DeleteBusiness::dispatch($url);

        
        //Delete Database Info
        Business::where('id', request('id'))->delete();

        //Return To Businesses Directory
        return redirect('/businesses');
    }
    

    //Will Validate And Return The Different Inputs
    protected function validateBusiness(){
        return request()->validate([
            'name' => ['string','required','max:255'],
            'email' => ['string','required','max:255'],
            'logo' => ['file'],
        ]);
    }

    //
}
