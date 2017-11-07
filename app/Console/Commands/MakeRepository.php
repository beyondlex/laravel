<?php

namespace App\Console\Commands;

use Illuminate\Console\GeneratorCommand;
use Illuminate\Support\Str;
use Symfony\Component\Console\Input\InputArgument;

class MakeRepository extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:repository {name} {--interface} {--fake}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a repository';


    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        if ($this->option('interface')) {
            return __DIR__.'/stubs/repository.interface.stub';
        }
        return __DIR__.'/stubs/repository.stub';
    }

    protected function getDefaultNamespace($rootNamespace)
    {
        if ($this->option('interface')) {
            return $rootNamespace. '\Repositories\Contracts';
        } elseif ($this->option('fake')) {
            return $rootNamespace. '\Repositories\Eloquent\Fake';
        } else {
            return $rootNamespace. '\Repositories\Eloquent';
        }
    }

    protected function getArguments()
    {
        return [
            ['name', InputArgument::REQUIRED, 'The name of the repository.'],
        ];
    }

    protected function replaceClass($stub, $name)
    {
        $class = str_replace($this->getNamespace($name).'\\', '', $name);

//        if ($this->option('interface')) {
//            $class .= 'Interface';
//        }

        return str_replace('DummyClass', $class, $stub);
    }

    protected function qualifyClass($name)
    {
        $tail = '';
        if ($this->option('interface')) {
            $tail = 'Interface';
        }

        $name = ltrim($name, '\\/');

        $rootNamespace = $this->rootNamespace();

        if (Str::startsWith($name, $rootNamespace)) {
            return $name. $tail;
        }

        $name = str_replace('/', '\\', $name);

        return $this->qualifyClass(
            $this->getDefaultNamespace(trim($rootNamespace, '\\')).'\\'.$name
        );
    }

}
