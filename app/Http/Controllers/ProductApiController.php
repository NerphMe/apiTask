<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\Sellers;
use App\Models\UnderCategories;
use App\Models\Сategories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductApiController extends Controller
{
    public function getProducts($id)
    {
        $products = Products::where('id', $id)->with('categories', 'underCategories')->get();
        return response()->json($products);
    }

    public function getСategorys()
    {
        $categories = Сategories::selectRaw('category')->get();
        return response()->json($categories);
    }

    public function createUnderCategory(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'under_categories' => 'required|string',
            'categories_id' => 'required|int'
        ]);
        if ($validator->fails()) {
            return 'Error';
        }
        $product = UnderCategories::create($input);
        return response()->json($product, 200);
    }

    public function getUnderCategories($id)
    {
        $products = Products::where('id', $id)->with('categories', 'underCategories')->get();
        $underCategories = $products->pluck('underCategories');
        return response()->json($underCategories);
    }

    public function addSeller(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'name' => 'required|string',
            'surname' => 'required|string',
            'categories_id' => 'required|int'
        ]);
        if ($validator->fails()) {
            return 'Error';
        }
        $seller = Sellers::create($input);
        return response()->json($seller, 200);

    }

    public function changeSellerCategory(Request $request, $id)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'name' => 'nullable',
            'surname' => 'nullable',
            'categories_id' => 'required'
        ]);
        if ($validator->fails()) {
            return 'Error';
        }
        Sellers::where('id', $id)->update(['categories_id' => $input['categories_id']]);
        return response('Seller Updated');
    }

    public function removeSeller($id)
    {
        Sellers::where('id', $id)->delete();
        return response('Seller Deleted');
    }

    public function getProductsInCategories($id)
    {
        $categories = Сategories::where('product_id', $id)->with(['products' => function ($query) use ($id) {
            $query->where('id', $id);
        }])->get();
        return response()->json($categories);
    }

    public function newProduct(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'name' => 'required|string',
            'description' => 'required|string',
        ]);
        if ($validator->fails()) {
            return 'Error';
        }
        Products::create($input);
        return response('Product Added');
    }

    public function removeProduct($id)
    {
        Сategories::where('product_id', $id)->with('products')->delete();
        return response('Product Deleted From Category');
    }
}
