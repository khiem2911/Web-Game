<?php

namespace App\Http\Controllers;

use Carbon\Exceptions\EndLessPeriodException;
use Illuminate\Http\Request;
use Hash;
use Session;
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
    public function addCart(Request $request, $idPro)
    {
        $request->session()->put('uid', '1');

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
        $data = DB::table('products')->join('categoryproducts', 'categoryproducts.cateid', '=', 'products.cateid')->where('products.nameProduct', '=', $id)->select('products.*', 'categoryproducts.nameCate')->get();
        foreach ($data as $key => $item)
            ;
        $cate = $item->nameCate;
        $relate = DB::table('products')->join('categoryproducts', 'categoryproducts.cateid', '=', 'products.cateid')->where('categoryproducts.nameCate', '=', $cate)->limit(4)->select('products.*')->inRandomOrder()->get();
        return view('Pages.detail', ['data' => $data, 'relate' => $relate]);

    }
    public function viewCart(Request $request)
    {
        $request->session()->put('uid', '1');

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
        $request->session()->put('uid', '1');
        $sum = 0;
            $data = DB::table('detailbill')
            ->join('bill', 'detailbill.idbill', '=', 'bill.idbill')
            ->join('products', 'detailbill.proid', '=', 'products.proid')
                ->where('bill.uid', '=', $request->session()->get('uid'))->get();
                return view('Pages.history',[$data]);
    }

    public function getCatePro($id)
    {
        $data = DB::table('products')->join('categoryproducts', 'categoryproducts.cateid', '=', 'products.cateid')->where('categoryproducts.nameCate', '=', $id)->simplePaginate(15);
        return view('Pages.catepro', ['data' => $data]);
    }
    public function customRegistration(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'confirmpass' => 'required|same:password',
            'image' => 'required'
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
            'image' => $data['image']
        ]);
    }



    public function signOut()
    {
        Session::flush();
        Auth::logout();

        return Redirect('login');
    }
    public function users()
    {
        $user = DB::table('users')->simplePaginate(2);
        return view('auth.users', ["user" => $user]);
    }
    public function image()
    {
        $image = DB::table('users')->select('image')->get();
        return view('auth.image', ["image" => $image]);
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
        return view('Pages.user', ['data' => $data,'thongBao'=>"Cập nhật thành công"]);
    }

    public function PayCart(Request $request)
    {
        $sum = 0;
        $request->session()->put('uid', '1');
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
            DB::table('bill')->insert($bill);
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
}