<?php
/**
 * This file is part of the
 * Infeav Data Manager (https://www.infeav.org/data-manager)
 * open source project
 *
 * @copyright   2018-2020 Tobias Krebs and the Infeav Team
 * @license     https://www.gnu.org/licenses/gpl.html GNU General Public License 3
 */

namespace Infeav\Foundation\Template\Twig;

use Infeav\Foundation\I18n\LanguageService;
use Infeav\Foundation\I18n\Translator;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;

class TranslationExtension extends AbstractExtension
{

    public function __construct(
        protected Translator $translator,
        protected LanguageService $languageService,
    ) { }

    public function getFilters(): array
    {
        return [
            new TwigFilter('trans', [$this, 'translate']),
            new TwigFilter('trans_on_demand', [$this, 'translateOnDemand']),
            new TwigFilter('trans_list', [$this, 'translateList']),
            new TwigFilter('trans_plural', [$this, 'translatePlural']),
            new TwigFilter('trans_plural_list', [$this, 'translatePluralList']),
        ];
    }

    public function translate(string $key, string $textDomain = 'foundation', ?string $languageTag = null): string
    {
        return $this->translator->translate($key, $textDomain, $languageTag);
    }

    public function translateOnDemand(string $key, string $textDomain = 'foundation', ?string $languageTag = null): string
    {
        return $this->translator->translateOnDemand($key, $textDomain, $languageTag);
    }

    public function translateList(string $key, string $textDomain = 'foundation', ?string $languageTag = null): array
    {
        return $this->translator->translateList($key, $textDomain, $languageTag);
    }

    public function translatePlural(string $key, int $number, string $textDomain = 'foundation', ?string $languageTag = null): string
    {
        return $this->translator->translatePlural($key, $number, $textDomain, $languageTag);
    }

    public function translatePluralList(string $key, int $number, string $textDomain = 'foundation', ?string $languageTag = null): array
    {
        return $this->translator->translatePluralList($key, $number, $textDomain, $languageTag);
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('current_language', [$this, 'getCurrentLanguage']),
            new TwigFunction('fallback_language', [$this, 'getFallbackLanguage']),
            new TwigFunction('supported_languages', [$this, 'getSupportedLanguages']),
        ];
    }

    public function getCurrentLanguage(): string
    {
        return $this->languageService->getCurrentLanguage();
    }

    public function getFallbackLanguage(): ?string
    {
        return $this->languageService->getFallbackLanguage();
    }

    public function getSupportedLanguages(): array
    {
        return $this->languageService->getSupportedLanguages() ?: [];
    }

}
