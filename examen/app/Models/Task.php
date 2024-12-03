<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $fillable = ['name','tittle','description'];

    public function categoria()
{
    return $this->belongsTo(Categoria::class);
}

}
