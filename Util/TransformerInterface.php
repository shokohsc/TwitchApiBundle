<?php

namespace Shoko\TwitchApiBundle\Util;

/**
 * Interface TransformerInterface.
 */
interface TransformerInterface
{
    public function transform($json);
}
