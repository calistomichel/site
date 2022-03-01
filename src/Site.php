<?php

namespace MichelCalisto\Site;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use MichelCalisto\Site\Slider;

class Site extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'dns',
    ];

    /**
     * Get the sliders for the site.
     */
    public function sliders()
    {
        return $this->hasMany(Slider::class);
    }
}
