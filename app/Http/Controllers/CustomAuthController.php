<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
class CustomAuthController extends Controller
{

    public function index()
    {
        return view('auth.login');
    }  
      
    public function customLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
   
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard')
                        ->withSuccess('Signed in');
        }
  
        return redirect("login")->withSuccess('Login details are not valid');
    }

    public function registration()
    {
        return view('auth.registration');
    }
     public function getAll()
     {
        $data = DB::table('products')->simplePaginate(15);
        return view('Pages.allgames', ['data' => $data]);
     } 
     public function getTopGames()
     {
        $data = DB::table('topsell')->join('products','topsell.idTopSell','=','products.proId')->simplePaginate(15);
        return view('Pages.topgames', ['data' => $data]);
     }
     public function getNewGames()
     {
        $data = DB::table('products')->orderBy('proId', 'desc')->limit(20)->simplePaginate(15);
        return view('Pages.newgame', ['data' => $data]);

    }
    public function store(Request $request)
    {
        $name = $request->input('search');
        $filterData = DB::table('products')->where('products.nameProduct','LIKE','%'.$name.'%')->simplePaginate(15);
        $count =count($filterData);
        if($count==0)
        {
            echo "<script type='text/javascript'>alert('Không tìm thấy sản phẩm');</script>";
            return view('Pages.welcome');
        }else
        {
            return view('Pages.searchProduct', ['data' => $filterData]);
        }
    }
    public function getSaleGames()
    {
       $data = DB::table('products')->where('products.salePrice','>',0)->simplePaginate(15);
       return view('Pages.salegames', ['data' => $data]);
   }
   public function getDetail($id)
   {
    $data = DB::table('products')->join('categoryproducts','categoryproducts.cateid','=','products.cateid')->where('products.nameProduct','=',$id)->select('products.*','categoryproducts.nameCate')->get();
    $cate;
    foreach ($data as $key=>$item);
            $cate=$item->nameCate;
    $relate= DB::table('products')->join('categoryproducts','categoryproducts.cateid','=','products.cateid')->where('categoryproducts.nameCate','=',$cate)->limit(4)->select('products.*')->inRandomOrder()->get();
    return view('Pages.detail', ['data' => $data,'relate'=>$relate]);

}
  public function getCatePro($id)
  {
    $data = DB::table('products')->join('categoryproducts','categoryproducts.cateid','=','products.cateid')->where('categoryproducts.nameCate','=',$id)->simplePaginate(15);
    return view('Pages.catepro',['data'=>$data]);
  }
    public function customRegistration(Request $request)
    {  
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'confirmpass'=>'required|same:password',
            'image'=>'required'
        ]);
           
        $data = $request->all();
        $check = $this->create($data);
        return redirect("dashboard")->withSuccess('You have signed-in');
    }

    public function create(array $data)
    {
      return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password']),
        'image'=>$data['image']
      ]);
    }    
    
   
    
    public function signOut() {
        Session::flush();
        Auth::logout();
  
        return Redirect('login');
    }
    public function users(){
        $user=DB::table('users')->simplePaginate(2);
        return view('auth.users',["user"=>$user]);
    }
    public function image(){
        $image = DB::table('users')->select('image')->get();
        return view('auth.image',["image"=>$image]);
    }
}
