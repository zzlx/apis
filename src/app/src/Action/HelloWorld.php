<?php
namespace Zzlx\Album\Action;

class HelloWorld
{
    public function __invoke($req, $res, $next)
    {
        $res->getBody()->write('Hello, world!');
        return $res;
    }
}
