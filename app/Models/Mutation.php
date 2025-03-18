<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mutation extends Model
{
    use SoftDeletes;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts()
    {
        return [
            'inventory_id' => 'integer',
            'first_branch_id' => 'integer',
            'last_branch_id' => 'integer',
        ];
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'inventory_id',
        'first_branch_id',
        'last_branch_id',
        'reason',
    ];

    /**
     * Get the first that owns the Mutation
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function first(): BelongsTo
    {
        return $this->belongsTo(Branch::class, 'first_branch_id', 'id');
    }

    /**
     * Get the last that owns the Mutation
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function last(): BelongsTo
    {
        return $this->belongsTo(Branch::class, 'last_branch_id', 'id');
    }

    /**
     * Get the inventory that owns the Mutation
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function inventory(): BelongsTo
    {
        return $this->belongsTo(Inventory::class);
    }
}
