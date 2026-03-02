<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Assessment extends Model
{
    use HasFactory;

    protected $table = 'assessment';

    protected $primaryKey = 'assessment_id';

    public $incrementing = false;

    protected $keyType = 'string';

    public $timestamps = false;

    protected $fillable = [
        'assessment_id',
        'customer_id',
        'total_amount',
        'status',
        'assessment_date',
        'created_at',
    ];

    protected function casts(): array
    {
        return [
            'total_amount' => 'float',
            'assessment_date' => 'date',
            'created_at' => 'date',
        ];
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'customer_id');
    }

    public function assessmentItems(): HasMany
    {
        return $this->hasMany(AssessmentItems::class, 'assessment_id', 'assessment_id');
    }

    public function billings(): HasMany
    {
        return $this->hasMany(Billings::class, 'assessment_id', 'assessment_id');
    }
}
