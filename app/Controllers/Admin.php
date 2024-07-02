<?php

namespace App\Controllers;

use App\Models\SliderModel;
use App\Models\ProductsModel;
use App\Models\GalleryModel;
use App\Models\SettingsModel;
use App\Models\TestimonialsModel;
use App\Models\ImageModel;

class Admin extends BaseController
{

    private $logo;
    private $data;

    public function __construct()
    {
        // parent::__construct();
        $settings = new SettingsModel();
        $this->logo = $settings->getSettings('logo')->getRow()->nilai;
    }

    public function index(): string
    {
        $data['title'] = 'Dashboard';

        return $this->loadView('admin/dashboard', $data);
    }

    // Slider
    public function sliders(): string
    {
        $data['title'] = 'Pengaturan Slider';
        return $this->loadView('admin/sliders', $data);
    }

    public function slidersajax()
    {
        $model = new SliderModel();
        $sliders = $model->findAll();
        return $this->response->setJSON(['data' => $sliders]);
    }

    public function save_sliders()
    {
        $model = new SliderModel();
        $file = $this->request->getFile('file');

        if ($file->isValid() && !$file->hasMoved()) {
            $imgName = $file->getRandomName();
            $file->move('uploads/slider/', $imgName);

            $data = [
                'img' => $imgName,
                'is_active' => $this->request->getPost('status'),
            ];

            $model->insert($data);
            return $this->response->setJSON(['success' => 'File uploaded successfully']);
        }

        return $this->response->setJSON(['error' => 'Failed to upload file']);
    }

    public function status_sliders()
    {
        $model = new SliderModel();
        $id = $this->request->getPost('id');
        $status = $this->request->getPost('is_active');

        $model->update($id, ['is_active' => $status]);

        return $this->response->setJSON(['success' => 'Status updated successfully']);
    }

    public function delete_sliders()
    {
        $model = new SliderModel();
        $id = $this->request->getPost('id');

        $slider = $model->find($id);
        if ($slider) {
            $filePath = 'uploads/slider/' . $slider['img'];
            if (file_exists($filePath)) {
                unlink($filePath);
            }
            $model->delete($id);
            return $this->response->setJSON(['success' => 'Slider deleted successfully']);
        }

        return $this->response->setJSON(['error' => 'Slider not found']);
    }

    public function products()
    {
        $data['title'] = 'Produk';

        return $this->loadView('admin/products', $data);
    }

    public function productsajax()
    {
        $productsModel = new ProductsModel();
        $dataProducts = $productsModel->orderBy('created_at', 'desc')->findAll();
        echo json_encode(['data' => $dataProducts]);
    }

    public function deleteProduct()
    {
        $request = $this->request->getPost();
        $id = $request['id'];

        $productsModel = new ProductsModel();
        $delete = $productsModel->delete($id);

        if ($delete) {
            return $this->response->setJSON(['status' => 'success']);
        } else {
            return $this->response->setJSON(['status' => 'error']);
        }
    }

    public function save_products()
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'nama' => 'required|max_length[255]',
            'file' => 'uploaded[file]|max_size[file,2048]|is_image[file]',
            'harga' => 'required',
            'is_popular' => 'required'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return $this->response->setJSON(['success' => false, 'errors' => $validation->getErrors()]);
        }

        $file = $this->request->getFile('file');
        if ($file->isValid() && !$file->hasMoved()) {
            // $newName = $file->getRandomName();
            $newName = url_title($this->request->getPost('nama'), '-', true) . '-' . $file->getRandomName() . '.' . $file->guessExtension();
            $file->move(FCPATH . 'uploads/products/', $newName);

            $categoryModel = new ProductsModel();
            $categoryModel->save([
                'nama' => $this->request->getPost('nama'),
                'gambar' => $newName,
                'harga' => $this->request->getPost('harga'),
                'is_popular' => $this->request->getPost('is_popular')
            ]);

            return $this->response->setJSON(['success' => true]);
        } else {
            return $this->response->setJSON(['success' => false, 'errors' => 'File upload failed.']);
        }
    }

    public function update_products()
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'id' => 'required',
            'nama' => 'permit_empty|max_length[255]',
            'harga' => 'permit_empty',
            'is_popular' => 'permit_empty',
            'file' => 'permit_empty|uploaded[file]|max_size[file,2048]|is_image[file]' // Validasi file gambar jika ada
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return $this->response->setJSON(['success' => false, 'errors' => $validation->getErrors()]);
        }

        $categoryModel = new ProductsModel();
        $id = $this->request->getPost('id');
        $data = [];

        if ($nama = $this->request->getPost('nama')) {
            $data['nama'] = $nama;
        }
        if ($harga = $this->request->getPost('harga')) {
            $data['harga'] = $harga;
        }
        if ($is_popular = $this->request->getPost('is_popular')) {
            $data['is_popular'] = $is_popular;
        }

        $file = $this->request->getFile('file');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            // $newName = $file->getRandomName();
            $newName = url_title($this->request->getPost('nama'), '-', true) . '-' . $file->getRandomName() . '.' . $file->guessExtension();
            $file->move(FCPATH . 'uploads/products/', $newName);

            // Hapus gambar lama jika ada
            $category = $categoryModel->find($id);
            if ($category && $category['gambar']) {
                $oldImage = $category['gambar'];
                $oldImagePath = FCPATH . 'uploads/products/' . $oldImage;
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            $data['gambar'] = $newName;
        }

        if (!empty($data)) {
            $categoryModel->update($id, $data);
            return $this->response->setJSON(['success' => true]);
        } else {
            return $this->response->setJSON(['success' => false, 'errors' => ['No data to update']]);
        }
    }

    public function toggleIsPopular()
    {
        $model = new ProductsModel();
        $id = $this->request->getPost('id');
        $status = $this->request->getPost('is_popular');

        $model->update($id, ['is_popular' => $status]);

        return $this->response->setJSON(['success' => 'Status updated successfully']);
    }


    // Gallery 
    public function gallery()
    {
        $model = new GalleryModel();
        $data['galeris'] = $model->getGallery();
        $data['title'] = 'Galeri';


        return $this->loadView('admin/gallery', $data);
    }

    public function galleryajax()
    {
        $model = new GalleryModel();
        $gallery = $model->getGallery();
        return $this->response->setJSON(['data' => $gallery]);
    }

    public function save_gallery()
    {
        $model = new GalleryModel();
        $file = $this->request->getFile('file');

        if ($file && $file->isValid() && !$file->hasMoved()) {
            // $imgName = $file->getRandomName();
            $imgName = url_title($this->request->getPost('kategori'), '-', true) . '-' . $file->getRandomName() . '.' . $file->guessExtension();
            $file->move('uploads/gallery/', $imgName);

            $data = [
                'img' => $imgName,
                'is_active' => $this->request->getPost('status') == 1 ? 1 : 0,
                'is_show_home' => $this->request->getPost('show_home') == 1 ? 1 : 0,
                'kategori' => $this->request->getPost('kategori'),
            ];

            $model->insert($data);

            return $this->response->setJSON(['success' => 'File uploaded successfully']);
        }

        return $this->response->setJSON(['error' => 'Failed to upload file']);
    }

    public function status_gallery()
    {
        $model = new GalleryModel();
        $id = $this->request->getPost('id');
        $status = $this->request->getPost('is_active');

        $model->update($id, ['is_active' => $status]);

        return $this->response->setJSON(['success' => 'Status updated successfully']);
    }

    public function delete_gallery()
    {
        $model = new GalleryModel();
        $id = $this->request->getPost('id');

        $galeri = $model->find($id);
        if ($galeri) {
            unlink('uploads/gallery/' . $galeri['img']); // perbaiki path penghapusan file
            $model->delete($id);
            return $this->response->setJSON(['success' => 'Galeri deleted successfully']);
        }

        return $this->response->setJSON(['error' => 'Galeri not found']);
    }

    public function showhome_gallery()
    {
        $model = new GalleryModel();
        $id = $this->request->getPost('id');
        $is_show_home = $this->request->getPost('is_show_home');

        $model->update($id, ['is_show_home' => $is_show_home]);

        return $this->response->setJSON(['success' => 'Show Home status updated successfully']);
    }


    public function page_setting()
    {
        $data['title'] = 'Pengaturan Halaman';
        // $data['current_uri'] = service('uri')->getSegment(2);

        // Mendapatkan data setting dari database (hanya nomor 11 - 15)
        $model = new SettingsModel();
        $parameters = ['text-tentang', 'text-produk', 'text-galeri', 'text-kontak', 'text-slider', 'text-welcome'];

        $data['setting'] = $model->getSpecificSettings($parameters);

        return $this->loadView('admin/page_setting', $data);
    }

    public function update_page_setting()
    {
        $model = new SettingsModel();

        $parameters = ['text-tentang', 'text-produk', 'text-galeri', 'text-kontak', 'text-slider', 'text-welcome'];
        $errors = [];

        foreach ($parameters as $param) {
            $value = $this->request->getPost($param);
            if ($value !== null) {
                if (!$model->where('parameter', $param)->set(['nilai' => $value])->update()) {
                    $errors[] = "Failed to update {$param}";
                }
            }
        }

        if (empty($errors)) {
            $response = [
                'status' => 'success',
                'message' => 'Data berhasil diupdate.'
            ];
        } else {
            $response = [
                'status' => 'error',
                'message' => implode(", ", $errors)
            ];
        }

        return $this->response->setJSON($response);
    }


    public function system_setting()
    {
        $data['title'] = 'Pengaturan Sistem';
        // $data['current_uri'] = service('uri')->getSegment(2);

        // Mendapatkan data setting dari database (hanya nomor 1 - 10)
        $model = new SettingsModel();
        $parameters = ['site-title', 'site-desc', 'instagram', 'facebook', 'whatsapp', 'logo', 'website', 'alamat', 'gambartoko1', 'alamat2', 'gambartoko2'];
        $data['setting'] = $model->getSpecificSettings($parameters);

        return $this->loadView('admin/system_setting', $data);
    }


    public function update_system_setting()
    {
        $model = new SettingsModel();

        $parameters = ['site-title', 'site-desc', 'instagram', 'facebook', 'whatsapp', 'logo', 'website', 'alamat', 'gambartoko1', 'alamat2', 'gambartoko2'];

        $errors = [];
        foreach ($parameters as $param) {
            $value = $this->request->getPost($param);
            if ($value !== null) {
                if (!$model->where('parameter', $param)->set(['nilai' => $value])->update()) {
                    $errors[] = "Failed to update {$param}";
                }
            }
        }

        if (empty($errors)) {
            $response = [
                'status' => 'success',
                'message' => 'Data berhasil diupdate.'
            ];
        } else {
            $response = [
                'status' => 'error',
                'message' => implode(", ", $errors)
            ];
        }

        return $this->response->setJSON($response);
    }



    // Upload image function
    public function upload_image()
    {
        $file = $this->request->getFile('file');

        if ($file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $filePath = 'uploads/sistem/' . $newName;

            // Move the uploaded file to the specified directory
            $file->move(FCPATH . 'uploads/sistem/', $newName);

            // Create response to send back to Dropzone
            $response = [
                'status' => 'success',
                'filePath' => $filePath  // Just the file name without base_url
            ];

            return $this->response->setJSON($response);
        } else {
            // If file is not valid or upload failed, send error response
            return $this->response->setJSON(['status' => 'error', 'message' => 'File upload failed']);
        }
    }


    // Testimonial 
    public function testimonials()
    {
        $model = new TestimonialsModel();
        $data['testimonials'] = $model->getTestimonials();
        $data['title'] = 'Testimonial';

        return $this->loadView('admin/testimonials', $data);
    }

    public function testimonialsajax()
    {
        $model = new TestimonialsModel();
        $testimonials = $model->getTestimonials();
        return $this->response->setJSON(['data' => $testimonials]);
    }

    public function save_testimonials()
    {
        $model = new TestimonialsModel();
        $file = $this->request->getFile('file');

        if ($file && $file->isValid() && !$file->hasMoved()) {
            $imgName = $file->getRandomName();
            $file->move('uploads/testimonials/', $imgName);

            $data = [
                'gambar' => $imgName,
                'is_active' => $this->request->getPost('status') == 1 ? 1 : 0,
            ];

            $model->insert($data);

            return $this->response->setJSON(['success' => 'File uploaded successfully']);
        }

        return $this->response->setJSON(['error' => 'Failed to upload file']);
    }

    public function status_testimonials()
    {
        $model = new TestimonialsModel();
        $id = $this->request->getPost('id');
        $status = $this->request->getPost('is_active');

        $model->update($id, ['is_active' => $status]);

        return $this->response->setJSON(['success' => 'Status updated successfully']);
    }

    public function delete_testimonials()
    {
        $model = new TestimonialsModel();
        $id = $this->request->getPost('id');

        $testimonial = $model->find($id);
        if ($testimonial) {
            $filePath = 'uploads/testimonials/' . $testimonial['gambar'];
            if (file_exists($filePath)) {
                unlink($filePath);
            }
            $model->delete($id);
            return $this->response->setJSON(['success' => 'Testimoni berhasil dihapus!']);
        }

        return $this->response->setJSON(['error' => 'Testimoni tidak ditemukan!']);
    }

    private function loadView(string $viewName, array $data = []): string
    {
        $uri = service('uri');
        $data['current_uri'] = $uri->getSegment(2); // Ambil segmen kedua dari URI
        $data['logo'] = $this->logo;
        $data['txtpaneladmin'] = "Panel Administrator";

        return view($viewName, $data);
    }
}
