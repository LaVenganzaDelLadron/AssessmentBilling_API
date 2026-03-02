<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customer';

    protected $primaryKey = 'customer_id';

    public $incrementing = false;

    protected $keyType = 'string';

    public $timestamps = false;

    protected $fillable = [
        'customer_id',
        'customer_name',
        'created_at',
    ];

    protected function casts(): array
    {
        return [
            'created_at' => 'date',
        ];
    }

    public function assessments(): HasMany
    {
        return $this->hasMany(Assessment::class, 'customer_id', 'customer_id');
    }

    public function billings(): HasMany
    {
        return $this->hasMany(Billings::class, 'customer_id', 'customer_id');
    }
}
