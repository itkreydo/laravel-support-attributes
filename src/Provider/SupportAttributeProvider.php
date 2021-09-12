<?php

namespace App\LaravelAttribute\src\Provider;

use App\Attributes\Required;
use Illuminate\Support\ServiceProvider;
use ReflectionClass;

use const PHP_VERSION_ID;

class SupportAttributeProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->resolving(static function ($object, $app) {
            $reflectionClass = new ReflectionClass($object);

            foreach ($reflectionClass->getMethods() as $reflectionMethod) {
                if (PHP_VERSION_ID >= 80000 && $reflectionMethod->getAttributes(Required::class)) {
                    $app->call([$object, $reflectionMethod->getName()]);
                }
            }
        });
    }
}
