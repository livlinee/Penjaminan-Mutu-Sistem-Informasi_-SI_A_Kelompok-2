<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu; 

class MenuController extends Controller
    {
        /**
         * Menampilkan halaman Makanan
         */
        public function makanan()
        {
            $makanan = Menu::where('kategori', 'Makanan')->get();

            return view('pages.makanan', [
                'makanan' => $makanan
            ]);
        }

        /**
         * Menampilkan halaman Detail Makanan
         */
        public function showMakanan($id)
        {
            $item = Menu::findOrFail($id);

            return view('pages.makanan-detail', [
                'item' => $item
            ]);
        }

        /**
         * Menampilkan halaman Minuman
         */
        public function minuman()
        {
            $minuman = Menu::where('kategori', 'Minuman')->get();

            return view('pages.minuman', [
                'minuman' => $minuman
            ]);
        }

        /**
         * Menampilkan halaman Detail Minuman
         * (Kita akan tambahkan route untuk ini di Langkah 3)
         */
        public function showMinuman($id)
        {
            $item = Menu::findOrFail($id);

            return view('pages.minuman-detail', [
                'item' => $item
            ]);
        }
    }
    
