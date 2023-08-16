<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\Product;
use Exception;

class ProductController extends Controller
{

    public function index(): View
    {
        $viewData = [];
        $viewData["title"] = "Products - Online Store";
        $viewData["subtitle"] =  "List of products";
        $viewData["products"] = Product::all();
        return view('product.index')->with("viewData", $viewData);
    }

    public function show(string $id) : View
    {   
        try {
            $viewData = [];
            $product = Product::findOrFail($id);
            $viewData["title"] = $product["name"]." - Online Store";
            $viewData["subtitle"] =  $product["name"]." - Product information";
            $viewData["product"] = $product;
            $viewData["price"] = $product["price"];
            return view('product.show')->with("viewData", $viewData);
        }
        catch(Exception $e) {
            return redirect()->route('home.index');
        }
        
    }

    public function create(): View
    {
        $viewData = []; //to be sent to the view
        $viewData["title"] = "Create product";

        return view('product.create')->with("viewData",$viewData);
    }

    public function save(Request $request): RedirectResponse{
        $request->validate([
            "name" => "required",
            "price" => "required"
        ]);
        
        Product::create($request->only(["name","price"]));
        return back();
    }

}
?>