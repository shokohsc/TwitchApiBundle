<?php

namespace Shoko\TwitchApiBundle\Util;

use Shoko\TwitchApiBundle\Exception\JsonTransformerException;

/**
 * Class JsonTransformer.
 */
class JsonTransformer implements TransformerInterface
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
        if (!is_string($json)) {
            throw new \InvalidArgumentException('$json variable is not a string.');
        }
        $assocArrayJson = json_decode($json, true);

        return $this->checkDecodedJson($assocArrayJson);
    }

    /**
     * Verification if no json error has occured.
     *
     * @param string $assocArrayJson
     *
     * @throws JsonTransformerException
     *
     * @return string
     */
    private function checkDecodedJson($assocArrayJson)
    {
        if (JSON_ERROR_NONE !== json_last_error()) {
            throw new JsonTransformerException(json_last_error_msg());
        }

        return $assocArrayJson;
    }
}
