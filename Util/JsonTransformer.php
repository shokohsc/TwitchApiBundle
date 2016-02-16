<?php

namespace Shoko\TwitchApiBundle\Util;

/**
 * Class JsonTransformer.
 */
class JsonTransformer
{
    /**
     * Transform Json to Associative Array.
     *
     * @param string $json
     *
     * @return array
     */
    public function transform($json)
    {
        return json_decode($json, true);
    }
}
