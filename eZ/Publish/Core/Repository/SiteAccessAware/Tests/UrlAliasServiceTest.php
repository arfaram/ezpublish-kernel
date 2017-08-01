<?php

namespace eZ\Publish\Core\Repository\SiteAccessAware\Tests;

use eZ\Publish\API\Repository\URLAliasService as APIService;
use eZ\Publish\Core\Repository\SiteAccessAware\URLAliasService;
use eZ\Publish\Core\Repository\Values\Content\Location;

class UrlAliasServiceTest extends AbstractServiceTest
{
    public function getAPIServiceClassName(): string
    {
        return APIService::class;
    }

    public function getSiteAccessAwareServiceClassName(): string
    {
        return URLAliasService::class;
    }

    public function providerForPassTroughMethods(): array
    {
        $location = new Location();

        // string $method, array $arguments, bool $return = true
        return [
            ['createUrlAlias', [$location, '/Tomb/Raider', 'eng-AU', true, true]],
            ['createGlobalUrlAlias', ['root:bla', '/Tomb/Raider', 'eng-AU', true, true]],
            ['listGlobalAliases', ['eng-AU', 50, 50]],
            ['removeAliases', [[555]]],
            ['lookup', [['/James', 'eng-GB']]],
            ['load', [[555]]],
        ];
    }

    public function providerForLanguagesLookupMethods(): array
    {
        $location = new Location();

        // string $method, array $arguments, bool $return, int $languageArgumentIndex
        return [
            ['listLocationAliases', [$location, false, 'eng-AU', true, self::LANG_ARG], true, 4],
            ['reverseLookup', [$location, 'eng-AU', true, self::LANG_ARG], true, 3],
        ];
    }
}
