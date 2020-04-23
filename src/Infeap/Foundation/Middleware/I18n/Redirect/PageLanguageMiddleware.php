<?php
/**
 * This file is part of the
 * Infeap Data Manager (https://www.infeap.org/data-manager)
 * open source project.
 *
 * @copyright   2018-2020 Tobias Krebs and the Infeap Team
 * @license     https://www.gnu.org/licenses/gpl.html GNU General Public License 3
 */

namespace Infeap\Foundation\Middleware\I18n\Redirect;

use Infeap\Foundation\I18n\LanguageService;
use Mezzio\Router\RouteResult;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

class PageLanguageMiddleware implements MiddlewareInterface
{
    use RedirectToLanguageTrait;

    protected $languageService;

    public function __construct(LanguageService $languageService)
    {
        $this->languageService = $languageService;
    }

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $routeResult = $request->getAttribute(RouteResult::class);

        if ($routeResult) {
            $matchedRoute = $routeResult->getMatchedRoute();

            if ($matchedRoute) {
                $routeType = $matchedRoute->getOptions()['type'] ?? null;

                if ($routeType == 'page') {
                    $redirectToLanguage = $this->redirectToLanguage($request, $this->languageService);

                    if ($redirectToLanguage) {
                        return $redirectToLanguage;
                    }
                }
            }
        }

        return $handler->handle($request);
    }

}