<?php

namespace App\Http\Controllers;

use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\Pendaftaran;
use App\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PendaftaranController extends Controller
{
    public function getKabupatens(Request $request)
    {
        $kabupatens = Kabupaten::where('prov_id', $request->province_id)->get(['city_id', 'city_name']);
        return response()->json($kabupatens);
    }

    public function getKecamatans(Request $request)
    {
        $kecamatans = Kecamatan::where('city_id', $request->city_id)->get(['dis_id', 'dis_name']);
        return response()->json($kecamatans);
    }
    public function show()
    {
        // Fetch data for dropdowns
        $provinces = Province::all();

        $kewarganegaraan = ['WNI Asli', 'WNI Keturunan', 'WNA'];
        $jenisKelamin = ['Pria', 'Wanita'];
        $statusNikah = ['Belum Menikah', 'Menikah', 'Lain-lain (janda/duda)'];
        $agama = ['Islam', 'Katolik', 'Kristen', 'Hindu', 'Buddha', 'Lain-lain'];
        
        return view('pendaftaran', compact('provinces','kewarganegaraan', 'jenisKelamin', 'statusNikah', 'agama'));
    }


    public function showAll()
    {
        $daftar = Pendaftaran::all();
        $provinces = Province::all();
        return view('dataDaftar', compact('daftar', 'provinces'));
    }

    public function edit($id)
    {
        $daftar = Pendaftaran::findOrFail($id);
        $exProvinces = Province::all();
        $cities = Kabupaten::where('prov_id', $daftar->prov_id)->get(['city_id', 'city_name']);
        $districts = Kecamatan::where('city_id', $daftar->city_id)->get(['dis_id', 'dis_name']);

        //dd($exProvinces);
        
        return view('editDaftar', compact('daftar', 'exProvinces', 'cities', 'districts'));
    }
    public function store(Request $request)
    {
        // Validate and save data
        $validData = $request->validate([
            'nama' => 'required|string|max:255',
            'alamat_ktp' => 'required|string|max:255',
            'alamat_domisili' => 'required|string|max:255',
            'prov_id' => 'required|exists:provinces,prov_id',
            'city_id' => 'required|exists:cities,city_id',
            'dis_id' => 'required|exists:districts,dis_id',
            'no_telp' => 'required|string|regex:/^[0-9]+$/|digits_between:10,15',
            'no_hp' => 'required|string|regex:/^[0-9]+$/|digits_between:10,15',
            'email' => 'required|email',
            'kewarganegaraan' => [
                'required', 'string', Rule::in(['WNI Asli', 'WNI Keturunan','WNA'])
            ],
            'negara_asal' => Rule::requiredIf($request->input('kewarganegaraan') === 'WNA'),
            'tanggal_lahir' => 'required|date',
            'tempat_lahir' => 'required|string|max:255',
            'jenis_kelamin' => [
                'required', 'string', Rule::in(['Pria', 'Wanita'])
            ],
            'status_nikah' => [
                'required', 'string', Rule::in(['Belum Menikah', 'Menikah', 'Lain-lain (janda/duda)'])
            ],
            'agama' => [
                'required', 'string', Rule::in(['Islam', 'Katolik', 'Kristen', 'Hindu', 'Buddha', 'Lain-lain'])
            ],
        ]);

        Pendaftaran::create($validData);
        return redirect()->route('homepage')->with('success', 'Pendaftaran berhasil dilakukan, silahkan tunggu konfirmasi dari pihak kami'); 
    }

    public function update(Request $request, $id)
    {
        // Validate and save data
        $validData = $request->validate([
            'nama' => 'required|string|max:255',
            'alamat_ktp' => 'required|string|max:255',
            'alamat_domisili' => 'required|string|max:255',
            'prov_id' => 'required|exists:provinces,prov_id',
            'city_id' => 'required|exists:cities,city_id',
            'dis_id' => 'required|exists:districts,dis_id',
            'no_telp' => 'required|integer|digits_between:10,15',
            'no_hp' => 'required|integer|digits_between:10,15',
            'email' => 'required|email',
            'kewarganegaraan' => [
                'required', 'string', Rule::in(['WNI Asli', 'WNI Keturunan','WNA'])
            ],
            'negara_asal' => Rule::requiredIf($request->input('kewarganegaraan') === 'WNA'),
            'tanggal_lahir' => 'required|date',
            'tempat_lahir' => 'required|string|max:255',
            'jenis_kelamin' => [
                'required', 'string', Rule::in(['Pria', 'Wanita'])
            ],
            'status_nikah' => [
                'required', 'string', Rule::in(['Belum Menikah', 'Menikah', 'Lain-lain (janda/duda)'])
            ],
            'agama' => [
                'required', 'string', Rule::in(['Islam', 'Katolik', 'Kristen', 'Hindu', 'Buddha', 'Lain-lain'])
            ],
        ]);

        $daftar = Pendaftaran::findOrFail($id);
        $daftar->update($validData);
        return redirect()->route('lihat-daftar');
    }

    /*public function delete($id)
    {
        $record = Pendaftaran::findOrFail($id);
        $record->delete();
        return redirect()->route('homepage')->with('success', 'Record deleted successfully!');
    }*/
}
