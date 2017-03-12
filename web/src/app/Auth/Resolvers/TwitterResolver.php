<?php 
namespace App\Auth\Resolvers;

use App\User;
use Socialite;
use Exception;
use App\SocialAccountService;

class TwitterResolver
{
	
	/**
	* Twitter access token
	* @var string
	*/
	protected $accessToken;

	/**
	* Socialite instance
	*/
	protected $socialite;

	/**
	* Social account service instance
	*/
	protected $socialAccount;



	public function __construct($accessToken)
	{
		$this->accessToken 		= $accessToken;
		$this->socialite 		= Socialite::driver('twitter');
		$this->socialAccount 	= new SocialAccountService;
	}

	 /**
     * Resolves user by twitter access token.
     *
     * @param  string $accessToken
     * @return \App\User
     */
    public function getUser()
    {
        try {
            if ( ! $user = $this->socialite->userFromToken($this->access_token)) {
                return false;
            }

            return $this->socialAccount->createOrGetUser($user, 'twitter');
        } catch (Exception $e) {
            return false;
        }
    }
}