<?php

namespace App\Http\Requests;

use App\Models\Movie;
use App\Policies\MoviePolicy;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class MovieRequest extends FormRequest
{
    public function rules()
    {
        $unique=Rule::unique('movies');

        /** @var Movie $movie */
        if($movie=$this->route('movies'))
            $unique->ignoreModel($movie);

        return [
            'title'=>[
                'required', 'string', 'max:255'
            ],
            'director'=>[
                'required', 'string', 'max:255'
            ],
            'country'=>[
                'required', 'string', 'max:255'
            ],
            'overview'=>[
                'required', 'string'
            ],
            'release_date'=>[
                'required', 'date'
            ],
            'poster'=>[
                'nullable','file','image'
            ]
        ];
    }
}
