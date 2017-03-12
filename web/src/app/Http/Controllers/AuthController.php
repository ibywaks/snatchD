<?php 

use Exception;
use Socialite;
use Illuminate\Http\Request;
use Laravel\Passport\Client;

class AuthController extends Controller
{
	
	public function index()
	{
		//render sign in using view.....
	}

	public function redirectToProvider(Request $request)
    {
    	if ( !empty( $request->user() ) ) {
    		return redirect('home');
    	}

        return Socialite::driver( $request->provider )->redirect();
    }

    public function handleProviderCallback(Request $request)
    {
    	try {
    		dd(Socialite::driver( $request->provider )->user());

    		$provider_access_token = Socialite::driver( $request->provider )
    										  ->user()->access_token;

    		$this->api->post( url('auth.token'), [
    			'network'		=> $request->provider,
    			'access_token'	=> $provider_access_token,
    			'client_id'		=> ( $client = lient::wherePasswordClient(1)->first() )
    								? $client->id
    								: null;
    		]);

    		return redirect('home');

    	} catch (Exception $e) {
    		return redirect('home');
    	}
    }
}