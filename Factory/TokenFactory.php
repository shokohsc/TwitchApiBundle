<?php

namespace Shoko\TwitchApiBundle\Factory;

use Shoko\TwitchApiBundle\Model\Entity\ValueObject\Token;
use Shoko\TwitchApiBundle\Model\Entity\ValueObject\Authorization;
use Shoko\TwitchApiBundle\Factory\FactoryInterface;

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
    protected function createAuthorization($data)
    {
        return Authorization::create($data);
    }

    /**
     * @param array $data
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
