<?php

namespace Kenjiefx\StrawberryFramework\App\Registry;
use Kenjiefx\StrawberryFramework\App\Components\ComponentModel;

class ComponentRegistry
{
    private array $arrayOfComponentModels = [];

    private array $registeredTemplates = [];

    public function register(
        ComponentModel $componentModel
        )
    {
        $templateReference = $componentModel->getTemplateReference();
        if (!in_array($templateReference,$this->registeredTemplates)) {
            $componentReferenceName = $this->generateComponentReferenceName($templateReference,$componentModel->getName());
            echo $componentReferenceName.PHP_EOL;
            $this->arrayOfComponentModels[$componentReferenceName] = $componentModel;
            //array_push($this->registeredTemplates,$templateReference);
        }
    }

    private function generateComponentReferenceName(
        string $templateReference,
        string $componentName
        )
    {
        $incrementor = 1;
        $name = '___'.$templateReference.'__'.$componentName.'_'.$incrementor;
        while(isset($this->arrayOfComponentModels[$name])){
            $name = '___'.$templateReference.'__'.$componentName.'_'.$incrementor++;
        }
        return $name;
    }
}
