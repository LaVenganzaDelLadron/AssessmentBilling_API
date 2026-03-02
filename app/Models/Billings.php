<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Billings extends Model
{
    use HasFactory;

    protected $primaryKey = 'billing_id';

    public $incrementing = false;

    protected $keyType = 'string';

    public $timestamps = false;

    protected $fillable = [
        'billing_id',
        'customer_id',
        'assessment_id',
        'amount_due',
        'due_date',
        'status',
        'payment_date',
    ];

    protected function casts(): array
    {
        return [
            'amount_due' => 'float',
            'due_date' => 'date',
            'payment_date' => 'date',
        ];
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'customer_id');
    }

    public function assessment(): BelongsTo
    {
        return $this->belongsTo(Assessment::class, 'assessment_id', 'assessment_id');
    }

    public function payments(): HasMany
    {
        return $this->hasMany(Payments::class, 'billing_id', 'billing_id');
    }
}
