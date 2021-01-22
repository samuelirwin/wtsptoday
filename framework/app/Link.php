<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Model;

use Cviebrock\EloquentSluggable\Sluggable;

class Link extends Model
{
    use Sluggable, SoftDeletes;

    protected $fillable = [
        'subdomain',
        'mobile_no_without_plus',
        'custom_msg',
        'user_id',
        'slug',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function mobile_number()
    {
        return $this->belongsTo(MobileNumber::class);
    }

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'subdomain'
            ]
        ];
    }
}
