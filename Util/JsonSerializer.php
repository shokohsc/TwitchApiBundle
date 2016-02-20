<?php

namespace Shoko\TwitchApiBundle\Util;

use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;
use Symfony\Component\Serializer\Serializer;

/**
 * Class JsonSerializer.
 */
class JsonSerializer
{
    /**
     * @var Serializer $serializer
     */
    private $serializer;

    /**
     * Constructor method.
     */
    public function __construct()
    {
        $encoders = [new JsonEncoder()];
        $normalizers = [new GetSetMethodNormalizer()];
        $this->serializer = new Serializer($normalizers, $encoders);
    }

    /**
     * Encode mixed $data to json string.
     *
     * @param mixed $data
     *
     * @return string
     */
    public function encode($data)
    {
        return $this->serializer->serialize($data, 'json');
    }
}
