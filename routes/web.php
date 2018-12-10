<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/EC',function(){
    $items=DB::table('items')->get();
    return view('EC',['items'=>$items]);
});
Route::get('/search',function(){
    $name=request()->get('name');
    $items=DB::table('items')->where('name','=',$name)->get();
    return view('EC',['items'=>$items]);
});
Route::post('/cart/add', function () {
    //フォームからIDを読み込みDBへ問い合わせる
    $id=request()->get("item_id");
    $items=DB::select("select * from items where id=?",[$id]);
    if(count($items)>0){
        $cartItems=session()->get("CART_ITEMS",[]);
        $cartItems[]=$items[0];
        session()->put("CART_ITEMS",$cartItems);
        return redirect("/cart");
    }else{
        return abort(404);
    }
});
Route::get("/cart",function(){
    //セッションからカートの情報を取り出す
  $cartItems=session()->get("CART_ITEMS",[]);
  $sum=0;
  foreach($cartItems as $cartItem) {
      $sum += $cartItem->price;
  }
  return view("cart",[
      "cartItems"=>$cartItems,"sum"=>$sum
  ]);
});
Route::get('/{id}', function ($id) {
    $items=DB::select("select * from items where id = ?",[$id]);
    if(count($items)>0) {
        return view('item_detail', ['items' => $items[0]
        ]);
    }else{
        return abort(404);
    }
});
Route::post("/order",function(){
    return view("order");
});
Route::get("/order/thanks",function(){
    return view("thanks");
});
Route::post("/order/complete",function(){
    $name=request()->get("name");
    $address=request()->get("address");
    $tel=request()->get("tel");
    $email=request()->get("email");
    $order=session()->get("CART_ITEMS");
    $orders=json_encode($order);
    DB::insert("insert into orders (name,address,tel,email,orders) values(?,?,?,?,?)",[
      $name,$address,$tel,$email,$orders
    ]);
    session()->forget("CART_ITEMS");//ここでカートを空にする
    return redirect("/order/thanks");
});