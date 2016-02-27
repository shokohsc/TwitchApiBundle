<?php

namespace Shoko\TwitchApiBundle\Util;

interface TransformerInterface
{
    public function transform($json);
}
