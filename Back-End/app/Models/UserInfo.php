<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserInfo extends Model
{
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->updating(function ($model) {
            $oldData = $model->getOriginal();
            return $oldData;
        });
    }

    use HasFactory;

    protected $table = 'user_info';

    protected $fillable = [
        'fullname', 'nickname', 'phone', 'birthday', 'avatar', 'gender_id', 'user_id', 'permanent_address'
    ];

    /**
     * Get the user that owns the UserInfo
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    /**
     * Get the gender that owns the gender
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function gender(): BelongsTo
    {
        return $this->belongsTo('App\Models\Gender', 'gender_id', 'id');
    }
}
