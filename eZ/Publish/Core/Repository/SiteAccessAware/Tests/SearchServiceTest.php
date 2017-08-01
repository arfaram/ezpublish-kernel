<?php

namespace eZ\Publish\Core\Repository\SiteAccessAware\Tests;

use eZ\Publish\API\Repository\SearchService as APIService;
use eZ\Publish\API\Repository\Values\Content\LocationQuery;
use eZ\Publish\API\Repository\Values\Content\Query;
use eZ\Publish\Core\Repository\SiteAccessAware\SearchService;

class SearchServiceTest extends AbstractServiceTest
{
    public function getAPIServiceClassName(): string
    {
        return APIService::class;
    }

    public function getSiteAccessAwareServiceClassName(): string
    {
        return SearchService::class;
    }

    public function providerForPassTroughMethods(): array
    {
        // string $method, array $arguments, bool $return = true
        return [
            ['suggest', ['prefix', [], 11]],
        ];
    }

    public function providerForLanguagesLookupMethods(): array
    {
        $query = new Query();
        $locationQuery = new LocationQuery();
        $criterion = new Query\Criterion\ContentId(44);

        // string $method, array $arguments, bool $return, int $languageArgumentIndex
        return [
            ['findContent', [$query, [], false], true, 1],
            ['findContentInfo', [$query, [], false], true, 1],
            ['findSingle', [$criterion, [], false], true, 1],
            ['findLocations', [$locationQuery, [], false], true, 1],
        ];
    }

    protected function getLanguageArgument(array $languages)
    {
        return ['languages' => $languages];
    }
}
