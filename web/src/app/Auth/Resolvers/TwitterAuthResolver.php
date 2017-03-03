<?php 
namespace App\Auth\Resolvers;

use App\User;
use Socialite;
use Exception;

class TwitterAuthResolver
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
		$this->socialAccount
	}
}