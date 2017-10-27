<?php
namespace Zzlx\App\Action;

use Zzlx\App\Form\AlbumDataForm;
use Zzlx\App\Model\Repository\AlbumRepositoryInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Diactoros\Response\RedirectResponse;
use Zend\Expressive\Router\RouterInterface;
use Zend\Expressive\Template\TemplateRendererInterface;

/**
 * Class AlbumUpdateHandleAction
 *
 * @package Zzlx\App\Action
 */
class UpdateHandleAction
{
    /**
     * @var RouterInterface
     */
    private $router;

    /**
     * @var AlbumRepositoryInterface
     */
    private $albumRepository;

    /**
     * @var AlbumDataForm
     */
    private $albumForm;

    /**
     * AlbumUpdateHandleAction constructor.
     *
     * @param RouterInterface           $router
     * @param AlbumRepositoryInterface           $albumRepository
     * @param AlbumDataForm             $albumForm
     */
    public function __construct(
        RouterInterface $router,
        AlbumRepositoryInterface $albumRepository,
        AlbumDataForm $albumForm
    ) {
        $this->router = $router;
        $this->albumRepository = $albumRepository;
        $this->albumForm = $albumForm;
    }

    /**
     * @param ServerRequestInterface $request
     * @param ResponseInterface      $response
     * @param callable|null          $next
     *
     * @return HtmlResponse
     */
    public function __invoke(
        ServerRequestInterface $request,
        ResponseInterface $response,
        callable $next = null
    ) {
        $id = $request->getAttribute('id');

        $postData = $request->getParsedBody();

        $this->albumForm->setData($postData);

        if ($this->albumForm->isValid()) {
            $postData['id'] = $id;

            $album = $this->albumRepository->fetchSingleAlbum($id);
            $album->exchangeArray($postData);

            $this->albumRepository->saveAlbum($album);

            return new RedirectResponse(
                $this->router->generateUri('album')
            );
        }

        return $next($request, $response);
    }
}
