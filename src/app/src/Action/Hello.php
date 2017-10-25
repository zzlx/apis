<?php
namespace Zzlx\App\Action;

use Interop\Http\ServerMiddleware\MiddlewareInterface;
use Interop\Http\ServerMiddleware\DelegateInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Expressive\Template\TemplateRendererInterface;

class Hello implements MiddlewareInterface
{

    private $renderer;

    public function __construct(TemplateRendererInterface $renderer)
    {
        $this->renderer = $renderer;
    }

    public function process(ServerRequestInterface $request, DelegateInterface $delegate)
    {
        // On all PHP versions:
        $query  = $request->getQueryParams();
        $target = isset($query['target']) ? $query['target'] : 'World';

        $target = htmlspecialchars($target, ENT_HTML5, 'UTF-8');

        return new HtmlResponse(
		    $this->renderer->render('app::hello', ['target' => $target])
		);
    }
}
