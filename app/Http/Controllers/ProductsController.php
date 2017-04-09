<?php

namespace App\Http\Controllers;

use App\Products;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use Validator;

class ProductsController extends Controller
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

        $countAvailable = Products::where('available', 1)->count();
        $countExpedited = Products::where('expedited', 1)->count();

        if(is_null($search)) {
            $products = Products::all()->sortBy('created_at');
        }
        else {
            $products = Products::where('name','like','%'.$search.'%')
                ->orWhere('ref','like','%'.$search.'%')->orderBy('created_at')->get();
        }

        return view('products.products', compact('products', 'countAvailable', 'countExpedited'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addProduct()
    {
        return view('products.add-product');
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
            'nameSelect'         => 'required_without:name',
            'ref'          => 'required',
            'name'        => 'required_without:nameSelect'
        ]);

        $product              = new Products();
        if ( empty($request->input('nameSelect')) ) {
            $product->name        = $request->input('name');
        } else {
            $product->name        = $request->input('nameSelect');
        }
        $product->ref         = $request->input('ref');
        if (is_null($request->input('available'))) {
            $product->available = 0;
        } else {
            $product->available   = 1;
            $product->expedited = 0;
        }
        if (is_null($request->input('expedited'))) {
            $product->expedited = 0;
        } else {
            $product->expedited   = 1;
            $product->available = 0;
        }

        $img  = null;

        $files = scandir(base_path() . '/public/imgs/uploads');
        foreach($files as $file) {
            $name = substr($file, 0, -4);
            if ($product->name == $name) {
                $img = '\\imgs\\uploads\\' . $file;
            }
        }

        if ( ! is_null($request->file('upload'))) {
            $imageName = $product->name . '.png';
            $path      = '\\imgs\\uploads\\';
            $file      = $request->file('upload');
            $file->move(base_path() . '/public/imgs/uploads/', $imageName);
            $img = $path . $imageName;
        }

        $product->image = $img;
        $product->created_at   = Carbon::now();
        $product->updated_at   = Carbon::now();

        $product->save();

        return redirect(action('ProductsController@products'));
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
            return view('products.show-product', compact('product', 'images'));
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
            return view('products.edit-product', compact('product'));
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
                'nameSelect'         => 'required_without:name',
                'ref'          => 'required',
                'name'        => 'required_without:nameSelect'
            ]);

            $product->updated_at = Carbon::now();
            if ( empty($request->input('nameSelect')) ) {
                $product->name        = $request->input('name');
            } else {
                $product->name        = $request->input('nameSelect');
            }
            $product->ref         = $request->input('ref');
            if (is_null($request->input('available'))) {
                $product->available = 0;
            } else {
                $product->available   = 1;
                $product->expedited = 0;
            }
            if (is_null($request->input('expedited'))) {
                $product->expedited = 0;
            } else {
                $product->expedited   = 1;
                $product->available = 0;
            }

            $img  = null;

            $files = scandir(base_path() . '/public/imgs/uploads');
            foreach($files as $file) {
                $name = substr($file, 0, -4);
                if ($product->name == $name) {
                    $img = '\\imgs\\uploads\\' . $file;
                }
            }

            if ( ! is_null($request->file('upload'))) {
                $imageName = $product->name . '.png';
                $path      = '\\imgs\\uploads\\';
                $file      = $request->file('upload');
                $file->move(base_path() . '/public/imgs/uploads/', $imageName);
                $img = $path . $imageName;
            }

            $product->image = $img;
            $product->save();

            return redirect(action('ProductsController@products'));
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

            return redirect(action('ProductsController@products'));
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

            return view('products.delete-product', compact('product'));
        }

        abort(404);
    }

    public function postDestroyProduct($id, Request $request)
    {
        $product = Products::find($id);

        if ( ! is_null($id)) {

            $product->delete();

            Session::flash('flash_message', 'Le produit a bien été supprimée');

            return redirect(action('ProductsController@products'));
        }

        abort(404);
    }

    public function showStatus(Request $request)
    {
        $php = file_get_contents('php://input');

        $json = json_decode($php, true);

        if($json !== false && is_array($json)) {

            if(array_key_exists('serial_number', $json)) {

                if (substr($json['serial_number'], 0, 3) == "A23") {
                    $product = Products::where('ref', $json['serial_number'])->get()->first();

                    if ( is_null($product)) {
                        return ['status' => 0];
                    }
                    else {
                        if ($product->available == 1) {
                            return ['status' => 1];
                        }
                        elseif ($product->expedited ==  1) {
                            return ['status' => 2];
                        }
                        return ['status' => -1];
                    }
                }
                else {
                    return ['status' => '3'];
                }

            }
        }

        return ['error' => 'Invalid request']; // 0 = Reserved to Android app
    }

    public function changeStatus(Request $request) {

        $php = file_get_contents('php://input');

        $json = json_decode($php, true);

        if($json !== false && is_array($json)) {

            if (array_key_exists('serial_number', $json) && array_key_exists('action', $json)) {

                $product = Products::where('ref', $json['serial_number'])->get()->first();

                if( is_null($product)) {

                    $id = substr($json['serial_number'], 0, 6);

                    if ($id == "A23-X.") {
                        $name = "Spirotel";
                        $img  = '\imgs\uploads\Spirotel.png';
                    }
                    elseif ($id == "A23-0Y") {
                        $name = "Spirobank";
                        $img  = '\imgs\uploads\SpirobankII.png';
                    }
                    elseif ($id == "A23-0W") {
                        $name = "Spirodoc";
                        $img  = '\imgs\uploads\Spirodoc.png';
                    }
                    else {
                        $name = " ";
                        $img  = null;
                    }

                    $produit = new Products();
                    $produit->name  = $name;
                    $produit->ref   = $json['serial_number'];
                    $produit->image = $img;

                    if($json['action'] == 0) {
                        $produit->available = 1;
                        $produit->expedited = 0;
                        $produit->save();

                        return ['success' => 2];
                    }
                    elseif($json['action'] == 1){
                        $produit->available = 0;
                        $produit->expedited = 1;
                        $produit->save();

                        return ['success' => 3];
                    }
                    else {
                        return ['success' => 5];
                    }
                }
                else {
                    if ($json['action'] == 0) {
                        $product->available = 1;
                        $product->expedited = 0;
                        $product->save();
                        return ['success' => 2];
                    }
                    elseif ($json['action'] == 1) {
                        $product->available = 0;
                        $product->expedited = 1;
                        $product->save();
                        return ['success' => 3];
                    }
                    elseif ($json['action'] == 2) {
                        $product->delete();
                        return ['success' => 4];
                    }
                }
            }
        }

        return ['error' => 'Invalid Request'];
    }

}
