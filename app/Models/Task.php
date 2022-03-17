<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{
    use HasFactory;
    protected $table = 'tasks';
    protected $fillable = [
        'Title',
        'Description',
        'Status',
        'user_id',
        'create_at',
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
