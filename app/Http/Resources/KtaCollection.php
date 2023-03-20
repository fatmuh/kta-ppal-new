<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class KtaCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'  => $this->id,
            'no_kta'  => $this->no_kta,
            'full_name'  => $this->full_name,
            'ttl' => $this->ttl,
            'agama' => $this->agama,
            'gol_darah' => $this->gol_darah,
            'pangkat_terakhir' => $this->pangkat_terakhir,
            'nik' => $this->nik,
            'tanda_jasa_tertinggi' => $this->tanda_jasa_tertinggi,
            'tanggal_cetak' => $this->tanggal_cetak,
            'foto' => $this->foto,
            'ttd' => $this->ttd,
            'istri_suami' => $this->istri_suami,
            'nama_istri_suami' => $this->nama_istri_suami,
            'nik_istri_suami' => $this->nik_istri_suami,
            'alamat1' => $this->alamat1,
            'alamat2' => $this->alamat2,
            'wil_rayon' => $this->wil_rayon,
            'detail_url'    => route('kta.detail', $this->id),
            'delete_url' => route('kta.delete', $this->id),
            'kta_front_url' => route('kta.front', $this->id),
            'kta_back_url' => route('kta.back', $this->id),
        ];
    }
}
