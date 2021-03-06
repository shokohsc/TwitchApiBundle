<?php

namespace Shoko\TwitchApiBundle\Model\Entity\Traits;

/**
 * Trait EmailTrait.
 */
trait EmailTrait
{
    /**
     * Email string $email.
     *
     * @var string
     */
    private $email = null;

    /**
     * Get email.
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set email.
     *
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }
}
