<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
  public function getImageUrlAttribute() {
    if ($this->image_path) {
        return asset('storage/' . $this->image_path);
    }
    // Jika belum ada foto, tampilkan gambar default berdasarkan brand
    return asset('images/default-car.png');
}
protected $fillable = [
    'vin', 'showroom_id', 'brand', 'model', 'price', 'image_path', 'is_active'
];
}
