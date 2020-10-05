<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\products;
use DB;

class ProductController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('Products.main');
    }

    public function addBanking()
    {
        $categories = DB::table('categories')->where('types_id', '=', '3')->get();
        return view('Products.create', ['value' => $categories, 'type' => '3']);
    }

    public function addElectronic()
    {
        $categories = DB::table('categories')->where('types_id', '=', '4')->get();
        return view('Products.create', ['value' => $categories, 'type' => '4']);
    }

    public function createBanking(Request $request)
    {
        $product = new products;
        $product->productNumber = $request->number;
        $product->serialNumber = $request->serial;
        $product->location = $request->location;
        $product->status = $request->status;
        $product->categories_id = $request->category;
        $product->save();
        return redirect()->route('BankingProducts')->with('success', 'Created Successfuly');
    }

    public function createElectronic(Request $request)
    {
        $product = new products;
        $product->productNumber = $request->number;
        $product->serialNumber = $request->serial;
        $product->location = $request->location;
        $product->status = $request->status;
        $product->categories_id = $request->category;
        $product->save();
        return redirect()->route('ElectronicProducts')->with('success', 'Created Successfuly');
    }

    public function dataBankingList()
    {
        $ProductsJoin = DB::table('products')
            ->join('categories', 'products.categories_id', '=', 'categories.id')
            ->join('types', 'categories.types_id', '=', 'types.id')
            ->select('products.*', 'types.typename', 'categories.Categoryname')
            ->where('types.typename', '=', 'banking')
            ->get();
        return view('products.data', ['products' => $ProductsJoin, 'type' => '3']);
    }

    public function dataElectronicList()
    {
        $ProductsJoin = DB::table('products')
            ->join('categories', 'products.categories_id', '=', 'categories.id')
            ->join('types', 'categories.types_id', '=', 'types.id')
            ->select('products.*', 'types.typename', 'categories.Categoryname')
            ->where('types.typename', '=', 'electronic')
            ->get();
        return view('products.data', ['products' => $ProductsJoin, 'type' => '4']);
    }

    public function editBanking($id)
    {
        $products = products::find($id);
        $categories = DB::table('categories')->where('types_id', '=', '3')->get();
        if (!$products) {
            dd('not found');
        }
        return view('products.edit', ['products' => $products, 'value' => $categories, 'type' => '3']);
    }

    public function updateBanking(Request $request, $id)
    {
        $product = products::find($id);
        $product->productNumber = $request->number;
        $product->serialNumber = $request->serial;
        $product->location = $request->location;
        $product->status = $request->status;
        $product->categories_id = $request->category;
        $product->save();
        return redirect()->route('BankingProducts')->with('success', 'Updated Successfuly');
    }

    public function updateElectronic(Request $request, $id)
    {
        $product = products::find($id);
        $product->productNumber = $request->number;
        $product->serialNumber = $request->serial;
        $product->location = $request->location;
        $product->status = $request->status;
        $product->categories_id = $request->category;
        $product->save();
        return redirect()->route('ElectronicProducts')->with('success', 'Updated Successfuly');
    }

    public function deleteBanking($id)
    {
        $product = products::find($id);
        $product->delete();
        return redirect()->route('BankingProducts')->with('success', 'Deleted Successfuly');
    }

    public function deleteElectronic($id)
    {
        $product = products::find($id);
        $product->delete();
        return redirect()->route('ElectronicProducts')->with('success', 'Deleted Successfuly');
    }
}
