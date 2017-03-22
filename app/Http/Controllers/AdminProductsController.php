<?php

namespace App\Http\Controllers;

use App\Products;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;

class AdminProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function products(Request $request)
    {
        $search = $request->input('contactSearch');

        if(is_null($search)) {
            $products = Products::all()->sortBy('created_at');
        }
        else {
            $products = Products::where('name','like','%'.$search.'%')
                ->orWhere('ref','like','%'.$search.'%')->orderBy('created_at')->get();
        }

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
            'ref'          => 'required',
        ]);

        $product              = new Products();
        $product->name        = $request->input('name');
        $product->ref         = $request->input('ref');
        $product->available   = $request->input('available');
        $product->expedited   = $request->input('expedited');

        if ( ! is_null($request->file('upload'))) {
            $imageName = $request->input('name') . rand(1, 100) . '.jpg';
            $path      = "\\imgs\\uploads\\";
            $file      = $request->file('upload');
            $file->move(public_path() . '\imgs\uploads', $imageName);
            $product->image = $path . $imageName;
        }

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
                'ref'          => 'required',
            ]);

            $product->updated_at   = Carbon::now();
            $product->name         = $request->input('name');
            $product->ref          = $request->input('ref');
            $product->available    = $request->input('available');
            $product->expedited    = $request->input('expedited');

            if ( ! is_null($request->file('upload'))) {
                $imageName = $request->input('name') . rand(1, 100) . '.jpg';
                $path      = "\\imgs\\uploads\\";
                $file      = $request->file('upload');
                $file->move(public_path() . '\imgs\uploads', $imageName);
                $product->image = $path . $imageName;
            }

            $product->save();

            return redirect(action('AdminProductsController@products'));
        }

        abort(404);
    }


    public function expeditProduct($id)
    {
        $product = Products::find($id);

        if ( ! is_null($id)) {

            if ( $product->available == 1) {
                $product->expedited  = 1;
                $product->available  = 0;
                $product->updated_at = carbon::now();
                $product->save();
            }
            else {
                $product->expedited  = 0;
                $product->available  = 1;
                $product->updated_at = carbon::now();
                $product->save();
            }

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
    public function destroyProduct($id)
    {
        $product = Products::find($id);

        if ( ! is_null($id)) {

            return view('mirfrance.admin.products.delete-product', compact('product'));
        }

        abort(404);
    }

    public function postDestroyProduct($id, Request $request)
    {
        $product = Products::find($id);

        if ( ! is_null($id)) {

            $product->delete();

            Session::flash('flash_message', 'Le produit a bien été supprimée');

            return redirect(action('AdminProductsController@products'));
        }

        abort(404);
    }
}
