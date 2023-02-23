<?php

namespace App\Jobs;

use App\Exports\StoreJournalExport;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class ProcessDownloadDataAsCsvJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Number of tries when the failes.
     *
     * @var integer
     */
    protected int $tries = 1;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(
        private array $data, 
        private string $recipient
    ) {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Excel::store(new StoreJournalExport($this->data), $this->path(), 'local');
    }

    /**
     * Generates the path the file will be stored and a unique file name.
     *
     * @return string
     */
    private function path(): string
    {        
        return public_path('downloads/' . now() . '-store-journals.csv');
    }
}
