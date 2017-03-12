<?php

namespace App\Http\Controllers;

use Exception;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Requests\SocialAuthRequest;
use GuzzleHttp\Exception\BadResponseException;

class SocialAuthController extends Controller
{
    /**
     * Issue access token from the social access token.
     *
     * @param  SocialAuthRequest $request
     * @return \Illuminate\Http\Response
     */
    public function issueToken(SocialAuthRequest $request)
    {
    	try {
    		$response = (new Client)->post($this->tokenRequestUrl(), [
    			'form_params'	=> $request->fields(),
    		]);

    		$statusCode = 200;
            $response   = $response->getBody();		
    	} catch (BadResponseException $e) {
    		$response   = $e->getResponse()->getBody();
            $statusCode = $e->getResponse()->getStatusCode();
    	}

    	return response(json_decode($response, true), $statusCode);
    }

    /**
     * Get the token request URL.
     *
     * @return string
     */
    protected function tokenRequestUrl()
    {
        return app('url')->to('oauth/token');
    }
}
