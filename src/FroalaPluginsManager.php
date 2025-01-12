<?php

namespace MichielKempen\NovaFroalaField;

use Illuminate\Contracts\Config\Repository;
use Illuminate\Support\Str;
use Laravel\Nova\Nova;

class FroalaPluginsManager implements FroalaPlugins
{
    private $config;

    public function __construct(Repository $config)
    {
        $this->config = $config;
    }

    private function importFontAwesome(): self
    {
        if (Str::startsWith(
            $this->config->get('nova.froala-field.options.iconsTemplate'),
            'font_awesome_5'
        )) {
            Nova::script('font-awesome', 'https://use.fontawesome.com/releases/v5.0.8/js/all.js');
        }

        return $this;
    }

    public function import()
    {
        $this->importFontAwesome();
    }
}
