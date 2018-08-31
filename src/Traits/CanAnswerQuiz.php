<?php
/**
 *  Copyright (c) 2018 Webbing Brasil (http://www.webbingbrasil.com.br)
 *  All Rights Reserved
 *
 *  This file is part of the calculadora-triunfo project.
 *
 *  @project calculadora-triunfo
 *  @file CanAnswerQuiz.php
 *  @author Danilo Andrade <danilo@webbingbrasil.com.br>
 *  @date 13/08/18 at 12:46
 *  @copyright  Copyright (c) 2018 Webbing Brasil (http://www.webbingbrasil.com.br)
 */

namespace WebbingBrasil\Quiz\Traits;

use WebbingBrasil\Quiz\Data\Models\Response;

trait CanAnswerQuiz
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function responses()
    {
        return $this->morphMany(Response::class, 'quizable')->orderBy('created_at', 'desc');
    }

    /**
     * @param int $quiz
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function responsesByQuiz($quiz)
    {
        return $this->responses()->where('quiz_id', $quiz);
    }

    /**
     * @param int $quiz
     * @param int $question
     * @param int $answer
     *
     * @return \WebbingBrasil\Quiz\Data\Models\Response
     */
    public function addResponse($quiz, $question, $answer)
    {
        $response = new Response();
        $response->quiz_id = $quiz;
        $response->question_id = $question;
        $response->answer_id = $answer;

        $this->responses()->save($response);

        return $response;
    }
}
