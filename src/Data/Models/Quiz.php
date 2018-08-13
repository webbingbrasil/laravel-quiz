<?php

namespace WebbingBrasil\Quiz\Data\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Quiz
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Webbingcms\Quiz\Data\Models\Question[] $questions
 * @property-read \Illuminate\Database\Eloquent\Collection|\Webbingcms\Quiz\Data\Models\Answer[] $answers
 * @property-read \Illuminate\Database\Eloquent\Collection|\Webbingcms\Quiz\Data\Models\Response[] $responses
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\App\Data\Models\Simulation onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Data\Models\Simulation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Data\Models\Simulation whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Data\Models\Simulation whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Data\Models\Simulation whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Data\Models\Simulation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Data\Models\Simulation whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Data\Models\Simulation withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Data\Models\Simulation withoutTrashed()
 * @mixin \Eloquent
 */
class Quiz extends Model
{
    use SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'quiz';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'description'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function responses()
    {
        return $this->hasMany(Response::class);
    }
}
