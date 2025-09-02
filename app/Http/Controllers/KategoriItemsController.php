<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriItems;

class KategoriItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('kategori_items.index.index');
    }

    public function search(Request $request)
    {
        $kode = $request->kode;
        $nama = $request->nama;

        $data_search = KategoriItems::query();

        if (!empty($kode)) $data_search = $data_search->where('kode', $kode);
        if (!empty($nama)) $data_search = $data_search->where('nama', 'LIKE', '%' . $nama . '%');

        $data_search = $data_search->select('kode', 'nama')->orderBy('id')->get();


        return json_encode([
            'status' => 200,
            'data' => $data_search
        ]);
    }

    public function formView($method, $id = 0)
    {
        if ($method == 'new') {
            $item = [];
        } else {
            $item = KategoriItems::find($id);
        }
        $data['item'] = $item;
        $data['method'] = $method;
        return view('kategori_items.form.index', $data);
    }

    public function singleView($kode)
    {
        $data['data'] = KategoriItems::where('kode', $kode)->first();
        return view('kategori_items.single.index', $data);
    }
    
    public function formSubmit(Request $request, $method, $id = 0)
    {
        if ($method == 'new') {
            $data_item = new KategoriItems;
            $kode = KategoriItems::count('id');
            $kode = $kode + 1;
            $kode = str_pad($kode, 5, '0', STR_PAD_LEFT);
            sleep(3);
        } else {
            $data_item = KategoriItems::find($id);
            $kode = $data_item->kode;
        }

        $data_item->kode = $kode;
        $data_item->nama = $request->nama;

        $data_item->save();

        return redirect('kategori-items');
    }

    public function delete($id)
    {
        KategoriItems::find($id)->delete();
        return redirect('kategori-items');
    }

    // public function updateRandomData()
    // {
    //     $data = KategoriItems::get();
    //     foreach ($data as $item) {
    //         $kode = $item->id;
    //         $kode = str_pad($kode, 5, '0', STR_PAD_LEFT);

    //         $item->kode = $kode;
    //         $item->save();
    //     }
    // }
}
