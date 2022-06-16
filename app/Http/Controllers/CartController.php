<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Articulo;
use App\Models\Cart;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CartController extends Controller {
    //Función para añadir productos al carrito
    public function addcart(Request $request) {
        //Comprobamos que el usuario esta autentificado
        if (Auth::check()) {
            
            //Declaramos las variables
            $usuario = Auth::user(); //Obtenemos las credenciales del usuario y se la pasamos a la variable
            $nombreUsuario = Auth::user()->username;//En este caso solo obtenemos el username
            $producto = $request->input(key: 'cod_articulo');//le pasamos a la variable el imput del submit que viene la vista de previsualización
            $cantidad = 0;//Inicializamos variable
            $cartName = "";//Inicializamos variable

            /*Realizamos una consulta para recoger el nombre y el precio del producto
            que se encuentra en la tabla articulos para poder compararlo con los datos obtenidos en 
            otra consulta de la tabla cart*/
            $productDetails = DB::table('articulos')
                ->select('nombre_articulo', 'precio')
                ->where('cod_articulo', $producto)
                ->get();

            $name = "";
            $precio = 0.00;
            foreach ($productDetails as $p) {
                //asignamos a las variables el nombre y el precio de lel producto que se encuentra en la tabla articulos
                $name = $p->nombre_articulo;
                $precio = $p->precio;
            }

            /*Realizamos una consulta para recoger el nombre, el titulo y la cantidad dle producto
            que se encuentra en la tabla carrito para poder actualizarlo en caso de volver a añadir el mismo 
            producto*/
            $cartDetails = DB::table('carts')
                ->select('username', 'product_title', 'quantity')
                ->where('username', $nombreUsuario)
                ->get();


            foreach ($cartDetails as $c) {
                /*Si el nombre del producto que hemos añadido al carrito y hay otro producto con el mismo usuario
                unicamente se le suma la cantidad añadida de nuevo a la que tenia previamente*/
                if ($c->product_title == $name) {
                    $cartName = $c->product_title;
                    $cantidad = $c->quantity + $request->quantity;
                }
            }

            /* Actualizamos la cantidad en la tabla cart si hemos añadido el mismo producto*/
            $updatePrice = DB::table('carts')
                ->where('product_title', $cartName)
                ->update(['quantity' => $cantidad]);

            /* Realizamos una consulta para obtener el stock del producto que hemos añadido */
            $productStock = DB::table('articulos')
                ->select('stock')
                ->where('cod_articulo', $producto)
                ->get();

            foreach ($productStock as $stock) {
                //Recogemos en la variable aux el stock de la tabla articulos
                $aux = $stock->stock;
            }
            //Restamos la cantidad que hemos añadido al carrito al stock de la tabla articulos
            $stockTotal = $aux - (int)$request->quantity;
         
            //Si el stock es superior a 0 despues de hacer la operacion nos dejará realizarla, de lo contrario nos devolverá a la pagina anterior
            if ($stockTotal > 0) {

                //Si la consulta de update no se cumple,crea un carrito nuevo en la bbdd
                if (!$updatePrice) {
                    //creamos un nuevo objeto cart
                    $cart = new cart;
                    $cart->username = $usuario->username;
                    $cart->phone = $usuario->phone;
                    $cart->address = $usuario->email;
                    $cart->code = $producto;
                    $cart->product_title = $name;
                    $cart->price = $precio;
                    $cart->quantity = $request->quantity;
                    //guardamos el carrito en la BD
                    $cart->save(); 
                    //actualizamos el stock en la tabla articulos, restandole la cantidad añadida al carrito
                    $updateStock = DB::table('articulos')
                        ->where('cod_articulo', $producto)
                        ->update(['stock' => ($stockTotal)]);
                }
                //Redirigimos a la vista Home con un el mensaje correspondiente
                return redirect()->to("/home")->with('product', 'Product Added to cart Successfully!');
            } else {
                //Redirigimos a la vista '/oftb_prev_prod con un mensaje de error
                return redirect()->to('/oftb_prev_prod')->withErrors('Not enough stock for this product');
            }
        } else {
            //Si el usuario no esta autentificado se le redigirá automáticamente a la vista de login
            return view('Authenticated.oftb_login');
        }
    }

    public function show() {
        //Comprobamos que el usuario este autentificado
        if(Auth::check()) {
        //Obtenemos las credenciales del usuario
        $user = Auth::user(); 
        //Realizamos una consulta para obtener el numero de articulos que tiene el usuario en la tabla cart
        $count = Cart::where('username', $user->username)->count();
        //Realizamos una consulta para obtener los datos de los productos que el usuario tiene en el carrito
        $cartDetails = DB::table('carts')
            ->select('id', 'product_title', 'quantity', 'price')
            ->where('username', $user->username)
            ->get();
        //Se devuelve un return a la vista 'showcart' junto con las variables correspondientes
        return view('showcart', ['quantityCard' => $count, 'userCart' => $cartDetails]);

        }
        //Si el usuario no esta autentificado se le redirige a la vista '/home'
        return redirect()->to("/home");
    }

    //Funcion para borrar un producto del carrito y actualizar el stock 
    public function deletecart($id){

        //Obtenemos la id del producto del carrito que queremos borrar
        $data = Cart::find($id);
        
        //Realizo la primera consulta para obtener el stock del articulo que voy a borrar del carrito
        $productStock = DB::table('carts')
            ->select('quantity', 'code')
            ->where('id', $id)
            ->get();

        foreach ($productStock as $stock) {
            $quantityaux = $stock->quantity; //asigno a la variable la cantidad correspondiente al arituclo en el carrito
            $codeaux = $stock->code;         //asigno a la variable el codigo del producto
        }

        //Realizo la segunda consulta para obtener el stock real de la tabla articulos
        $articuloStock = DB::table('articulos')
            ->select('stock')
            ->where('cod_articulo', $codeaux)
            ->get();


        foreach ($articuloStock as $stock) {
            $stockaux = $stock->stock; //asigno a la variable el stock del producto de la tabla articulos
        }
        $stockTotal = $stockaux + (int)$quantityaux;// sumo la variable del stock de la tabla cart a la variable perteneciente al stock de la tabla articulos

        //actualizo el stock en la tabla articulos justo antes de borrar el producto del carrito.
        $updateStock = DB::table('articulos')
            ->where('cod_articulo', $codeaux)
            ->update(['stock' => ($stockTotal)]);

        //Borramos el producto del carrito
        $data->delete();
        //redirigimos a la vista cart con el mensaje correspondiente.
        return redirect()->back()->with('cart', 'Item Deleted Successfully!');
    }
}
