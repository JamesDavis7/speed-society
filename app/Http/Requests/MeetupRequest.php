<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Meetup;
use Illuminate\Validation\Rule;

class MeetupRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $meetupId = Meetup::where('organiser_id', auth()->user()->id)->first();

        return [
            'title' => ['required', Rule::unique('meetups', 'title')->ignore($meetupId, 'id')],
            'description' => ['required', 'max:500'],
            'location' => ['required'],
            'time' => ['required', 'after:now'], 
            'thumbnail' => ['nullable', 'image|mimes:jpeg,png,jpg|max:2048'],
            'category' => ['required', 'in:meetups,static,cruise,club'],
        ];
    }
}
