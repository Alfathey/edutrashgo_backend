<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class DaftarBeritaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id_berita' => $this->id_berita,
            'judul' => $this->judul,
            'kategori' => $this->kategori,
            'konten' => $this->konten,
            'url_gambar' => $this->url_gambar,
            'tanggal_upload' => Carbon::parse($this->created_at)->format('Y-m-d H:i:s'),
            'tanggal_update' => Carbon::parse($this->updated_at)->format('Y-m-d H:i:s'),
        ];
    }
}
