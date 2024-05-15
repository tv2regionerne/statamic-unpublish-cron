<?php
namespace Tv2regionerne\StatamicUnpublishCron\Console\Commands;

use Illuminate\Console\Command;
use Tv2regionerne\StatamicUnpublishCron\Actions\UnpublishActions;
use function Laravel\Prompts\progress;

class UnpublishEntries extends Command
{

    protected $signature = 'unpublish:entries';

    protected $description = 'Unpublish entries which has expired';
    public function handle()
    {
        $entries = UnpublishActions::getEntriesToBeUnpublished();
        if ($entries->count()) {
            progress(
                label: 'Unpublishing entries',
                steps: $entries,
                callback: fn ($entry) => $entry->unpublish(),
                hint: 'This may take some time.',
            );
        }
    }

}
