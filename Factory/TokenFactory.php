<?php

namespace Shoko\TwitchApiBundle\Factory;

use Shoko\TwitchApiBundle\Model\ValueObject\Token;
use Shoko\TwitchApiBundle\Model\ValueObject\Authorization;

/**
 * Class TokenFactory.
 */
class TokenFactory implements FactoryInterface
{
    /**
     * @param array $data
     *
     * @return Authorization
     */
    protected function createAuthorization(array $data)
    {
        return Authorization::create($data);
    }

    /**
     * @param array $data
     * @param false|Token $token
     *
     * @return Token
     */
    public function createEntity(array $data, $token = false)
    {
        if (false === $token) {
            $token = Token::create();
        }

        if (isset($data['authorization'])) {
            $token = $token->setAuthorization($this->createAuthorization($data['authorization']));
        }

        if (isset($data['user_name'])) {
            $token = $token->setUserName($data['user_name']);
        }

        if (isset($data['valid'])) {
            $token = $token->setValid($data['valid']);
        }

        return $token;
    }
}
