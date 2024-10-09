<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;

class siswaController extends Controller
{

    public function test(){
        return view('test');
    }
    public function
    
    
    
    tampil() {
        $siswa= Siswa::all();
        return view('admin.siswa.tampil')->with('siswa',$siswa);
    }

    public function tambah() {
        return view('admin.siswa.tambah');
    }

public function submit(request $request){
    $siswa = new siswa();
    $siswa-> nis = $request->nis;
    $siswa-> name = $request->name;
    $siswa-> alamat = $request->alamat;
    
    $siswa-> no_hp = $request->no_hp;
    $siswa-> jenis_kelamin = $request->jenis_kelamin;
    $siswa-> hobi = $request->hobi;
    $siswa->save();

    return redirect()->route('siswa.tampil');
}
public function edit($id)
{
    $siswa = Siswa::findOrFail($id);
    return view('admin.siswa.edit', compact('siswa'));
}
public function update(request $request,$id){
    $siswa =  siswa:: find($id);
    $siswa-> nis = $request->nis;
    $siswa-> name = $request->name;
    $siswa-> alamat = $request->alamat;
    $siswa-> no_hp = $request->no_hp;
    $siswa-> jenis_kelamin = $request->jenis_kelamin;
    $siswa-> hobi = $request->hobi;
    $siswa->update();

    return redirect()->route('siswa.tampil');
}
public function delete($id){
  $siswa = Siswa::find($id);
  $siswa-> delete();
    return redirect()->route('siswa.tampil')->with('success', 'Data produk berhasil dihapus');


}
public function index() {
    $siswa = siswa::all();
    return view('admin.siswa.register',compact('siswa'));
  }
}
  