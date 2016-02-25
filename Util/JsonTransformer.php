<?php

namespace Shoko\TwitchApiBundle\Util;
use Shoko\TwitchApiBundle\Exception\JsonTransformerException;

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
        $array = json_decode($json, true);

        if (null === $array) {
            $array = $this->check($array);
        }

        return $array;
    }

    /**
     * Verification if no json error has occured.
     *
     * @param  string $array
     *
     * @throws JsonTransformerException
     *
     * @return string
     */
    private function check($array)
    {
        switch (json_last_error()) {
            case JSON_ERROR_NONE:
                return $array;
            break;
            case JSON_ERROR_DEPTH:
                throw new JsonTransformerException(json_last_error_msg());
            break;
            case JSON_ERROR_STATE_MISMATCH:
                throw new JsonTransformerException(json_last_error_msg());
            break;
            case JSON_ERROR_CTRL_CHAR:
                throw new JsonTransformerException(json_last_error_msg());
            break;
            case JSON_ERROR_SYNTAX:
                throw new JsonTransformerException(json_last_error_msg());
            break;
            case JSON_ERROR_UTF8:
                throw new JsonTransformerException(json_last_error_msg());
            break;
            case JSON_ERROR_RECURSION:
                throw new JsonTransformerException(json_last_error_msg());
            break;
            case JSON_ERROR_INF_OR_NAN:
                throw new JsonTransformerException(json_last_error_msg());
            break;
            case JSON_ERROR_UNSUPPORTED_TYPE:
                throw new JsonTransformerException(json_last_error_msg());
            break;
            default:
                throw new JsonTransformerException('Unknown json_decode error');
            break;
        }
    }
}
