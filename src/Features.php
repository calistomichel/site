<?php

namespace MichelCalisto\Site;

class Features
{
    /**
     * Determine if the given feature is enabled.
     *
     * @param  string  $feature
     * @return bool
     */
    public static function enabled(string $feature)
    {
        return in_array($feature, config('site.features', []));
    }

    /**
     * Determine if the feature is enabled and has a given option enabled.
     *
     * @param  string  $feature
     * @param  string  $option
     * @return bool
     */
    public static function optionEnabled(string $feature, string $option)
    {
        return static::enabled($feature) &&
               config("site-options.{$feature}.{$option}") === true;
    }

    /**
     * Determine if the application is using any API features.
     *
     * @return bool
     */
    public static function hasSlidersFeatures()
    {
        return static::enabled(static::sliders());
    }

    /**
     * Enable the API feature.
     *
     * @return string
     */
    public static function sliders()
    {
        return 'sliders';
    }
}
