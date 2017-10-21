<?php
namespace Zzlx\Album\Action;

use Zzlx\Album\Model\Repository\RepositoryInterface;

class Ping
{
    /**
     * @var AlbumRepositoryInterface
     */
    private $repository;

    /**
     * @param TemplateRendererInterface $template
     * @param AlbumRepositoryInterface  $albumRepository
     */
    public function __construct( RepositoryInterface $repository) 
    {
        $this->repository = $repository;
    }

    public function __invoke($req, $res, $next)
    {
        $data = new \ArrayObject($this->repository->fetchAll());
        return new \Zend\Diactoros\Response\JsonResponse([
            'ack' => time(),
            'data' => $data,
         ]);
    }
}

