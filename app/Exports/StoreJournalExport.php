<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;

class StoreJournalExport implements FromArray
{

    /**
     * Create new class intance.
     *
     * @param array $journals
     */
    public function __construct(
        private array $journals
    ) {
        //
    }

    /**
    * @return array
    */
    public function array(): array
    {
        return $this->journals;
    }
}
