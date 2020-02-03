<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|min:2',
            'team1name' => 'required|string|min:2',
            'team2name' => 'required|string|min:2',
            'team1wincoef' => 'required|numeric',
            'team2wincoef' => 'required|numeric',
            'start_date' => 'required',
        ];
    }
}
