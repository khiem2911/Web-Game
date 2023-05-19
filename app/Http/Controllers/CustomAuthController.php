<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use App\Models\favourite;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
class CustomAuthController extends Controller
{

    public function index()
    {
        return view('login');
    }
    public function test(Request $request)
    {
        $value = $request->session()->get('uid');
        return view('Pages.test',['data'=>$value]);
    }

    public function customLogin(Request $request)
    {
        $request->validate([
            
            'email' => 'required',
            'password' => 'required',
        ]);
        

       
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $data = DB::table('users')->get();
            foreach ($data as $key => $value) {
               if($value->email==$request->email)
               {
                $request->session()->put('uid', $value->uid);
               }
            }
            
            if (auth()->user()->type == 1) {
                return redirect()->intended('admin')
                ->withSuccess('Signed in');
            }else{
                return redirect()->intended('allgames')
                ->withSuccess('Signed in');
            }
            
        }
        return redirect("login")->withSuccess('Login details are not valid');
    }
    
    public function registration()
    {
        return view('auth.registration');
    }

    public function customRegistration(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'fullname' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'comfirmPassword' => 'required_with:password|same:password|min:6',
            'phone' => 'required',
            'avatar' => 'required',

        ]);
        $data = $request->all();
        $check = $this->create($data);
       

        return redirect("login")->withSuccess('You have signed-in');
    }

    public function create(array $data)
    {
        return User::create([
            'username' => $data['username'],
            'fullname' => $data['fullname'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'phone' => $data['phone'],
            'moneyaccount' => 0,
            'avatar' => $data['avatar'],
            'type' => 0,
        ]);
    }

    public function dashboard()
    {
        if(Auth::check()){
            return view('dashboard');
        }

        return redirect("login")->withSuccess('You are not allowed to access');
    }

    public function signOut() {
        Session::flush();
        Auth::logout();

        return Redirect('login');
    }
    public function getuser()
     {
        $data = DB::table('user')->simplePaginate(15);
        return view('Pages.allgames', ['data' => $data]);
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
    public function getSaleGames()
    {
       $data = DB::table('products')->where('products.salePrice','>',0)->simplePaginate(15);
       return view('Pages.salegames', ['data' => $data]);
   }
   public function getDetail($id)
   {

    $data = DB::table('products')->join('categoryproducts','categoryproducts.cateid','=','products.cateid')->where('products.nameProduct','=',$id)->select('products.*','categoryproducts.nameCate')->get();
    $cate;
    $idpro;
    foreach ($data as $key=>$item);
            $cate=$item->nameCate;
            $idpro=$item->proId;
    $comment = DB::table('comment')->where('idPro','=',$idpro)->get();
    $relate= DB::table('products')->join('categoryproducts','categoryproducts.cateid','=','products.cateid')->where('categoryproducts.nameCate','=',$cate)->limit(4)->select('products.*')->inRandomOrder()->get();
    return view('Pages.detail', ['data' => $data,'relate'=>$relate,'comment'=>$comment]);

    }
  public function getCatePro($id)
  {
    $data = DB::table('products')->join('categoryproducts','categoryproducts.cateid','=','products.cateid')->where('categoryproducts.nameCate','=',$id)->simplePaginate(15);
    return view('Pages.catepro',['data'=>$data]);
  }
    

  public function getFavourite()
  {
    $data = DB::table('wishlist')->join('products','products.proId','=','wishlist.proid')->simplePaginate(15);;
    return view('Pages.wishlist', ['data' => $data]);
  }

  public function store(Request $request)
  {
    $allRequest  = $request->all();
    $product_id = $allRequest['proid'];
    $content= $allRequest['content'];
    $comment['idPro'] = $request->proid;
    $comment['content'] = $request->content;
    $comment['uid']=$request->session()->get('uid');
    $cate;
    DB::table('comment')->insert($comment);
    $data = DB::table('products')->join('categoryproducts','categoryproducts.cateid','=','products.cateid')->where('products.proId','=',$product_id)->select('products.*','categoryproducts.nameCate')->get();
    foreach ($data as $key=>$item);
        $cate=$item->nameCate; 
        $name=$item->nameProduct; 
    $commentcontent = DB::table('comment')->where('idPro','=',$product_id)->get();
    $relate= DB::table('products')->join('categoryproducts','categoryproducts.cateid','=','products.cateid')->where('categoryproducts.nameCate','=',$cate)->limit(4)->select('products.*')->inRandomOrder()->get();
    return redirect()->route('chiTiet',$name);
  }
  public function destroylove(Request $request, $idPro)
  {
    
    if ($request->session()->has('uid')) {
        $cart['uid'] = $request->session()->get('uid');
        $cart['proid'] = $idPro;
        $uidCar = DB::table("wishlist")->where([['proid', '=', $idPro], ['uid', '=', $cart['uid']]])->delete();
        
    } 

	$data = DB::table('wishlist')->join('products','wishlist.proid','=','products.proId')->simplePaginate(15);
    
	//Thực hiện chuyển trang
	return view('Pages.wishlist', ['data' => $data]);
  }
  public function addWish(Request $request, $idPro)
    {
        $request->session()->put('uid', '1');

        //Session::flush();
        if ($request->session()->has('uid')) {
            $cart['uid'] = $request->session()->get('uid');
            $cart['proid'] = $idPro;
            $uidCar = DB::table("wishlist")->where([['proid', '=', $idPro], ['uid', '=', $cart['uid']]])->get();
            if ($uidCar->count()) {
                
                return "Bạn đã thêm sản phẩm này rồi" ;
            } else {
                DB::table('wishlist')->insert($cart);
                return view('Pages.detail');
            }
        } else {
            return "Chưa đăng nhập";
        }
    }

}