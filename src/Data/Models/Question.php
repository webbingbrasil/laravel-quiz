<?php
/**
 *  Copyright (c) 2018 Webbing Brasil (http://www.webbingbrasil.com.br)
 *  All Rights Reserved
 *
 *  This file is part of the calculadora-triunfo project.
 *
 *  @project calculadora-triunfo
 *  @file Question.php
 *  @author Danilo Andrade <danilo@webbingbrasil.com.br>
 *  @date 13/08/18 at 12:48
 *  @copyright  Copyright (c) 2018 Webbing Brasil (http://www.webbingbrasil.com.br)
 */

namespace WebbingBrasil\Quiz\Data\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Question
 *
 * @property int $id
 * @property int $quiz_id
 * @property string $title
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \Webbingcms\Quiz\Data\Models\Quiz $quiz
 * @property-read \Illuminate\Database\Eloquent\Collection|\Webbingcms\Quiz\Data\Models\Answer[] $answers
 * @property-read \Illuminate\Database\Eloquent\Collection|\Webbingcms\Quiz\Data\Models\Response[] $responses
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\App\Data\Models\Simulation onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Data\Models\Simulation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Data\Models\Simulation whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Data\Models\Simulation whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Data\Models\Simulation whereQuizId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Data\Models\Simulation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Data\Models\Simulation whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Data\Models\Simulation withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Data\Models\Simulation withoutTrashed()
 * @mixin \Eloquent
 */
class Question extends Model
{
    use SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'quiz_questions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'quiz_id'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
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
