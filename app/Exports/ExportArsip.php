<?php

namespace App\Exports;

use App\Models\Arsip;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ExportArsip implements FromQuery, WithMapping, ShouldAutoSize, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function query()
    {
        return Arsip::query();
    }

    public function map($dtarsip): array
    {
        return [
            $dtarsip->kode_arsip,
            $dtarsip->informasi,
            $dtarsip->nomor,
            $dtarsip->jumlah_berkas,
            $dtarsip->no_item,
            $dtarsip->isi,
            $dtarsip->kurun_waktu,
            $dtarsip->file,
            $dtarsip->keterangan,
            $dtarsip->lokasi
        ];
    }

    public function headings(): array
    {
        return [
            'Kode Arsip',
            'Informasi',
            'Nomor',
            'Jumlah Berkas',
            'No Item',
            'Isi',
            'Kurun Waktu',
            'File',
            'Keterangan',
            'Lokasi',
        ];
    }
}
