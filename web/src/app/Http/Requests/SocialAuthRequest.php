<?php

namespace App\Http\Requests;

use Laravel\Passport\Client;
use Dingo\Api\Http\FormRequest;

class SocialAuthRequest extends FormRequest
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
     * Get the fields.
     *
     * @return array
     */
    public function fields()
    {
        $client = Client::findOrFail($this->client_id);

        $this->merge([
            'scope'         => '*',
            'grant_type'    => 'social',
            'client_secret' => $client->secret,
        ]);

        return $this->all();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'client_id'     => 'required|exists:oauth_clients,id',
            'network'       => 'required|in:twitter',
            'access_token'  => 'required'
        ];
    }
}
