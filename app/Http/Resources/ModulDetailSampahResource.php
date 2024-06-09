<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ModulDetailSampahResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id_detail_sampah' => $this->id_detail_sampah,
            'nama' => $this->nama,
            'deskripsi' => $this->deskripsi,
            'url_gambar' => $this->url_gambar,
            'kategori' => new ModulKategoriResource($this->kategori),
        ];
    }
}
