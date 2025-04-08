<?php

namespace App\Exports;

use App\Models\Transaksi;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class TransaksiExcelExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Transaksi::with(['pelanggan', 'user'])->get();
    }

    public function map($transaksi): array
    {
        return [
            $transaksi->id,
            $transaksi->tanggal,
            $transaksi->pelanggan->nama ?? '-',
            $transaksi->user->name ?? '-',
            $transaksi->harga,
        ];
    }

    public function headings(): array
    {
        return [
            'ID',
            'Tanggal',
            'Pelanggan',
            'User',
            'Total Harga',
        ];
    }
}
