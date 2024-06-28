<?php

namespace App\Controllers;

use App\Models\SettingsModel;
use App\Models\ProductsModel;
use App\Models\GalleryModel;
use App\Models\WebtextModel;
use App\Models\SliderModel;

class Home extends BaseController
{
    public function index()
    {
        $data['current_uri'] = service('uri')->getSegment(1); // Get the first segment of the URI

        //settingan secara umum
        $settings = new SettingsModel();
        $data['sitetitle'] = $settings->getSettings('site-title')->getRow()->nilai;
        $data['sitedesc'] = $settings->getSettings('site-desc')->getRow()->nilai;
        $data['textslider'] = $settings->getSettings('text-slider')->getRow()->nilai;
        $data['favicon'] = $settings->getSettings('favicon')->getRow()->nilai;
        $data['faviconapple'] = $settings->getSettings('favicon-apple')->getRow()->nilai;
        $data['logo'] = $settings->getSettings('logo')->getRow()->nilai;
        $data['whatsapp'] = $settings->getSettings('whatsapp')->getRow()->nilai;
        $data['instagram'] = $settings->getSettings('instagram')->getRow()->nilai;
        $data['facebook'] = $settings->getSettings('facebook')->getRow()->nilai;

        //section tentang kami
        $data['texttentang'] = $settings->getSettings('text-tentang')->getRow()->nilai;

        //section Welcome
        $data['textwelcome'] = $settings->getSettings('text-welcome')->getRow()->nilai;

        //section produk
        $data['textproduk'] = $settings->getSettings('text-produk')->getRow()->nilai;
        $products = new ProductsModel();
        $data['produk'] = $products->getProducts();

        //section galeri
        $data['textgaleri'] = $settings->getSettings('text-galeri')->getRow()->nilai;
        $gallery = new GalleryModel();
        $data['galeri'] = $gallery->getGallery();

        $data['kategori_galeri'] = $gallery->getGalleryCategory();

        $slider = new SliderModel();
        $data['sliders'] = $slider->getSliders();

        //section kontak
        $data['textkontak'] = $settings->getSettings('text-kontak')->getRow()->nilai;
        $data['alamat1'] = $settings->getSettings('alamat1')->getRow()->nilai;
        $data['alamat2'] = $settings->getSettings('alamat2')->getRow()->nilai;
        $data['linkalamat1'] = $settings->getSettings('linkalamat1')->getRow()->nilai;
        $data['linkalamat2'] = $settings->getSettings('linkalamat2')->getRow()->nilai;

        echo view('home/landing', $data);
    }
}
