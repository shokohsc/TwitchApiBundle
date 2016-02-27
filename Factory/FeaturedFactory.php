<?php

namespace Shoko\TwitchApiBundle\Factory;

use Shoko\TwitchApiBundle\Model\Entity\Featured;
use Shoko\TwitchApiBundle\Model\Entity\FeaturedStream;
use Shoko\TwitchApiBundle\Factory\StreamFactory;

/**
 * Class FeaturedFactory.
 */
class FeaturedFactory implements FactoryInterface
{
    /**
     * @param array      $data
     * @param false|Featured $featured
     *
     * @return Featured
     */
    public function createEntity(array $data, $featured = false)
    {
        if (false === $featured) {
            $featured = Featured::create();
        }

        if (isset($data['featured'])) {
            $featured = $featured->setFeatureds($this->createFeaturedStreams($data['featured']));
        }

        if (isset($data['_links'])) {
            $featured = $featured->setLinks($data['_links']);
        }

        return $featured;
    }

    /**
     * @param array $featureds
     *
     * @return array
     */
    public function createFeaturedStreams(array $featureds)
    {
        $tmp = [];
        foreach ($featureds as $entry) {
            $featured = FeaturedStream::create();

            if (isset($entry['stream'])) {
                $featured->setStream((new StreamFactory())->createEntity($entry['stream']));
            }

            if (isset($entry['image'])) {
                $featured->setImage($entry['image']);
            }

            if (isset($entry['text'])) {
                $featured->setText($entry['text']);
            }

            if (isset($entry['title'])) {
                $featured->setTitle($entry['title']);
            }

            if (isset($entry['sponsored'])) {
                $featured->setSponsored($entry['sponsored']);
            }

            if (isset($entry['scheduled'])) {
                $featured->setScheduled($entry['scheduled']);
            }

            $tmp[] = $featured;
        }

        return $tmp;
    }
}
