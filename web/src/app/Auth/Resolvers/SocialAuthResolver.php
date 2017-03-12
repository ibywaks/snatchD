<?php 
namespace App\Auth\Resolvers;

use Adaojunior\Passport\SocialGrantException;
use Adaojunior\Passport\SocialUserResolverInterface;

class SocialAuthResolver implements SocialUserResolverInterface
{
	/**
     * Resolves user by given network and access token.
     *
     * @param string $network
     * @param string $accessToken
     * @return \Illuminate\Contracts\Auth\Authenticatable
     */
    public function resolve($network, $accessToken)
    {
    	switch ($network) {
    		case 'twitter':
    			$resolver = new TwitterResolver($accessToken);
    			break;
            default:
                throw SocialGrantException::invalidNetwork();
                break;
    	}

        return $resolver->getUser();
    }
}