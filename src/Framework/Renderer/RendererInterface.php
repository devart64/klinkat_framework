<?php
/**
 * Created by PhpStorm.
 * User: steph
 * Date: 23/01/2018
 * Time: 15:19
 */

namespace Framework\Renderer;

interface RendererInterface
{
    /**
     * Permet de rajouter un chemin pour charger les vues
     * @param string $namespace
     * @param null|string $path
     */
    public function addPath(string $namespace, ?string $path = null): void;
    /**
     * Permet de rendre une vue
     * Le chemin peut être précisé avec des namespace rajoutés via addPath()
     * $this->render('@blog/view');
     * $this->render('view');
     * @param string $view
     * @param array $params
     * @return string
     */
    public function render(string $view, array $params = []): string;
    /**
     * Permet de rajouter des variable gloabals à toutes les vues
     *
     * @param string $key
     * @param $value
     */
    public function addGlobal(string $key, $value): void;
}
