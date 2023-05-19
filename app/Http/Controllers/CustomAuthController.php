<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\CategoryProduct;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Type\Integer;

class CustomAuthController extends Controller
{

    public function userNew()
    {
        $users = DB::table('users')->orderByDesc('uid')->paginate(2);
        //$users = DB::table('users');
        // foreach ($users as $i) {
        //     echo 'id: '.$i."<br>";
        // }
        //echo  $users; 

        return view('admin.admin', ['users' => $users]);
    }
    public function createUser()
    {
        return view('admin.createUser');
    }

    public function customUser(Request $request)
    {
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

            )
        );
        return redirect("admin")->withSuccess('Success!');
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
        return redirect("admin")->withSuccess('Success!');
    }
    public function destroy($uid)
    {
        DB::table('users')
        ->where('uid',$uid)
        ->delete();
        return redirect("admin");
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
                'nameProduct'     =>   $request->nameProduct,
                'cateid'   =>  $request->cateid,
                'imgPro' => $request->imgPro,
                'description' => $request->description,
                'idadmin' => $request->idadmin,
                'price' => $request->price,
                'status' => $request->status,
                'salePrice' => $request ->salePrice,
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
        DB::table('products')->where('proId', $proId)->update(array(
            'nameProduct'     =>   $request->nameProduct,
            'cateid'   =>  $request->cateid,
            'description' => $request->description,
            'idadmin' => $request->idadmin,
            'price' => $request->price,
            'status' => $request->status,
            'salePrice' => $request->salePrice,
            'imgPro' => $request->imgPro,
        ));
        return redirect("product")->withSuccess('Success!');
    } 
    // Xóa sản phẩm
    public function destroyProduct($proId)
    {
        DB::table('products')
        ->where('proId',$proId)
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
                'nameCate' =>   $request->nameCate,
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
        DB::table('categoryproducts')->where('cateid', $cateid)->update(array(
            'nameCate'     =>   $request->nameCate,
        ));
        return redirect("category")->withSuccess('Success!');
    } 
    //Xóa thể loại
    public function destroyCategory($cateid)
    {
        DB::table('categoryproducts')
        ->where('cateid',$cateid)
        ->delete();
        return redirect("category");
    }
}
