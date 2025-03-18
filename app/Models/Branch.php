<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Snairbef\Regional\Concerns\HasRegionRelations;

class Branch extends Model
{
    use HasFactory, SoftDeletes, HasRegionRelations;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts()
    {
        return [
            'province_id' => 'integer',
            'regency_id' => 'integer',
            'district_id' => 'integer',
            'sub_district_id' => 'integer',
            'manager_id' => 'integer',
        ];
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'province_id',
        'regency_id',
        'district_id',
        'sub_district_id',
        'manager_id',
        'code',
        'name',
        'address',
        'phone',
        'email'
    ];

    /**
     * Get the manager that owns the Branch
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function manager(): BelongsTo
    {
        return $this->belongsTo(Manager::class);
    }
}
