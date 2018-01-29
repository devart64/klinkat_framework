<?php
/**
 * Created by PhpStorm.
 * User: steph
 * Date: 23/01/2018
 * Time: 15:36
 */

namespace Tests\Framework;


use Framework\Renderer;
use PHPUnit\Framework\TestCase;

class RendererTest extends TestCase
{
    private $renderer;

    public function setUp()
    {
        $this->renderer = new Renderer\PHPRenderer(__DIR__ . '/views');
    }

    public function testRenderTheRightPath()
    {
        // @blog sera remplacé par le namespace configuré précédement
        $this->renderer->addPath( 'blog',__DIR__ . '/views');
        $content = $this->renderer->render('@blog/demo');
        $this->assertEquals('salut les gens', $content);
    }

    public function testRenderTheDefaultPath()
    {
        // @blog sera remplacé par le namespace configuré précédement
        $content = $this->renderer->render('demo');
        $this->assertEquals('salut les gens', $content);
    }

    public function testRenderWithParams()
    {
        // @blog sera remplacé par le namespace configuré précédement
        $content = $this->renderer->render('demoparams', ['nom' => 'Marc']);
        $this->assertEquals('salut Marc', $content);
    }

    public function testGlobalParameters()
    {
        $this->renderer->addGlobal('nom', 'Marc');
        $content = $this->renderer->render('demoparams');
        $this->assertEquals('salut Marc', $content);
    }
}