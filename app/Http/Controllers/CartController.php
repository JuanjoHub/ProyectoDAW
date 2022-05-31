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

            /* Variable para el carrito */
            $count = Cart::where('username',$usuario->username)->count();
            /* Variable para el redirect de la vista de pord_prev */
            $preview = DB::table('articulos')
            ->select('nombre_articulo','descripcion','precio','imagen','stock','cod_articulo')
            ->where('cod_articulo',$producto)
            ->get();

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

            /* Actualizar la cantidad en la tabla carts */
            $updatePrice = DB::table('carts')
                ->where('product_title', $cartName)
                ->update(['quantity' => $cantidad]);

            /* Actualizar el stock en la tabla articulos */
            $productStock=DB::table('articulos')
                ->select('stock')
                ->where('cod_articulo', $producto)
                ->get(); 

              foreach ($productStock as $stock) {
                  $aux = $stock->stock;
              }

            $stockTotal = $aux - (int)$request->quantity;
            // dd($stockTotal);
            //Si el stock es superior a 0 despues de hacer la operacion nos dejará realizarla, de lo contrario nos devolverá a la pagina anterior
            if ($stockTotal >0) {
                
                //Si la consulta de update no se cumple,crea un carrito nuevo en la bbdd
                if(!$updatePrice){
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
                //    dd($stockTotal);

                $updateStock = DB::table('articulos')
                ->where('cod_articulo', $producto)
                ->update(['stock' => ($stockTotal)]);

                } 
            
                return redirect()->to("/home")->with('product','Product Added to cart Successfully!');
               

            }else{

                return redirect()->to('/oftb_prev_prod')->withErrors('Not enough stock for this product');
            }

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

        $productStock=DB::table('carts')
              ->select('quantity','code')
              ->where('id', $id)
              ->get(); 

              foreach ($productStock as $stock) {
                  $quantityaux = $stock->quantity;
                  $codeaux = $stock->code;
              }
        $articuloStock=DB::table('articulos')
              ->select('stock')
              ->where('cod_articulo', $codeaux)
              ->get(); 
            

              foreach ($articuloStock as $stock) {
                  $stockaux = $stock->stock;
                  
              }      
              $stockTotal = $stockaux + (int)$quantityaux;

              $updateStock = DB::table('articulos')
              ->where('cod_articulo', $codeaux)
              ->update(['stock' => ($stockTotal)]);

        
        $data->delete();
       
        return redirect()->back()->with('cart','Item Deleted Successfully!');
     }

     

    
}
