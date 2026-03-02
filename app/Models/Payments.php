<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payments extends Model
{
    use HasFactory;

    protected $primaryKey = 'payment_id';

    public $incrementing = false;

    protected $keyType = 'string';

    public $timestamps = false;

    protected $fillable = [
        'payment_id',
        'billing_id',
        'amount_paid',
        'paid_at',
    ];

    protected function casts(): array
    {
        return [
            'amount_paid' => 'float',
            'paid_at' => 'date',
        ];
    }

    public function billing(): BelongsTo
    {
        return $this->belongsTo(Billings::class, 'billing_id', 'billing_id');
    }
}
