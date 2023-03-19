<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KtaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $request = $this;
        return [
            'no_kta'      => ['required'],
            'full_name' => ['required'],
            'ttl' => ['required'],
            'agama' => ['required'],
            'gol_darah' => ['required'],
            'pangkat_terakhir' => ['required'],
            'nik' => ['required'],
            'tanda_jasa_tertinggi' => ['required'],
            'tanggal_cetak' => ['required'],
            'foto' => ['nullable', 'file', 'image', 'mimes:png,jpg,jpeg', 'max:4096'],
            'ttd' => ['nullable'],
            'istri_suami' => ['required'],
            'nama_istri_suami' => ['required'],
            'nik_istri_suami' => ['required'],
            'alamat1' => ['required'],
            'alamat2' => ['required'],
            'wil_rayon' => ['required'],
        ];
    }

    public function message()
    {
        # code...
        return [
            'no_kta.required' => 'No KTA harap diisi',
            'full_name.required' => 'Nama lengkap harap di isi',
            'ttl.required' => 'Tempat, tanggal lahir harap di isi',
            'agama.required' => 'Agama harap di isi',
            'gol_darah.required' => 'Golongan darah harap di isi',
            'pangkat_terakhir.required' => 'Pangkat terakhir harap di isi',
            'nik.required' => 'NIK harap di isi',
            'tanda_jasa_tertinggi.required' => 'Tanda jasa tertinggi harap di isi',
            'tanggal_cetak.required' => 'Tanggal cetak harap di isi',
            'istri_suami.required' => 'Istri / suami harap di isi',
            'nama_istri_suami.required' => 'Nama istri / suami harap di isi',
            'nik_istri_suami.required' => 'NIK istri / suami harap di isi',
            'alamat1.required' => 'Alamat 1 harap di isi',
            'alamat2.required' => 'Alamat 2 harap di isi',
            'wil_rayon.required' => 'Wilayah / rayon harap di isi',
        ];
    }
}
