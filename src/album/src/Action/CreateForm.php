<?php
namespace Zzlx\Album\Action;

use ZzlxAlbum\Form\DataForm;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Expressive\Template\TemplateRendererInterface;

/**
 * Class AlbumCreateFormAction
 *
 * @package Album\Action
 */
class CreateForm
{
    /**
     * @var TemplateRendererInterface
     */
    private $template;

    /**
     * @var AlbumDataForm
     */
    private $albumForm;

    /**
     * AlbumCreateFormAction constructor.
     *
     * @param TemplateRendererInterface $template
     * @param AlbumDataForm             $albumForm
     */
    public function __construct(
        TemplateRendererInterface $template,
        DataForm $albumForm
    ) {
        $this->template  = $template;
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
        ServerRequestInterface $request, ResponseInterface $response,
        callable $next = null
    ) {
        if ($this->albumForm->getMessages()) {
            $message = 'Please check your input!';
        } else {
            $message = 'Please enter the new album!';
        }

        $data = [
            'Form' => $this->albumForm,
            'message'   => $message,
        ];

        return new HtmlResponse(
            $this->template->render('album::create', $data)
        );
    }
}

