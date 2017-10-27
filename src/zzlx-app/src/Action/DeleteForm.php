<?php
namespace Zzlx\App\Action;

use Zzlx\App\Form\DeleteForm;
use Zzlx\App\Model\Repository\RepositoryInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Diactoros\Response\RedirectResponse;
use Zend\Expressive\Router\RouterInterface;

/**
 * Class AlbumDeleteFormAction
 *
 * @package Zzlx\App\Action
 */
class DeleteForm
{
    /**
     * @var RouterInterface
     */
    private $router;

    /**
     * @var AlbumRepositoryInterface
     */
    private $repository;

    /**
     * AlbumDeleteHandleAction constructor.
     *
     * @param RouterInterface          $router
     * @param AlbumRepositoryInterface $albumRepository
     */
    public function __construct(
        RouterInterface $router,
        RepositoryInterface $albumRepository
    ) {
        $this->router          = $router;
        $this->repository = $albumRepository;
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

        $album = $this->repository->fetchSingle($id);

        $postData = $request->getParsedBody();

        if (isset($postData['delete_album_yes'])) {
            $this->repository->delete($album);
        }

        return new RedirectResponse(
            $this->router->generateUri('album')
        );
    }
}
