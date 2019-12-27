<?php

namespace Imanghafoori\Widgets\Utils;

use Imanghafoori\Widgets\Utils\Normalizers\CacheNormalizer;
use Imanghafoori\Widgets\Utils\Normalizers\TemplateNormalizer;
use Imanghafoori\Widgets\Utils\Normalizers\PresenterNormalizer;
use Imanghafoori\Widgets\Utils\Normalizers\ControllerNormalizer;

class Normalizer
{
    private $presenterNormalizer;
    private $templateNormalizer;
    private $cacheNormalizer;
    private $controllerNormalizer;

    /**
     * Normalizer constructor which accepts dependencies.
     * @param TemplateNormalizer $templateNormalizer
     * @param CacheNormalizer $cacheNormalizer
     * @param PresenterNormalizer $presenterNormalizer
     * @param ControllerNormalizer $controllerNormalizer
     */
    public function __construct(
        TemplateNormalizer $templateNormalizer,
        CacheNormalizer $cacheNormalizer,
        PresenterNormalizer $presenterNormalizer,
        ControllerNormalizer $controllerNormalizer
    ) {
        $this->presenterNormalizer = $presenterNormalizer;
        $this->controllerNormalizer = $controllerNormalizer;
        $this->templateNormalizer = $templateNormalizer;
        $this->cacheNormalizer = $cacheNormalizer;
    }

    /**
 * Figures out and sets the widget configs according to conventions.
 * @param object $widget
 */
    public function normalizeWidgetConfig($widget)
    {
        // to avoid normalizing a widget multiple times unnecessarily :
        if (isset($widget->isNormalized)) {
            return;
        }

        $this->controllerNormalizer->normalizeControllerMethod($widget);
        $this->presenterNormalizer->normalizePresenterName($widget);
        $this->templateNormalizer->normalizeTemplateName($widget);
        $this->cacheNormalizer->normalizeCacheLifeTime($widget);
        $this->cacheNormalizer->normalizeCacheTags($widget);
        $this->normalizeContextAs($widget);
        $widget->isNormalized = true;
    }

    /**
     * Figures out and sets json widget configs according to conventions.
     * @param object $widget
     */
    public function normalizeJsonWidget($widget)
    {
        $this->controllerNormalizer->normalizeControllerMethod($widget);
        $this->cacheNormalizer->normalizeCacheLifeTime($widget);
        $this->cacheNormalizer->normalizeCacheTags($widget);
    }

    /**
     * Figures out what the variable name should be in view file.
     * @param object $widget
     * @return null
     */
    private function normalizeContextAs($widget)
    {
        $contextAs = 'data';
        if (property_exists($widget, 'contextAs')) {
            // removes the $ sign.
            $contextAs = str_replace('$', '', (string) $widget->contextAs);
        }
        $widget->contextAs = $contextAs;
    }
}
