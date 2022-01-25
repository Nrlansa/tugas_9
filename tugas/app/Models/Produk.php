<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    protected $table = "produk";
    protected $dates = ['created_at'];

    function gethargaAttribute(){
    	return "Rp.".number_format($this->attributes['harga']);
    }

    function getTanggalProduksiAttribute(){
    	$tanggal = $this->creted_at;
    	return strftime("%d %b %Y", strtotime($this->created_at));
    }
}
