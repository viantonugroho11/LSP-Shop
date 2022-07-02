<?php

namespace App\Http\Controllers\Backend\Transcation;

use App\Http\Controllers\Controller;
use App\Models\Transcation;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class TranscationController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $transcation = Transcation::select('*');
            return DataTables::of($transcation)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    //form delete
                    $formdelete = '<form action="' . route('admin.transcation.destroy', $row->id) . '" method="POST">' . csrf_field() . method_field("DELETE") . '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah anda yakin ingin menghapus data ini?\')"><i class="fa fa-trash"></i> Hapus</button></form>';
                    //form edit
                    $formedit = '<a href = "' . route('admin.transcation.edit', $row->id) . '" class = "btn btn-warning btn-sm"><i class = "fa fa-edit"></i> Edit</a>';
                    $btn = $formedit . '
                        <br/>
                        ' . $formdelete . '';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('backend.transcation.index');
    }
    public function show($id)
    {
        $trans = Transcation::findorFail($id);
        return view('backend.transcation.edit',compact('trans'));
    }
    public function update(Request $request,$id)
    {
        $this->validate($request,[
            'courier_number'=>'required',
        ]);
        $trans = Transcation::find($id);
        $trans->update([
            'courier_track_number'=>$request->courier_number,
        ]);
        if ($trans) {
            return redirect()->route('admin.product.index')->with('success', 'Data berhasil ditambahkan');
        } else {
            return redirect()->route('admin.product.index')->with('error', 'Data gagal ditambahkan');
        }
    }
}
