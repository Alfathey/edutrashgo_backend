<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class KuisResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id_kuis' => $this->id_kuis,
            'judul' => $this->judul,
            'deskripsi' => $this->deskripsi,
            'tanggal_upload' => Carbon::parse($this->created_at)->format('Y-m-d H:i:s'),
            'tanggal_update' => Carbon::parse($this->updated_at)->format('Y-m-d H:i:s'),
        ];
    }
}
