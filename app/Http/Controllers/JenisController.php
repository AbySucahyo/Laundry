<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jenis;
use Auth;
use Illuminate\Support\Facades\Validator;

class JenisController extends Controller
{
    public function show()
    {
        if(Auth::user()->level == 'admin'){
            $dt_jenis=Jenis::get();
            return Response()->json($dt_jenis); 
        }else{
            return Response()->json('Anda Bukan admin');
        }
    }

    public function store(Request $req){
        if(Auth::user()->level == 'admin'){
        
        $validator = Validator::make($req->all(),
        [
            'nama_jenis'=>'required',
            'harga_perkilo'=>'required'
        ]
        );
        if($validator->fails()){
            return Response()->json($validator->errors());
        }

        $simpan = Jenis::create([
            'nama_jenis'=>$req->nama_jenis,
            'harga_perkilo'=>$req->harga_perkilo
            
        ]);
        if($simpan){
            return Response()->json('Data Jenis Cuci berhasil ditambahkan');
        }else{
            return Response()->json('Data Jenis Cuci gagal ditambahkan');
        }
    }else{
        return Response()->json('Anda Bukan admin');
    }
    }

    public function update($id,Request $req){
        if(Auth::user()->level == 'admin'){

        $validator = Validator::make($req->all(),
        [
            'nama_jenis'=>'required',
            'harga_perkilo'=>'required'
        ]
        );
        if($validator->fails()){
            return Response()->json($validator->errors());
        }

        $ubah = Jenis::where('id', $id)->update([
            'nama_jenis'=>$req->nama_jenis,
            'harga_perkilo'=>$req->harga_perkilo
        ]);
        if($ubah){
            return Response()->json('Data Jenis Cuci berhasil diubah');
        }else{
            return Response()->json('Data Jenis Cuci gagal diubah');
        }
    }else{
        return Response()->json('Anda Bukan admin');
    }
    }

    public function destroy($id){
        if(Auth::user()->level == 'admin'){

        $hapus = Jenis::where('id', $id)->delete();
        if($hapus){
            return Response()->json('Data Jenis Cuci berhasil dihapus');
        }else{
            return Response()->json('Data Jenis Cuci gagal dihapus');
        }
    }else{
        return Response()->json('Anda Bukan admin');
    }
    }
}
