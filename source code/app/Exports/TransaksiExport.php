<?php

namespace App\Exports;

use App\Models\Transaksi;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class TransaksiExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        // 1. Ambil semua transaksi (logika yang sama dari controller Anda)
        $transaksis = Transaksi::orderBy('created_at', 'desc')->get();

        // 2. Grup berdasarkan Order ID
        $groupedTransactions = $transaksis->groupBy('order_group_id');

        // 3. Siapkan data untuk Excel
        $data = [];
        foreach ($groupedTransactions as $orderId => $items) {
            $first = $items->first();
            $total = $items->sum('total_transaksi');

            $data[] = [
                'order_id' => $orderId,
                'pelanggan' => $first->nama_pelanggan,
                'email' => $first->email,
                'meja' => $first->nomor_meja,
                'total' => $total, // Kirim sebagai angka
                'metode' => $first->opsi_pembayaran,
                'tanggal' => $first->created_at?->format('d-m-Y H:i') ?? 'N/A',
            ];
        }

        // 4. Kembalikan sebagai koleksi
        return collect($data);
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        // Ini adalah nama kolom di file Excel Anda
        return [
            'Order ID',
            'Nama Pelanggan',
            'Email',
            'Nomor Meja',
            'Total Pembayaran',
            'Metode',
            'Tanggal Transaksi',
        ];
    }
}
