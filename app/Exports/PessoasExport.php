<?php
namespace App\Exports;

use App\Pessoa;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;

class PessoasExport implements FromQuery
{
    use Exportable;

    public function query()
    {
        return Pessoa::query();
    }
}
