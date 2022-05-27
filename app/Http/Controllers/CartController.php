<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Articulo;
use App\Models\Cart;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
class CartController extends Controller
{
     // Carrito
     public function addcart(Request $request) {


        if (Auth::check()) {

            //  $idUsuario = Auth::user()->id;
            $usuario = Auth::user();
            $nombreUsuario = Auth::user()->username;
            $producto = $request->input(key: 'cod_articulo');
            $cantidad = 0;
            $cartName ="";
            // $product = Articulo::where('cod_articulo','=', $producto);
            $productDetails=DB::table('articulos')
            ->select('nombre_articulo', 'precio')
            ->where('cod_articulo', $producto)
            ->get();

            $name = "";
            $precio = 0.00;
            foreach ($productDetails as $p) {
             
                $name = $p->nombre_articulo;
                $precio = $p->precio;
                
            }
          
            $cartDetails=DB::table('carts')
            ->select('username','product_title','quantity')
            ->where('username', $nombreUsuario)
            ->get();

          
            foreach ($cartDetails as $c) {
             
                if($c->product_title == $name){
                   $cartName = $c->product_title; 
                   $cantidad = $c->quantity + $request->quantity;
                }
            }


            $updatePrice = DB::table('carts')
              ->where('product_title', $cartName)
              ->update(['quantity' => $cantidad]);
            
            if(!$updatePrice){//Si la consulta de update no se cumple,crea un carrito nuevo en la bbdd
                //creamos el carrito
                $cart = new cart;
                // $cart->id = $idUsuario;
                $cart->username = $usuario->username;
                $cart->phone = $usuario->phone;
                $cart->address = $usuario->email;
                $cart->code = $producto;
                $cart->product_title = $name;
                $cart->price = $precio;
                $cart->quantity = $request->quantity;
                $cart->save();
            } 
           


            Log::info('Product Added Successfully');

            return redirect("/login")->with('message','Product Added Successfully');
           

        } else {
            return view('Authenticated.oftb_login');
        }

    }

    public function show() {

        $user = Auth::user();
        $count = Cart::where('username',$user->username)->count();
        $cartDetails=DB::table('carts')
        ->select('id','product_title','quantity','price')
        ->where('username', $user->username)
        ->get();
        // dd($cartDetails);
    
         return view('showcart', ['quantityCard' => $count , 'userCart'=>$cartDetails]); 
          
     }


     public function deletecart($id){

        $data=Cart::find($id);
        $data->delete();

        return redirect()->back();
     }

     

    
}
