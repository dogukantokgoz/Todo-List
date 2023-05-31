<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Todos extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['title', 'description', 'status'];

   /* public function scopeStatus()
    {
        return $this
            ->query()->where('deleted_at', null);
    }

    public function scopeDelete()
    {
        return $this
            ->query()->where('deleted_at');
    }
   */

}
