<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class SupplierModel extends Model
{
    use HasFactory;

    protected $table = 'm_supplier';
    protected $primaryKey = 'supplier_id';
    /**
     * The attributes that are mass assignable.
     * 
     * @var array
     */
    protected $fillable = ['supplier_kode', 'supplier_nama', 'supplier_alamat'];
    
    public function stok(): BelongsTo{
        return $this->belongsTo(StokModel::class, 'stok_id', 'stok_id');
    }
}