<?php

namespace eZ\Publish\Core\Repository\SiteAccessAware\Tests;

use eZ\Publish\API\Repository\LanguageService as APIService;
use eZ\Publish\API\Repository\Values\Content\Language;
use eZ\Publish\API\Repository\Values\Content\LanguageCreateStruct;
use eZ\Publish\Core\Repository\SiteAccessAware\LanguageService;

class LanguageServiceTest extends AbstractServiceTest
{
    public function getAPIServiceClassName(): string
    {
        return APIService::class;
    }

    public function getSiteAccessAwareServiceClassName(): string
    {
        return LanguageService::class;
    }

    public function providerForPassTroughMethods(): array
    {
        $languageCreateStruct = new LanguageCreateStruct();
        $language = new Language();

        // string $method, array $arguments, bool $return = true
        return [
            ['createLanguage', [$languageCreateStruct]],

            ['updateLanguageName', [$language, 'Afrikaans']],

            ['enableLanguage', [$language]],

            ['disableLanguage', [$language]],

            ['loadLanguage', ['eng-GB']],

            ['loadLanguages', []],

            ['loadLanguageById', [4]],

            ['deleteLanguage', [$language]],

            ['getDefaultLanguageCode', []],

            ['newLanguageCreateStruct', []],
        ];
    }

    public function providerForLanguagesLookupMethods(): array
    {
        // string $method, array $arguments, bool $return, int $languageArgumentIndex
        return [];
    }
}
