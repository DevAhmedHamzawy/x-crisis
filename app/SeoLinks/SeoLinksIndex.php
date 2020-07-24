<?php

namespace App\SeoLinks;

use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\SEOTools;

class SeoLinksIndex
{
    public static function getLinks($title, $description, $graphUrl, $canonical, $twitterLink, $image)
    {
        SEOTools::setTitle($title);
        SEOTools::setDescription($description);
        SEOTools::opengraph()->setUrl($graphUrl);
        SEOTools::setCanonical($canonical);
        SEOTools::opengraph()->addProperty('type', 'Business Development');
        SEOTools::opengraph()->addProperty('type', 'تطوير حلول');
        SEOTools::opengraph()->addProperty('type', 'موقع تطوير حلول');
        SEOTools::opengraph()->addProperty('type', 'موقع لتطوير الحلول');
        SEOMeta::addKeyword(['x-crisis' , 'تطوير الحلول' , 'Business Development']);
        SEOTools::twitter()->setSite($twitterLink);
        SEOTools::jsonLd()->addImage($image);
    }
}