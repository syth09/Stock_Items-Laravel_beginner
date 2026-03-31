<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'price', 'quantity', 'category'];

    // Helper để hiển thị trạng thái kho
    public function getStockStatusAttribute()
    {
        if ($this->quantity == 0) return 'Hết hàng';
        if ($this->quantity < 5) return 'Sắp hết hàng';
        return 'Còn hàng';
    }

    public function getStockBadgeAttribute()
    {
        if ($this->quantity == 0) return 'danger';
        if ($this->quantity < 5) return 'warning';
        return 'success';
    }
}
