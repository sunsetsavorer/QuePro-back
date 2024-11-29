<?php

namespace App\Http\Requests\Tournament;

use Illuminate\Foundation\Http\FormRequest;

class CreateParticipationEntryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'tournament_id' => 'required|integer|exists:tournaments,id',
            'team_name' => 'required',
            'captain_fullname' => 'required',
            'captain_phone' => 'required|numeric',
            'captain_email' => 'required|email',
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'tournament_id' => $this->route('tournament_id')
        ]);
    }
}
