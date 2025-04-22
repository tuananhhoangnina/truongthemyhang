<?php

namespace Barryvdh\LaravelIdeHelper\Contracts;

use Barryvdh\LaravelIdeHelper\Console\ModelsCommand;
use NINACORE\DatabaseCore\Eloquent\Model;

interface ModelHookInterface
{
    public function run(ModelsCommand $command, Model $model): void;
}
