<?php

namespace App\Transformers;

class LessonTransformer extends Transformer{
    /**
     * [Transform a lesson]
     * @param  App\Lesson $lesson [A queried lesson object]
     * @return array           []
     */
    public function transform($lesson){
      return [
        'title' => $lesson['title'],
        'body' => $lesson['body'],
        'active' => (boolean) $lesson['some_bool']
      ];
    }
}
