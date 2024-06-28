<?php

if (!function_exists('kategori_produk')) {
    function kategori_nama($kategori)
    {
        switch ($kategori) {
            case 'kategori_produk':
                return 'Produk';
                break;
            case 'galeri':
                return 'Galeri';
                break;
            case 'tentang_kami':
                return 'Tentang Kami';
                break;
            case 'kontak':
                return 'Kontak';
                break;
            default:
                return 'Unknown';
        }
    }
}
