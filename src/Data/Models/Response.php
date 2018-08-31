<?php
/**
 *  Copyright (c) 2018 Webbing Brasil (http://www.webbingbrasil.com.br)
 *  All Rights Reserved
 *
 *  This file is part of the calculadora-triunfo project.
 *
 *  @project calculadora-triunfo
 *  @file Response.php
 *  @author Danilo Andrade <danilo@webbingbrasil.com.br>
 *  @date 13/08/18 at 12:19
 *  @copyright  Copyright (c) 2018 Webbing Brasil (http://www.webbingbrasil.com.br)
 */

namespace WebbingBrasil\Quiz\Data\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Response
 *
 * @property int $id
 * @property int $quiz_id
 * @property int $question_id
 * @property int $answer_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \Webbingcms\Quiz\Data\Models\Quiz $quiz
 * @property-read \Webbingcms\Quiz\Data\Models\Question $question
 * @property-read \Webbingcms\Quiz\Data\Models\Answer $answer
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\App\Data\Models\Simulation onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Data\Models\Simulation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Data\Models\Simulation whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Data\Models\Simulation whereQuizId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Data\Models\Simulation whereQuestionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Data\Models\Simulation whereAnswerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Data\Models\Simulation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Data\Models\Simulation whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Data\Models\Simulation withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Data\Models\Simulation withoutTrashed()
 * @mixin \Eloquent
 */
class Response extends Model
{
    use SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'quiz_responses';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'quiz_id',
        'question_id',
        'answer_id',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function quizable()
    {
        return $this->morphTo();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function answer()
    {
        return $this->belongsTo(Answer::class);
    }
}
