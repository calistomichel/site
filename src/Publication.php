<?php

namespace MichelCalisto\Site;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use MichelCalisto\Site\Site;

class Publication extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'site_id',
        'title',
        'content'
    ];

    /**
     * Get the Site that owns the publication.
     */
    public function site()
    {
        return $this->belongsTo(Site::class);
    }
}
