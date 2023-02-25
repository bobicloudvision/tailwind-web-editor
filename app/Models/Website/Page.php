<?php

namespace App\Models\Website;

use App\Models\Blog\Author;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Tags\HasTags;

class Page extends Model
{
    use HasFactory;
    use HasTags;

    protected $table = 'website_pages';

    /**
     * @var array<string, string>
     */
    protected $casts = [
        'published_at' => 'date',
    ];

    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class, 'page_author_id');
    }

}
