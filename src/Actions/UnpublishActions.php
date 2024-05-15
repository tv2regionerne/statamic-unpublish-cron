<?php

namespace Tv2regionerne\StatamicUnpublishCron\Actions;

use Carbon\Carbon;

use Statamic\Facades\Collection;
use Statamic\Facades\Entry;

class UnpublishActions
{
    public static function getEntriesToBeUnpublished(): \Illuminate\Support\Collection
    {
        $now = now()->setSeconds(0);

        $collections = config('statamic-unpublish-cron.collections');

        $entriesToBeUnpublished = collect();
        foreach ($collections as $collectionHandle => $field) {
            $entries = Entry::query()
                ->where('collection', $collectionHandle)
                ->where('published', true)
                ->whereNotNull($field)
                ->whereDate($field, '<=', $now)
                ->whereTime($field, '<=', $now)
                ->get();
            $entriesToBeUnpublished = $entriesToBeUnpublished->merge($entries);
        }

        return $entriesToBeUnpublished;
    }
}
