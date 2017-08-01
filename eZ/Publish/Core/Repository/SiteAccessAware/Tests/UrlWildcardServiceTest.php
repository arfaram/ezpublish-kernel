<?php

namespace eZ\Publish\Core\Repository\SiteAccessAware\Tests;

use eZ\Publish\API\Repository\UrlWildcardService as APIService;
use eZ\Publish\API\Repository\Values\Content\URLWildcard;
use eZ\Publish\Core\Repository\SiteAccessAware\UrlWildcardService;

class UrlWildcardServiceTest extends AbstractServiceTest
{
    public function getAPIServiceClassName(): string
    {
        return APIService::class;
    }

    public function getSiteAccessAwareServiceClassName(): string
    {
        return UrlWildcardService::class;
    }

    public function providerForPassTroughMethods(): array
    {
        $urlWildcard = new URLWildcard();

        // string $method, array $arguments, bool $return = true
        return [
            ['create', ['/home', '/and/away', true]],
            ['remove', [$urlWildcard]],
            ['load', [64]],
            ['loadAll', [50, 50]],
            ['translate', ['/and/away']],
        ];
    }

    public function providerForLanguagesLookupMethods(): array
    {
        // string $method, array $arguments, bool $return, int $languageArgumentIndex
        return [];
    }
}
