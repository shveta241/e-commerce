<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\CartItem;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index() {
        return CartItem::with('product')->where('user_id', Auth::id())->get();
    }

    public function store(Request $request) {
        $request->validate(['product_id'=>'required|exists:products,id','quantity'=>'required|integer|min:1']);
        $item = CartItem::updateOrCreate(
            ['user_id'=>Auth::id(),'product_id'=>$request->product_id],
            ['quantity'=>$request->quantity]
        );
        return $item;
    }

    public function destroy(CartItem $cartItem) {
        if ($cartItem->user_id !== Auth::id()) return response()->json(['message'=>'Forbidden'],403);
        $cartItem->delete();
        return response()->noContent();
    }
}
