<?php

namespace App\Http\Controllers;

use App\Products;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;

class AdminProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function products()
    {
        $products = Products::orderBy('created_at', 'asc')->get();

        return view('mirfrance.admin.products.products', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addProduct()
    {
        return view('mirfrance.admin.products.add-product');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function postAddProduct(Request $request)
    {
        $this->validate($request, [
            'name'         => 'required',
            'price'        => 'required',
            'online'       => 'required',
            'categorie_id' => 'required'
        ]);

        $product              = new Products();
        $product->name        = $request->input('name');
        $product->ref         = $request->input('ref');
        $product->description = $request->input('description');
        $product->price       = $request->input('price');
        $product->image       = $request->input('image');

        if ( ! is_null($request->file('upload'))) {
            $imageName = $request->input('name') . rand(1, 100) . '.jpg';
            $path      = "\\imgs\\uploads\\";
            $file      = $request->file('upload');
            $file->move(public_path() . '\imgs\uploads', $imageName);
            $product->image = $path . $imageName;
        }

        $product->categorie_id = $request->input('categorie_id');
        $product->online       = $request->input('online');
        $product->created_at   = Carbon::now();
        $product->updated_at   = Carbon::now();

        $product->save();

        return redirect(action('AdminProductsController@products'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function showProduct($id)
    {
        $product = Products::find($id);

        if ( ! is_null($id)) {
            return view('mirfrance.admin.products.show-product', compact('product', 'images'));
        }

        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function editProduct($id)
    {
        $product = Products::find($id);

        if ( ! is_null($id)) {
            return view('mirfrance.admin.products.edit-product', compact('product'));
        }

        abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function postEditProduct(Request $request, $id)
    {
        $product = Products::find($id);

        if ( ! is_null($id)) {

            $this->validate($request, [
                'name'         => 'required',
                'price'        => 'required',
                'online'       => 'required',
                'categorie_id' => 'required'
            ]);

            $product->updated_at   = Carbon::now();
            $product->name         = $request->input('name');
            $product->description  = $request->input('description');
            $product->price        = $request->input('price');
            $product->ref          = $request->input('ref');
            $product->image        = $request->input('image');

            if ( ! is_null($request->file('upload'))) {
                $imageName = $request->input('name') . rand(1, 100) . '.jpg';
                $path      = "\\imgs\\uploads\\";
                $file      = $request->file('upload');
                $file->move(public_path() . '\imgs\uploads', $imageName);
                $product->image = $path . $imageName;
            }

            $product->categorie_id = $request->input('categorie_id');
            $product->online       = $request->input('online');

            $product->save();

            return redirect(action('AdminProductsController@products'));
        }

        abort(404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Products::find($id);

        if ( ! is_null($id)) {
            $product->delete();

            return redirect(action('AdminProductsController@products'));
        }

        abort(404);
    }
}
