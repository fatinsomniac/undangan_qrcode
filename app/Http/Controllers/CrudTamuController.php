<?php

namespace App\Http\Controllers;

use App\Guest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests\CrudTamuRequest;
use DB;

class CrudTamuController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index()
    {
        $guests = Guest::all();
        return view('guest.index', compact('guests'));
    }

    public function create()
    {
        return view('guest.create');
    }

    public function store(Request $request)
    {
        
        date_default_timezone_set('Asia/Jakarta');    
        $belumhadir = 0;

        Guest::create([
            'instansi' => $request['instansi'],
            'jam_hadir' => date('H:i:s'),
            'verifikasi' => $belumhadir
          

        ]);

        return redirect('/guest')->with('message', 'item has been added successfully');
    }

    public function preview($id)
    {
        $preview = Guest::where('id', $id)->firstOrFail();

        return view('guest.preview',[
            'preview' => $preview,
            
            ]);
    }

    public function edit($id)
    {
        $guests = Guest::where('id', $id)->firstOrFail();
        return view('guest.edit', compact('guests'));
    }

    public function update(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        $hadir = 0;
        
        $data = Guest::find($request->id);
        $data->instansi = $request->instansi;
        $data->jam_hadir = date('H:i:s');
        $data->verifikasi = $hadir;
        $data->save();
        return redirect('/guest')->with('message', 'item has been updated successfully');
    }

    public function destroy($id)
    {
        $delete = Guest::find($id);
        $delete->delete();
        return redirect('/guest');
    }

    public function absensi()
    {
        $guests = DB::table('guests')->where('verifikasi', '=', 1)->get();
        return view('guest.absensi',['guests' => $guests]);
    }

    public function prosesabsen(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        
        DB::table('guests')
        ->where('uuid', $request['uuid'])
        ->update([
            'verifikasi' => 1,
            'jam_hadir' => date('H:i:s')
            ]);
        
        return redirect('/absensi')->with('message', 'item has been updated successfully');
    }
}