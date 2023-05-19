<?php

namespace App\Http\Controllers;

use Carbon\Exceptions\EndLessPeriodException;
use Illuminate\Http\Request;
use Hash;
use Session;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Category;
use App\Models\CategoryProduct;
use App\Models\Product;
use App\Models\User;

use App\Models\favourite;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Ramsey\Uuid\Type\Integer;




class CustomAuthController extends Controller
{

    public function userNew()
    {
        $users = DB::table('users')->orderByDesc('uid')->where('users.type', '=', 0)->paginate(2);
        return view('admin.userNew', ['users' => $users]);
    }
    public function index()
    {
        return view('Pages.login');
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
    public function createUser()
    {
        return view('admin.createUser');
    }
    public function registration()
    {

        return view('admin.createUser');
    }


    public function customUser(Request $request){
        $request->validate([
            'username' => 'required',
            'fullname' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'phone' => 'required',
            'moneyaccount' => 'required',
            'avatar' => 'required',


        ]);
        DB::table('users')->insert(
            array(
                'username'     =>   $request->username,
                'fullname'   =>  $request->fullname,
                'email' => $request->email,
                'password' => $request->password,
                'phone' => $request->phone,
                'moneyaccount' => $request->moneyaccount,
                'avatar' => $request->avatar,
                'type'=>0
            )
        );
        return redirect("user-New")->withSuccess('Success!');
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
    public function getAll()
    {
        $data = DB::table('products')->simplePaginate(15);
        return view('Pages.allgames', ['data' => $data]);
    }
    public function addCart(Request $request, $idPro)
    {
        $data2 = DB::table('users')->get();
        foreach ($data2 as $key => $value) {
           if($value->email==$request->email)
           {
            $request->session()->put('uid', $value->uid);
           }
        }
        //Session::flush();
        if ($request->session()->has('uid')) {
            $cart['uid'] = $request->session()->get('uid');
            $cart['proid'] = $idPro;
            $uidCar = DB::table("cart")->where([['proid', '=', $idPro], ['uid', '=', $cart['uid']]])->get();
            if ($uidCar->count()) {
                return "Bạn đã thêm sản phẩm này rồi";
            } else {
                DB::table('cart')->insert($cart);
                return "Thêm thành công";
            }
        } else {
            return "Chưa đăng nhập";
        }
    }
    public function getTopGames()
    {
        $data = DB::table('topsell')->join('products', 'topsell.idTopSell', '=', 'products.proId')->simplePaginate(15);
        return view('Pages.topgames', ['data' => $data]);
    }
    public function getNewGames()
    {
        $data = DB::table('products')->orderBy('proId', 'desc')->limit(20)->simplePaginate(15);
        return view('Pages.newgame', ['data' => $data]);

    }
    public function getSaleGames()
    {
        $data = DB::table('products')->where('products.salePrice', '>', 0)->simplePaginate(15);
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
        $comment = DB::table('comment')->join('users','users.uid','=','comment.uid')->where('idPro','=',$idpro)->get();
        $relate= DB::table('products')->join('categoryproducts','categoryproducts.cateid','=','products.cateid')->where('categoryproducts.nameCate','=',$cate)->limit(4)->select('products.*')->inRandomOrder()->get();
        return view('Pages.detail', ['data' => $data,'relate'=>$relate,'comment'=>$comment]);
    }
    public function viewCart(Request $request)
    {
        $data2 = DB::table('users')->get();
            foreach ($data2 as $key => $value) {
               if($value->email==$request->email)
               {
                $request->session()->put('uid', $value->uid);
               }
            }

        //Session::flush();
        if ($request->session()->has('uid')) {
            $sum = 0;
            $data = DB::table('products')->join('cart', 'products.proid', '=', 'cart.proid')
                ->where('cart.uid', '=', $request->session()->get('uid'))->get();
            foreach ($data as $key => $value) {
                $sum += $value->price * (100 - $value->salePrice) / 100;
            }
            return view('Pages.cart', [
                'data' => $data,
                'count' => $data->count(),
                'sum' => $sum
            ]);
        } else {
            return view('login');
        }
    }
    public function viewHistory(Request $request)
    {
        $data2 = DB::table('users')->get();
            foreach ($data2 as $key => $value) {
               if($value->email==$request->email)
               {
                $request->session()->put('uid', $value->uid);
               }
            }
        $sum = 0;
        $data['bill'] = DB::table('bill')
            ->where('bill.uid', '=', $request->session()->get('uid'))->get();
        $data['chiTiet'] = DB::table('detailbill')
            ->join('bill', 'detailbill.idbill', '=', 'bill.idbill')
            ->join('products', 'detailbill.proid', '=', 'products.proid')
            ->where('bill.uid', '=', $request->session()->get('uid'))->get();
        return view('Pages.history', ['data' => $data]);
        $data = $request->all();
        $check = $this->create($data);
        return redirect("login")->withSuccess('You have signed-in');
    }

    public function getCatePro($id)
    {
        $data = DB::table('products')->join('categoryproducts', 'categoryproducts.cateid', '=', 'products.cateid')->where('categoryproducts.nameCate', '=', $id)->simplePaginate(15);
        return view('Pages.catepro', ['data' => $data]);
    }
    public function Searchpro(Request $request)
    {
        $name = $request->input('search');
        $filterData = DB::table('products')->where('products.nameProduct', 'LIKE', '%' . $name . '%')->simplePaginate(15);
        $count = count($filterData);
        if ($count == 0) {
            echo "<script type='text/javascript'>alert('Không tìm thấy sản phẩm');</script>";
            return view('Pages.welcome');
        } else {
            return view('Pages.searchProduct', ['data' => $filterData]);
        }
    }
    public function users()
    {
        $user = DB::table('users')->simplePaginate(2);
        return view('auth.users', ["user" => $user]);
    }
    public function image()
    {
        $image = DB::table('users')->select('image')->get();
        return view('auth.image', [
            "image" => $image,
            'phone' => 'required',
            'moneyaccount' => 'required',
            'avatar' => 'required',
        ]);
    }

    public function editUser($uid)
    {
        $user = User::find($uid);
        return view("admin.editUser", compact('user'));
    }

    public function update(Request $request, $uid)
    {

       DB::table('users')->where('uid', $uid)->update(array(
            'username'     =>   $request->username,
            'fullname'   =>  $request->fullname,
            'email' => $request->email,
            'password' => $request->password,
            'phone' => $request->phone,
            'moneyaccount' => $request->moneyaccount,
            'avatar' => $request->avatar,
        ));
        return redirect("user-New")->withSuccess('Success!');
    }
    public function destroy($uid)
    {
        DB::table('users')
            ->where('uid', $uid)
            ->delete();
        return redirect('user-New');
    }
    public function topSell()
    {
        $product = DB::table('products')
            ->join('topsell', 'topsell.proid', '=', 'products.proId')
            ->paginate(4);
        return view('admin.topsell', ['product' => $product]);
    }
    public function search(Request $request)
    {
        
        $search = $request->input('search');

        $products = DB::table('products')
            ->where('nameProduct', 'like', '%' . $search . '%')
            ->paginate(4);
        return view('admin.searchProduct', compact('products', 'search'))->withInput($request->all());
    }
    
    public function statistics(Request $request)
    {
        $month = $request->input('month');
        $year = $request->input('year');

        $products = DB::table('products')
            ->join('topsell', 'products.proId', '=', 'topsell.proid')
            ->where('topsell.monthstatisticalsell', '=', $month)
            ->where('topsell.yearstatisticalsell', '=', $year)
            ->get();
        return view('admin.productStatistics', compact('products'));
    }
    //Hiển thị sản phẩm
    public function productNew()
    {
        $users = DB::table('products')->orderByDesc('proId')->paginate(25);
        //$users = DB::table('users');
        // foreach ($users as $i) {
        //     echo 'id: '.$i."<br>";
        // }
        //echo  $users; 
        return view('admin.product', ['products' => $users]);
    }
    //Thêm sản phẩm
    public function createProduct()
    {
        return view('admin.createProduct');
    }
    //Chức năng thêm sản phẩm
    public function customProduct(Request $request)
    {
        echo 'heloo';
        $request->validate([
            'nameProduct' => 'required',
            'cateid' => 'required',
            'description' => 'required',
            'idadmin' => 'required',
            'price' => 'required',
            'status' => 'required',
            'salePrice' => 'required',
            'imgPro' => 'required',
        ]);
        DB::table('products')->insert(
            array(
                'nameProduct' => $request->nameProduct,
                'cateid' => $request->cateid,
                'imgPro' => $request->imgPro,
                'description' => $request->description,
                'idadmin' => $request->idadmin,
                'price' => $request->price,
                'status' => $request->status,
                'salePrice' => $request->salePrice,
            )
        );
        return redirect("product")->withSuccess('Success!');
    }
    // Sửa sản phẩm
    public function editProduct($proId)
    {
        $proId = Product::find($proId);
        return view("admin.editProduct", compact('proId'));
    }
    // Sửa sản phẩm
    public function updateProduct(Request $request, $proId)
    {
        DB::table('products')->where('proId', $proId)->update(
            array(
                'nameProduct' => $request->nameProduct,
                'cateid' => $request->cateid,
                'description' => $request->description,
                'idadmin' => $request->idadmin,
                'price' => $request->price,
                'status' => $request->status,
                'salePrice' => $request->salePrice,
                'imgPro' => $request->imgPro,
            )
        );
        return redirect("product")->withSuccess('Success!');
    }
    // Xóa sản phẩm
    public function destroyProduct($proId)
    {
        DB::table('products')
            ->where('proId', $proId)
            ->delete();
        return redirect("product");
    }
    //Hiển thị thể loại
    public function categoryNew()
    {
        $category = DB::table('categoryproducts')->orderBy('cateid')->paginate(10);
        //$users = DB::table('users');
        // foreach ($users as $i) {
        //     echo 'id: '.$i."<br>";
        // }
        //echo  $users; 
        return view('admin.category', ['categoryproducts' => $category]);
    }
    //Thêm thể loại
    public function createCategory()
    {
        return view('admin.createCategory');
    }
    //Thêm thể loại
    public function customCategory(Request $request)
    {
        $request->validate([
            'nameCate' => 'required',
        ]);
        DB::table('categoryproducts')->insert(
            array(
                'nameCate' => $request->nameCate,
            )
        );
        return redirect("category")->withSuccess('Success!');
    }
    //Sửa thể loại
    public function editCategory($cateid)
    {
        $cateid = Categoryproduct::find($cateid);
        return view("admin.editCategory", compact('cateid'));
    }
    //Sửa thể loại
    public function updateCategory(Request $request, $cateid)
    {
        DB::table('categoryproducts')->where('cateid', $cateid)->update(
            array(
                'nameCate' => $request->nameCate,
            )
        );
        return redirect("category")->withSuccess('Success!');
    }
    //Xóa thể loại
    public function destroyCategory($cateid)
    {
        DB::table('categoryproducts')
            ->where('cateid', $cateid)
            ->delete();
        return redirect("category");

    }


    public function DeleteItemCart(Request $request, $idPro)
    {
        DB::table('cart')
            ->where([['proid', '=', $idPro], ['uid', '=', $request->session()->get('uid')]])
            ->delete();
        $data = DB::table('products')->join('cart', 'products.proid', '=', 'cart.proid')
            ->where('cart.uid', '=', $request->session()->get('uid'))->get();
        return view('Pages.cartList', ['data' => $data]);
    }
    public function ViewUser(Request $request)
    {
        $data = DB::table('users')
            ->where('uid', '=', $request->session()->get('uid'))->first();
        return view('Pages.user', ['data' => $data]);
    }
    public function updateUser(Request $request)
    {
        $data = $request->all();
        $update['fullname'] = $data['fullname'];
        $update['email'] = $data['email'];
        $update['phone'] = $data['phone'];
        DB::table('users')->where('uid', '=', $request->session()->get('uid'))->update($update);
        $data = DB::table('users')
            ->where('uid', '=', $request->session()->get('uid'))->first();
        return view('Pages.user', ['data' => $data, 'thongBao' => "Cập nhật thành công"]);
    }
    public function PayCart(Request $request)
    {
        $sum = 0;
        $data2 = DB::table('users')->get();
            foreach ($data2 as $key => $value) {
               if($value->email==$request->email)
               {
                $request->session()->put('uid', $value->uid);
               }
            }
        $user = DB::table('users')
            ->where('uid', '=', $request->session()->get('uid'))->first();
        $data = DB::table('products')->join('cart', 'products.proid', '=', 'cart.proid')
            ->where('cart.uid', '=', $request->session()->get('uid'))->get();
        foreach ($data as $key => $value) {
            $sum += $value->price * (100 - $value->salePrice) / 100;
        }
        $money = $user->moneyaccount;
        if ($money > $sum) {
            $bill['uid'] = $request->session()->get('uid');
            $dd = DB::table('bill')->insert($bill);
            $last_record = DB::table('bill')->latest('datesell')->first();
            foreach ($data as $key => $value) {
                $detailbill['idbill'] = $last_record->idbill;
                $detailbill['proid'] = $value->proid;
                DB::table('detailbill')->insert($detailbill);
                DB::table('cart')
                    ->where([['proid', '=', $value->proid], ['uid', '=', $request->session()->get('uid')]])
                    ->delete();
            }
            $moneyUpdate['moneyaccount'] = $money - $sum;
            DB::table('users')->where('uid', '=', $request->session()->get('uid'))->update(
                $moneyUpdate
            );
            $data1 = DB::table('products')->join('cart', 'products.proid', '=', 'cart.proid')
                ->where('cart.uid', '=', $request->session()->get('uid'))->get();
            $bill['uid'] = $request->session()->get('uid');
            $sum = 0;
            $count = 0;
            return view('Pages.cart', ['data' => $data1, 'sum' => $sum, 'count' => $count]);
        } else {
            return "Bạn không đủ tiền để mua";
        }
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
    

  public function getFavourite()
  {
    $data = DB::table('wishlist')->join('products','products.proId','=','wishlist.proid')->simplePaginate(15);;
    return view('Pages.wishlist', ['data' => $data]);
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
  public function addWish(Request $request, $idPro)
    {
        $data2 = DB::table('users')->get();
        foreach ($data2 as $key => $value) {
           if($value->email==$request->email)
           {
            $request->session()->put('uid', $value->uid);
           }
        }
        //Session::flush();
        if ($request->session()->has('uid')) {
            $cart['uid'] = $request->session()->get('uid');
            $cart['proid'] = $idPro;
            $uidCar = DB::table("wishlist")->where([['proid', '=', $idPro], ['uid', '=', $cart['uid']]])->get();
            if ($uidCar->count()) {
                
                return "Bạn đã thêm sản phẩm này rồi" ;
            } else {
                DB::table('wishlist')->insert($cart);
                $data = DB::table('products')->join('categoryproducts','categoryproducts.cateid','=','products.cateid')->where('products.proId','=',$idPro)->select('products.*','categoryproducts.nameCate')->get();
                $cate;
                $idpro;
                foreach ($data as $key=>$item);
                        $cate=$item->nameCate;
                        $idpro=$item->proId;
                $comment = DB::table('comment')->where('idPro','=',$idpro)->get();
                $relate= DB::table('products')->join('categoryproducts','categoryproducts.cateid','=','products.cateid')->where('categoryproducts.nameCate','=',$cate)->limit(4)->select('products.*')->inRandomOrder()->get();
                return view('Pages.detail', ['data' => $data,'relate'=>$relate,'comment'=>$comment]);
            }
        } else {
            return "Chưa đăng nhập";
        }
    }

}