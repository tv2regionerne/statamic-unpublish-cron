<?php

namespace Tv2regionerne\StatamicUnpublishCron\Tests;

use Tv2regionerne\StatamicUnpublishCron\ServiceProvider;
use Statamic\Testing\AddonTestCase;

abstract class TestCase extends AddonTestCase
{
    protected string $addonServiceProvider = ServiceProvider::class;
}
