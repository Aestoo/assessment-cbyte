<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

class Secret extends Model
{
    use HasFactory;

    protected $fillable = ['secret', 'usageAmount', 'expires_at'];
    protected $hidden = ['secret'];

    public function getSecretAttribute($value): string
    {
        return Crypt::decryptString($value);
    }

    public function setSecretAttribute($value): void
    {
        $this->attributes['secret'] = Crypt::encryptString($value);
    }
}
