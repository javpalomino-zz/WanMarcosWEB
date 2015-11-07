<?php

namespace App\Repositories;

use App\Services\API\Faculty\FacultyFormater;
use App\Services\API\Faculty\FacultyFilterer;

use App\Models\Faculty;

class FacultyRepository {
    public function __construct() {
        $this->filterer = new FacultyFilterer;
        $this->formater = new FacultyFormater;
    }

    public function getAutocomplete($search_text, $max_items){
        $model = Faculty::distinct();

        $events = $this->filterer->filterAutocomplete($model, $search_text)->take($max_items)->get();
        
        return $this->formater->formatAutocomplete($events);
    }
}