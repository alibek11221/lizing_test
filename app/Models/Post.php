<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Cache;


/**
 * App\Models\Post
 *
 * @property int $id
 * @property string $label
 * @property string $image_url
 * @property string $content
 * @property int $likes_counter
 * @property int $views_counter
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Comment[] $comments
 * @property-read int|null $comments_count
 * @property-read string $likes_presenter
 * @property-read string $short_text
 * @property-read string $views_presenter
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Tag[] $tags
 * @property-read int|null $tags_count
 * @method static \Database\Factories\PostFactory factory(...$parameters)
 * @method static Builder|Post newModelQuery()
 * @method static Builder|Post newQuery()
 * @method static Builder|Post ofTag($tag)
 * @method static Builder|Post query()
 * @method static Builder|Post whereContent($value)
 * @method static Builder|Post whereCreatedAt($value)
 * @method static Builder|Post whereId($value)
 * @method static Builder|Post whereImageUrl($value)
 * @method static Builder|Post whereLabel($value)
 * @method static Builder|Post whereLikesCounter($value)
 * @method static Builder|Post whereUpdatedAt($value)
 * @method static Builder|Post whereViewsCounter($value)
 * @method static Builder|Post latestWithTags()
 * @mixin \Eloquent
 */
class Post extends Model
{
    use HasFactory;

    public const LIKES_COUNTER_CACHE_TAG = 'POST_LIKES';

    public const VIEWS_COUNTER_CACHE_TAG = 'POST_VIEWS';

    public const SMALL_PAGINATE_SIZE = 6;
    public const BIG_PAGINATE_SIZE = 10;


    protected $fillable = ['label', 'image_url', 'content', 'likes_counter', 'views_counter'];

    protected $appends = ['short_text'];

    public function getShortTextAttribute(): string
    {
        return \Str::substr($this->content, 0, 150) . '...';
    }

    public function getLikesPresenterAttribute(): string
    {
        if (($counters = Cache::get(self::LIKES_COUNTER_CACHE_TAG)) && array_key_exists($this->id, $counters)) {
            return $counters[$this->id];
        }
        return $this->likes_counter;
    }

    public function getViewsPresenterAttribute(): string
    {
        if (($counters = Cache::get(self::VIEWS_COUNTER_CACHE_TAG)) && array_key_exists($this->id, $counters)) {
            return $counters[$this->id];
        }
        return \Str::limit($this->views_counter, 3);
    }

    public function scopeOfTag(Builder $query, $tag): Builder
    {
        if ($tag instanceof Tag) {
            return $query->whereHas('tags',function (Builder $query) use ($tag){
                $query->where('tags.name', $tag->name);
            });
        }
        return $query->whereHas('tags',function (Builder $query) use ($tag){
            $query->where('tags.name', $tag->name);
        });
    }

    public function scopeLatestWithTags(Builder $query)
    {
        return $query->with('tags')->latest();
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }
}
