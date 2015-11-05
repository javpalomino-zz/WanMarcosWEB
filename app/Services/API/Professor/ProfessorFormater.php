<?php

namespace App\Services\API\Event;

use App\Services\Interfaces\Formater;

class ProfessorFormater implements Formater
{
    public function format($professors){
        $_professors = [];

        foreach ($professors as $professor) {
            $_professors[] = $this->formatItem($professor);
        }

        return $_professors;
    }

    public function formatDetail($professor){
        $_professor = $this->formatItem($professor);

        return $_professor;
    }

    public function formatAutocomplete($professors){
        $_events = [];

        foreach ($professors as $professor) {
            $_events[] = [
                'id'        => $professor->id,
                'name'      => $professor->first_name.' '.$professor->last_name;
            ];
        }

        return $_events;
    }

    public function formatItem($professor){

        $_professor = [
            'id'            => $professor->id
            'first_name'    => $professor->first_name,
            'last_name'     => $professor->last_name
        ];

        return $_professor;
    }
}