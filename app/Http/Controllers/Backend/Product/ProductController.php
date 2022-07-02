<?php

namespace App\Http\Controllers\Backend\Product;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;
use Ramsey\Uuid\Rfc4122\UuidV4;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $product = Product::all();
        // dd($product);
        if ($request->ajax()) {
            $product = Product::all();
            return DataTables::of($product)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    //form delete
                    $formdelete = '<form action="' . route('admin.product.destroy', $row->id) . '" method="POST">' . csrf_field() . method_field("DELETE") . '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah anda yakin ingin menghapus data ini?\')"><i class="fa fa-trash"></i> Hapus</button></form>';
                    //form edit
                    $formedit = '<a href="' . route('admin.product.edit', $row->id) . '" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Edit</a>';
                    $btn = $formedit . '
                        <br/>
                        ' . $formdelete . '';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        // dd(User::all());
        return view('backend.product.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        return view('backend.product.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'description' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'publisher' => 'required|string|max:255',
            'isbn' => 'required|string|max:255',
            'datePublish' => 'required|date',
            'weight' => 'required|numeric',
            'width' => 'required|numeric',
            'page' => 'required|numeric',
            'language' => 'required|string|max:255',
            'category_id' => 'required|numeric',
        ]);
        $count = Product::count();
        $generateRandom = mt_rand(1000000000, 9999999999);
        $product = Product::create([
            'id' => UuidV4::uuid4()->toString(),
            'name' => $request->name,
            'author' => $request->author,
            'book_id' => 'BK-' . $generateRandom,
            'slug' => Str::slug($request->name),
            'price' => $request->price,
            'quantity' => $request->quantity,
            'publisher' => $request->publisher,
            'isbn' => $request->isbn,
            'datePublish' => $request->datePublish,
            'weight' => $request->weight,
            'width' => $request->width,
            'page' => $request->page,
            'language' => $request->language,
            'description' => $request->description,
            'category_id' => $request->category_id,
        ]);
        if ($request->file('icon')) {
            $image = $request->file('icon');
            $image->storeAs('public/product', $image->hashName());
            $product->update([
                'image' => $image->hashName(),
            ]);
        }
        if ($product) {
            return redirect()->route('admin.product.index')->with('success', 'Data berhasil ditambahkan');
        } else {
            return redirect()->route('admin.product.index')->with('error', 'Data gagal ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $category = Category::all();
        return view('backend.product.edit', compact('product', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'price' => 'required|numeric',
            'publisher' => 'required|string|max:255',
            'isbn' => 'required|string|max:255',
            'datePublish' => 'required|date',
            'weight' => 'required|numeric',
            'width' => 'required|numeric',
            'page' => 'required|numeric',
            'language' => 'required|string|max:255',
            'category_id' => 'required|numeric',
        ]);
        $product = Product::find($id);
        $product->update([
            'name' => $request->name,
            'author' => $request->author,
            'description' => $request->description,
            'price' => $request->price,
            'publisher' => $request->publisher,
            'isbn' => $request->isbn,
            'datePublish' => $request->datePublish,
            'weight' => $request->weight,
            'width' => $request->width,
            'page' => $request->page,
            'language' => $request->language,
            'category_id' => $request->category_id,
        ]);
        if ($request->file('icon')) {
            Storage::delete('public/product/' . $product->image);
            $image = $request->file('icon');
            $image->storeAs('public/product', $image->hashName());
            $product->update([
                'image' => $image->hashName(),
            ]);
        }
        if ($product) {
            return redirect()->route('backend.product.index')->with('success', 'Data berhasil diubah');
        } else {
            return redirect()->route('backend.product.index')->with('error', 'Data gagal diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        if ($product->image) {
            Storage::delete('public/product/' . $product->image);
        }
        $product->delete();
        if ($product) {
            return redirect()->route('backend.product.index')->with('success', 'Data berhasil dihapus');
        } else {
            return redirect()->route('backend.product.index')->with('error', 'Data gagal dihapus');
        }
    }
}
