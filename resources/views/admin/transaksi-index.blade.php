<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Laporan Transaksi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-2xl font-bold">Riwayat Semua Transaksi</h3>

                        {{-- TOMBOL BARU --}}
                        <a href="{{ route('admin.transaksi.export') }}"
                            class="bg-green-600 text-white font-medium py-2 px-4 rounded-lg hover:bg-green-700 text-sm flex items-center gap-2">
                            {{-- Ikon download opsional --}}
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                            </svg>
                            Export ke Excel
                        </a>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 border">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Order ID
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                        Pelanggan</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Meja
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Total
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Metode
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tanggal
                                    </th>
                                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">Aksi
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse ($groupedTransactions as $orderId => $transaksis)
                                    @php
                                        // Ambil data umum dari item pertama (karena semuanya sama)
                                        $first = $transaksis->first();
                                        // Hitung total harga dari SEMUA item dalam grup ini
                                        $total = $transaksis->sum('total_transaksi');
                                    @endphp
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">{{ $orderId }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm">{{ $first->nama_pelanggan }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm">{{ $first->nomor_meja }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-bold">Rp.
                                            {{ number_format($total, 0, ',', '.') }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm">{{ $first->opsi_pembayaran }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                                            {{ $first->created_at?->format('d M Y, H:i') ?? 'N/A' }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            {{-- Kita gunakan lagi route 'struk.show' yang sudah ada --}}
                                            <a href="{{ route('struk.show', $orderId) }}" target="_blank"
                                                class="text-blue-600 hover:text-blue-900">
                                                Lihat Struk
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="px-6 py-4 text-center text-gray-500">
                                            Belum ada transaksi yang tercatat.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
