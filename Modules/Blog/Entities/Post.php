<?php
namespace Modules\Blog\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Category\Entities\Category;
class Post extends Model
{
    protected $fillable = [
        'title', 'slug', 'content', 'category_id',
        'featured_image', 'status', 'published_at',
        'meta_title', 'meta_description'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
