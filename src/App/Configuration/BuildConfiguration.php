<?php

namespace Kenjiefx\StrawberryFramework\App\Configuration;

/**
 * Class BuildConfiguration
 * Settings and configuration when calling the strawberry build command
 */
class BuildConfiguration
{
    public function __construct(
        private array $configuration
        )
    {
        
    }

    public function useReadableComponentNames()
    {
        return $this->configuration['useReadableComponentName'] ?? false;
    }
}
