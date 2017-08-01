<?php

namespace eZ\Publish\Core\Repository\SiteAccessAware\Tests;

use eZ\Publish\API\Repository\FieldTypeService as APIService;
use eZ\Publish\Core\Repository\SiteAccessAware\FieldTypeService;

class FieldTypeServiceTest extends AbstractServiceTest
{
    public function getAPIServiceClassName(): string
    {
        return APIService::class;
    }

    public function getSiteAccessAwareServiceClassName(): string
    {
        return FieldTypeService::class;
    }

    public function providerForPassTroughMethods(): array
    {
        // string $method, array $arguments, bool $return = true
        return [
            ['getFieldTypes', []],

            ['getFieldType', ['ezrichtext']],

            ['hasFieldType', ['ezrichtext']],
        ];
    }

    public function providerForLanguagesLookupMethods(): array
    {
        // string $method, array $arguments, bool $return, int $languageArgumentIndex
        return [];
    }
}
