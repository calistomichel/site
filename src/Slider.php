<?php

namespace MichelCalisto\Site;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use MichelCalisto\Site\Site;

class Slider extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'site_id',
        'name',
        'path'
    ];

    /**
     * Get the Site that owns the slider.
     */
    public function site()
    {
        return $this->belongsTo(Site::class);
    }
}
