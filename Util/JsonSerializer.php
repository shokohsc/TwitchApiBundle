<?php

namespace Shoko\TwitchApiBundle\Util;

use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;
use Symfony\Component\Serializer\Serializer;

class JsonSerializer
{
    /**
     * @var Serializer
     */
    private $serializer;

    public function __construct()
    {
        $encoders = [new JsonEncoder()];
        $normalizers = [new GetSetMethodNormalizer()];
        $this->serializer = new Serializer($normalizers, $encoders);
    }

    /**
     * @param $data
     *
     * @return string
     */
    public function encode($data)
    {
        return $this->serializer->serialize($data, 'json');
    }
}
