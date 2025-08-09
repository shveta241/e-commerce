<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index() { return Product::all(); }

    public function store(Request $request) {
        $user = Auth::user();
        if (! $user || ! $user->is_admin) return response()->json(['message'=>'Forbidden'],403);
        $data = $request->validate(['name'=>'required','price'=>'required|numeric','description'=>'nullable','stock_quantity'=>'required|integer']);
        return Product::create($data);
    }

    public function update(Request $request, Product $product) {
        $user = Auth::user();
        if (! $user || ! $user->is_admin) return response()->json(['message'=>'Forbidden'],403);
        $product->update($request->all());
        return $product;
    }

    public function destroy(Product $product) {
        $user = Auth::user();
        if (! $user || ! $user->is_admin) return response()->json(['message'=>'Forbidden'],403);
        $product->delete();
        return response()->noContent();
    }
}
