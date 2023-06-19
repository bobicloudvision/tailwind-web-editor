<?php

namespace App;

use Illuminate\Support\Str;

class TailwindXModuleManager
{
    /**
     * @var string
     */
    public $id;

    /**
     * @var
     */
    public $params;

    /**
     * The array of class component aliases and their class names.
     *
     * @var array
     */
    protected $classComponentAliases = [];

    public function mount($params = [])
    {
        $this->id = str()->random(20);
        $this->params = $params;

        return $this;
    }

    public function html()
    {
        $type = $this->params['type'];

        $classInstance = false;
        if (isset($this->classComponentAliases[$type])) {
            $classInstance = new $this->classComponentAliases[$type];
        }

        $viewHtml = 'No module found';

        if ($classInstance) {
            $classInstance->setSkin($this->params['skin'] ?? 'default');

            $viewHtml = $classInstance->render();
        }

        return '<div tailwind-x:id="'.$this->id.'" tailwind-x:module="'.$type.'">

        '.$viewHtml.'

        </div>';
    }

    /**
     * Register a class-based component alias directive.
     *
     * @param  string  $class
     * @param  string|null  $alias
     * @param  string  $prefix
     * @return void
     */
    public function component($class, $alias = null, $prefix = '')
    {
        if (! is_null($alias) && str_contains($alias, '\\')) {
            [$class, $alias] = [$alias, $class];
        }

        if (is_null($alias)) {
            $alias = str_contains($class, '\\View\\TailwindXComponents\\')
                ? collect(explode('\\', Str::after($class, '\\View\\TailwindXComponents\\')))->map(function ($segment) {
                    return Str::kebab($segment);
                })->implode(':')
                : Str::kebab(class_basename($class));
        }

        if (! empty($prefix)) {
            $alias = $prefix.'-'.$alias;
        }

        $this->classComponentAliases[$alias] = $class;
    }
}
