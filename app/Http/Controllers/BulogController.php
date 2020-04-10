<?php

namespace App\Http\Controllers;

use App\Bulog;
use Illuminate\Http\Request;
use DB;
use Exception;
use Validator;

class BulogController extends Controller
{
    public function index(){
        $bulog = Bulog::orderBy('bulog_id')->get();
        if (!count($bulog) == 0){
            $response = [
                'msg' => 'berhasil menemukan data',
                'status_code' => '0001',
                'data' => $bulog
            ];
            return response()->json($response,200);
        }

        $response = [
            'msg' => 'data tidak ditemukan',
            'status_code' => '0116',
            'data' => ''
        ];
        return response()->json($response,400);
    }

    public function store(Request $request){
//        $validator = Validator::make($request->all(),[
//            'ktp' => 'required',
//            'npwp' => 'required',
//            'alamat' => 'required',
//            'provinsi' => 'required',
//            'kota' => 'required',
//            'kecamatan' => 'required',
//            'kelurahan' => 'required',
//            'username' => 'required',
//            'pemilik' => 'required',
//            'toko' => 'required',
//            'entitas' => 'required',
//            'dc' => 'required',
//            'kategori' => 'required',
//            'telfon' => 'required',
//            'keterangan' => 'required',
//            'status' => 'required'
//        ]);
//
//        if ($validator->fails()){
//            $response = [
//                'msg' => 'error when validate',
//                'status_code' => '0002',
//                'error' => $validator->errors()->toJson()
//            ];
//
//            return response()->json($response,400);
//        }

        try {
            DB::beginTransaction();
            $bulog = Bulog::create([
                'ktp' => $request->get('ktp'),
                'npwp' => $request->get('npwp'),
                'alamat' => $request->get('alamat'),
                'provinsi' => $request->get('provinsi'),
                'kota' => $request->get('kota'),
                'kecamatan' => $request->get('kecamatan'),
                'kelurahan' => $request->get('kelurahan'),
                'username' => $request->get('username'),
                'pemilik' => $request->get('pemilik'),
                'toko' => $request->get('toko'),
                'entitas' => $request->get('entitas'),
                'dc' => $request->get('dc'),
                'kategori' => $request->get('kategori'),
                'telfon' => $request->get('telfon'),
                'keterangan' => $request->get('keterangan'),
                'status' => $request->get('status')
            ]);
            if (!$bulog){
                DB::rollBack();
                $response = [
                    'msg' => 'gagal membuat data',
                    'status_code' => '0016',
                    'error' => ''
                ];

                return response()->json($response,400);
            }

            DB::commit();
            $response = [
                'msg' => 'berhasil membuat data',
                'status_code' => '0016',
                'data' => $bulog
            ];
            return response()->json($response,201);
        }catch (Exception $exception){
            DB::rollBack();
            $response = [
                'msg' => 'gagal membuat data',
                'status_code' => '0016',
                'error' => $exception
            ];

            return response()->json($response,400);
        }
    }

    public function update(Request $request, $bulog_id){
//        $validator = Validator::make($request->all(),[
//            'ktp' => 'required',
//            'npwp' => 'required',
//            'alamat' => 'required',
//            'provinsi' => 'required',
//            'kota' => 'required',
//            'kecamatan' => 'required',
//            'kelurahan' => 'required',
//            'username' => 'required',
//            'pemilik' => 'required',
//            'toko' => 'required',
//            'entitas' => 'required',
//            'dc' => 'required',
//            'kategori' => 'required',
//            'telfon' => 'required',
//            'keterangan' => 'required',
//            'status' => 'required'
//        ]);
//
//        if ($validator->fails()){
//            $response = [
//                'msg' => 'error when validate',
//                'status_code' => '0002',
//                'error' => $validator->errors()->toJson()
//            ];
//
//            return response()->json($response,400);
//        }

        try {
            DB::beginTransaction();
            $bulog = Bulog::where('bulog_id',$bulog_id)->first();

            $bulog->ktp =  $request->get('ktp');
            $bulog->npwp = $request->get('npwp');
            $bulog->alamat = $request->get('alamat');
            $bulog->provinsi = $request->get('provinsi');
            $bulog->kota = $request->get('kota');
            $bulog->kecamatan = $request->get('kecamatan');
            $bulog->kelurahan = $request->get('kelurahan');
            $bulog->username = $request->get('username');
            $bulog->pemilik = $request->get('pemilik');
            $bulog->toko = $request->get('toko');
            $bulog->entitas = $request->get('entitas');
            $bulog->dc = $request->get('dc');
            $bulog->kategori = $request->get('kategori');
            $bulog->telfon = $request->get('telfon');
            $bulog->keterangan = $request->get('keterangan');
            $bulog->status = $request->get('status');
            $bulog->update();

            if (!$bulog->update()){
                DB::rollBack();
                $response = [
                    'msg' => 'gagal update data',
                    'status_code' => '0017',
                    'error' => ''
                ];

                return response()->json($response,400);
            }

            DB::commit();
            $response = [
                'msg' => 'berhasil update data',
                'status_code' => '0001',
                'data' => $bulog
            ];
            return response()->json($response,200);
        }catch (Exception $exception){
            DB::rollBack();
            $response = [
                'msg' => 'gagal update data',
                'status_code' => '0012',
                'error' => $exception
            ];

            return response()->json($response,400);
        }
    }

    public function destroy($bulog_id){
        $bulog = Bulog::where('bulog_id',$bulog_id)->first();
        if (!$bulog) {
            $response = [
                'msg' => 'gagal hapus data',
                'status_code' => '0022',
                'error' => ''
            ];
            return response()->json($response,400);
        }
            try {
                DB::beginTransaction();
                $bulog->delete();
                $response = [
                    'msg' => 'berhasil hapus data',
                    'status_code' => '0001'
                ];
                DB::commit();
                return response()->json($response,200);
            } catch (Exception $e) {
                DB::rollBack();
                $response = [
                    'msg' => 'gagal hapus data',
                    'status_code' => '0022',
                    'error' => $e
                ];
                return response()->json($response,400);
            }
    }
}
