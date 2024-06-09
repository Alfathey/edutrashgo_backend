<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class TantanganDetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'tantangan_detail_id' => $this->tantangan_detail_id,
            'id_tantangan' => $this->id_tantangan,
            'misi' => $this->misi,
            'tugas' => $this->tugas,
            'tanggal_upload' => Carbon::parse($this->created_at)->format('Y-m-d H:i:s'),
            'tanggal_update' => Carbon::parse($this->updated_at)->format('Y-m-d H:i:s'),
        ];
    }
}
