<?php
namespace App\Http\Controllers\Participant;

use App\Models\Bilet;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShoppingController extends Controller
{
    // public function index()
    // {
    //     $bielte = Bilet::all();
    //     return view('bilet', compact('products'));
    // } 

    public function cart()
    {
        return view('participant.cart');
    }

    public function addToCart($id)
    {
        $bilet = Bilet::find($id);
        if (!$bilet) {
            abort(404);
        }
        $cart = session()->get('cart');
        // dacă cart este gol se pune primul product
        if (!$cart) {
            $cart = [
                $id => [
                    "eveniment" => $bilet->eveniment->titlu,
                    "tip" => $bilet->tip,
                    "quantity" => 1,
                    "pret" => $bilet->pret,
                ]
            ];
            session()->put('cart', $cart);
            return redirect('/cart');
        }
 if (isset($cart[$id])) {
     $cart[$id]['quantity']++;
     session()->put('cart', $cart);
 }
 // daca item nu exista in cos at addaugam la cos cu quantity = 1
 $cart[$id] = [
    "eveniment" => $bilet->eveniment->titlu,
    "quantity" => 1,
    "pret" => $bilet->pret,
    "tip" => $bilet->tip,
 ];
 session()->put('cart', $cart);
return redirect('/cart');
 }

    public function update(Request $request)
    {
        if ($request->id and $request->quantity) {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cos modificat cu succes');
        }
    }

    public function remove(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product sters cu succes!');
        }
    }
}
