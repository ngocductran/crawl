<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Social;
use Socialite;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Validator;
use App\Rules\Captcha; 

class HomeController extends Controller
{
     public function search(Request $request){ 

     	$keywords = $request->txtkey;
     	$data = array();
     	$data['txtsearch'] = $request->txtkey;
     	DB::table('history')->insert($data);
      return view('search')->with('keywords',$keywords);
     }
     public function max(Request $request){ 

      return view('maxprice');
     }
     public function min(Request $request){ 

     	
      return view('minprice');
     }
      public function khoanggia(Request $request){ 
       
      
      return view('khoanggia');
     }
      public function bieudo(Request $request){ 
       
      
      return view('bieudo');
    
     }
    
    public function bar(Request $request){ 
      return view('bar.blade.php');
    
    }

    public function sendo(Request $request){ 
      return view('product.sendo');
    
     }
    public function shoppe(Request $request){ 
      return view('product.shoppe');
    
     }
     public function tiki(Request $request){ 
      return view('product.tiki');
    
     }
    
}
