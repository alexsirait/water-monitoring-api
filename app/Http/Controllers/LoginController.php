<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class LoginController extends Controller
{
    public function auth(Request $req)
    {
        try {

            DB::beginTransaction();

            $username = $req->username;
            $password = $req->password;

            $data = DB::select("SELECT COUNT(tbl_login.username) as auth FROM tbl_login WHERE UPPER(tbl_login.username) LIKE UPPER('$username') AND UPPER(tbl_login.password) LIKE UPPER('$password')")[0];
            if ($data->auth == 0) {
                DB::commit();
                return response()->json('ERROR');
            }   

            $login = DB::table("tbl_login")->where("username", $username)->first();

            $req->session()->put('loggedInUser', [
                'username' => $login->username,
            ]);

            DB::commit();
            return response()->json('SUCCESS');

        } catch (\Throwable $th) {
            return response()->json([
                'MESSAGETYPE' => 'E',
                'MESSAGE' => 'Something went wrong',
                'SERVERMSG' => dd($th->getMessage()),
            ], 400)->header(
                'Accept',
                'application/json'
            );
        }
    }

    public function register(Request $req)
    {
        try {

            DB::beginTransaction();

            $nik = $req->nik;
            $username = $req->username;
            $password = $req->password;
            $rt = $req->rt;
            $rw = $req->rw;
            $uuid = md5(uniqid(rand(), true));

            DB::table("tbl_login")->insert([
                "uuid" => $uuid,
                "username" => $username,
                "password" => $password,
                "nik" => $nik,
                "rt" => $rt,
                "rw" => $rw,
            ]);

            DB::commit();
            return response()->json('SUCCESS');
        } catch (\Throwable $th) {
            return response()->json([
                'MESSAGETYPE' => 'E',
                'MESSAGE' => 'Something went wrong',
                'SERVERMSG' => dd($th->getMessage()),
            ], 400)->header(
                'Accept',
                'application/json'
            );
        }
    }

    public function formulir(Request $req)
    {
        try {

            DB::beginTransaction();

            $nik = $req->nik;
            $nama = $req->nama;
            $jk = $req->jk;
            $tempat = $req->tempat;
            $tanggal = $req->tanggal;
            $alamat = $req->alamat;
            $rt = $req->rt;
            $rw = $req->rw;
            $agama = $req->agama;
            $type = $req->type;
            $uuid = md5(uniqid(rand(), true));

            DB::table("tbl_formulir")->insert([
                "nik" => $nik,
                "nama" => $nama,
                "jk" => $jk,
                "tempat" => $tempat,
                "tanggal" => $tanggal,
                "alamat" => $alamat,
                "rt" => $rt,
                "rw" => $rw,
                "agama" => $agama,
                "uuid" => $uuid,
                "type" => $type,
                "date" => now(),
            ]);

            DB::commit();
            return response()->json('SUCCESS');
        } catch (\Throwable $th) {
            return response()->json([
                'MESSAGETYPE' => 'E',
                'MESSAGE' => 'Something went wrong',
                'SERVERMSG' => dd($th->getMessage()),
            ], 400)->header(
                'Accept',
                'application/json'
            );
        }
    }

    public function riwayat(Request $req)
    {
        try {

            DB::beginTransaction();

            $data = DB::select("SELECT * FROM tbl_formulir ORDER BY date DESC LIMIT 5");

            DB::commit();

            return response()->json($data);
        } catch (\Throwable $th) {
            return response()->json([
                'MESSAGETYPE' => 'E',
                'MESSAGE' => 'Something went wrong',
                'SERVERMSG' => dd($th->getMessage()),
            ], 400)->header(
                'Accept',
                'application/json'
            );
        }
    }

    public function riwayatOne(Request $req)
    {
        try {

            DB::beginTransaction();

            $data = DB::select("SELECT * FROM tbl_formulir ORDER BY date DESC LIMIT 1");

            DB::commit();

            return response()->json(intval($data[0]->type));
        } catch (\Throwable $th) {
            return response()->json([
                'MESSAGETYPE' => 'E',
                'MESSAGE' => 'Something went wrong',
                'SERVERMSG' => dd($th->getMessage()),
            ], 400)->header(
                'Accept',
                'application/json'
            );
        }
    }

    public function phInsert($id, Request $req)
    {
        try {

            DB::beginTransaction();

            $nik = $req->nik;
            $nama = $req->nama;
            $jk = $req->jk;
            $tempat = $req->tempat;
            $tanggal = $req->tanggal;
            $alamat = $req->alamat;
            $rt = $req->rt;
            $rw = $req->rw;
            $agama = $req->agama;
            $type = $req->type;
            $uuid = md5(uniqid(rand(), true));

            DB::table("tbl_formulir")->insert([
                "nik" => $nik,
                "nama" => $nama,
                "jk" => $jk,
                "tempat" => $tempat,
                "tanggal" => $tanggal,
                "alamat" => $alamat,
                "rt" => $rt,
                "rw" => $rw,
                "agama" => $agama,
                "uuid" => $uuid,
                "type" => $id,
                "date" => now(),
            ]);

            DB::commit();
            return response()->json('SUCCESS');
        } catch (\Throwable $th) {
            return response()->json([
                'MESSAGETYPE' => 'E',
                'MESSAGE' => 'Something went wrong',
                'SERVERMSG' => dd($th->getMessage()),
            ], 400)->header(
                'Accept',
                'application/json'
            );
        }
    }

    public function detail(Request $req)
    {
        try {

            DB::beginTransaction();

            $data = DB::table("tbl_login")->where('username', $req->username)->first();

            DB::commit();

            return response()->json($data);
        } catch (\Throwable $th) {
            return response()->json([
                'MESSAGETYPE' => 'E',
                'MESSAGE' => 'Something went wrong',
                'SERVERMSG' => dd($th->getMessage()),
            ], 400)->header(
                'Accept',
                'application/json'
            );
        }
    }

    public function tambahData(Request $req)
    {
        try {

            DB::beginTransaction();

            $nik = $req->nik;
            $username = $req->username;
            $jk = $req->jk;
            $tempat = $req->tempat;
            $tanggal = $req->tanggal;
            $alamat = $req->alamat;
            $agama = $req->agama;

            DB::table("tbl_data")->insert([
                "nik" => $nik,
                "username" => $username,
                "jk" => $jk,
                "tempat" => $tempat,
                "tanggal" => $tanggal,
                "alamat" => $alamat,
                "agama" => $agama,
            ]);

            DB::commit();
            return response()->json('SUCCESS');
        } catch (\Throwable $th) {
            return response()->json([
                'MESSAGETYPE' => 'E',
                'MESSAGE' => 'Something went wrong',
                'SERVERMSG' => dd($th->getMessage()),
            ], 400)->header(
                'Accept',
                'application/json'
            );
        }
    }

    public function editData(Request $req)
    {
        try {

            DB::beginTransaction();

            $nik = $req->nik;
            $username = $req->username;
            $tempat = $req->tempat;
            $tanggal = $req->tanggal;

            DB::table("tbl_data")->where('nik', $nik)->update([
                "username" => $username,
                "tempat" => $tempat,
                "tanggal" => $tanggal,
            ]);

            DB::commit();
            return response()->json('SUCCESS');
        } catch (\Throwable $th) {
            return response()->json([
                'MESSAGETYPE' => 'E',
                'MESSAGE' => 'Something went wrong',
                'SERVERMSG' => dd($th->getMessage()),
            ], 400)->header(
                'Accept',
                'application/json'
            );
        }
    }

    public function data(Request $req)
    {
        try {

            DB::beginTransaction();

            $data = DB::table('tbl_data')->get();

            DB::commit();
            return response()->json($data);
        } catch (\Throwable $th) {
            return response()->json([
                'MESSAGETYPE' => 'E',
                'MESSAGE' => 'Something went wrong',
                'SERVERMSG' => dd($th->getMessage()),
            ], 400)->header(
                'Accept',
                'application/json'
            );
        }
    }
}