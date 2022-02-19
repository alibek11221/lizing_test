<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;


/**
 * App\Models\Comment
 *
 * @property int $id
 * @property string $subject
 * @property string $body
 * @property int $post_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read \App\Models\Post|null $post
 * @method static \Database\Factories\CommentFactory factory(...$parameters)
 * @method static Builder|Comment newModelQuery()
 * @method static Builder|Comment newQuery()
 * @method static Builder|Comment query()
 * @method static Builder|Comment whereBody($value)
 * @method static Builder|Comment whereCreatedAt($value)
 * @method static Builder|Comment whereId($value)
 * @method static Builder|Comment wherePostId($value)
 * @method static Builder|Comment whereSubject($value)
 * @method static Builder|Comment whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['subject', 'body'];

    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }
}
