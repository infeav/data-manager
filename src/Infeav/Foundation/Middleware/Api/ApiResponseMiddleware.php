<?php
/**
 * This file is part of the
 * Infeav Data Manager (https://www.infeav.org/data-manager)
 * open source project
 *
 * @copyright   2018-2020 Tobias Krebs and the Infeav Team
 * @license     https://www.gnu.org/licenses/gpl.html GNU General Public License 3
 */

namespace Infeav\Foundation\Middleware\Api;

use Infeav\Foundation\Http\Response\ApiResponse;
use Laminas\Diactoros\Response\JsonResponse;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

class ApiResponseMiddleware implements MiddlewareInterface
{

    public function __construct(
        protected bool $isDebugMode,
        protected string $appDir,
    ) { }

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $response = $handler->handle($request);

        if ($response instanceof ApiResponse) {
            $responseData = [];

            if ($response->getKey()) {
                $responseData['key'] = $response->getKey();
            }

            if ($response->getDetails()) {
                $responseData['details'] = $response->getDetails();
            }

            if ($response->getDebug() && $this->isDebugMode) {
                $responseData['debug'] = $response->getDebug();

                $error = $responseData['debug']['error'] ?? null;

                if ($error && $error instanceof \Throwable) {
                    $parseError = function (\Throwable $error) use (&$parseError): array {
                        $errorData = [
                            'message' => $error->getMessage(),
                            'type' => $error::class,
                            'code' => $error->getCode(),
                            'file' => str_replace($this->appDir . '/', '', $error->getFile()),
                            'line' => $error->getLine(),
                        ];

                        $trace = $error->getTrace();

                        if ($trace) {
                            $errorData['trace'] = [];

                            foreach ($trace as $traceElement) {
                                $errorData['trace'][] = [
                                    'file' => str_replace($this->appDir . '/', '', $traceElement['file'] ?? null),
                                    'line' => $traceElement['line'] ?? null,
                                ];
                            }
                        }

                        $previousError = $error->getPrevious();

                        if ($previousError) {
                            $errorData['previous'] = $parseError($previousError);
                        }

                        return $errorData;
                    };

                    $responseData['debug']['error'] = $parseError($error);
                }
            }

            $response = new JsonResponse(
                $responseData,
                $response->getStatusCode(),
                $response->getHeaders(),
            );
        }

        return $response;
    }

}
