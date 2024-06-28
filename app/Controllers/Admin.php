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
    public function index(): string
    {
        $data['title'] = 'Dashboard';
        return $this->loadView('admin/dashboard', $data);
    }

    // Slider
    public function sliders(): string
    {
        $model = new SliderModel();
        $data['sliders'] = $model->findAll();
        $data['title'] = 'Pengaturan Slider';

        return $this->loadView('admin/sliders', $data);
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
                'title' => $this->request->getPost('title'),
                'subtitle' => $this->request->getPost('subtitle'),
                'is_active' => $this->request->getPost('status') === 'active' ? 1 : 0
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
        $status = $this->request->getPost('status');

        $model->update($id, ['is_active' => $status]);

        return $this->response->setJSON(['success' => 'Status updated successfully']);
    }

    public function delete_sliders()
    {
        $model = new SliderModel();
        $id = $this->request->getPost('id');

        $slider = $model->find($id);
        if ($slider) {
            unlink('uploads/slider/' . $slider['img']);
            $model->delete($id);
            return $this->response->setJSON(['success' => 'Slider deleted successfully']);
        }

        return $this->response->setJSON(['error' => 'Slider not found']);
    }

    // Products
    public function products()
    {
        $categoryModel = new ProductsModel();
        $data['categories'] = $categoryModel->findAll();
        $data['title'] = 'Produk';
        $data['current_uri'] = service('uri')->getSegment(2); // atau segment yang sesuai

        return view('admin/products', $data);
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
            $newName = $file->getRandomName();
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


    public function delete_products($id)
    {
        $categoryModel = new ProductsModel();

        // Ambil nama file gambar dari database
        $category = $categoryModel->find($id);
        if (!$category) {
            return $this->response->setJSON(['success' => false]);
        }

        $gambar = $category['gambar'];

        // Hapus entri kategori dari database
        if ($categoryModel->delete($id)) {
            // Hapus file gambar dari direktori
            $gambarPath = FCPATH . 'uploads/products/' . $gambar;
            if (file_exists($gambarPath)) {
                unlink($gambarPath);
            }

            return $this->response->setJSON(['success' => true]);
        } else {
            return $this->response->setJSON(['success' => false]);
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
            $newName = $file->getRandomName();
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
        $data['current_uri'] = service('uri')->getSegment(2); // atau segment yang sesuai

        return view('admin/gallery', $data);
    }

    public function save_gallery()
    {
        $model = new GalleryModel();
        $file = $this->request->getFile('file');

        if ($file && $file->isValid() && !$file->hasMoved()) {
            $imgName = $file->getRandomName();
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
        $status = $this->request->getPost('status');

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
        $data['current_uri'] = service('uri')->getSegment(2);

        // Mendapatkan data setting dari database (hanya nomor 11 - 15)
        $model = new SettingsModel();
        $parameters = ['text-tentang', 'text-produk', 'text-galeri', 'text-kontak', 'text-slider'];

        $data['setting'] = $model->getSpecificSettings($parameters);

        return view('admin/page_setting', $data);
    }

    public function update_page_setting()
    {
        $model = new SettingsModel();

        $parameters = ['text-tentang', 'text-produk', 'text-galeri', 'text-kontak', 'text-slider'];
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


    private function loadView(string $viewName, array $data = []): string
    {
        $uri = service('uri');
        $data['current_uri'] = $uri->getSegment(2); // Ambil segmen kedua dari URI
        return view($viewName, $data);
    }

    public function system_setting()
    {
        $data['title'] = 'Pengaturan Sistem';
        $data['current_uri'] = service('uri')->getSegment(2);

        // Mendapatkan data setting dari database (hanya nomor 1 - 10)
        $model = new SettingsModel();
        $parameters = ['site-title', 'site-desc', 'instagram', 'facebook', 'whatsapp', 'logo', 'website', 'alamat', 'gambartoko1', 'alamat2', 'gambartoko2'];
        $data['setting'] = $model->getSpecificSettings($parameters);

        return view('admin/system_setting', $data);
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
        $data['current_uri'] = service('uri')->getSegment(2); // atau segment yang sesuai

        return view('admin/testimonials', $data);
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
        $status = $this->request->getPost('status');

        $model->update($id, ['is_active' => $status]);

        return $this->response->setJSON(['success' => 'Status updated successfully']);
    }

    public function delete_testimonials()
    {
        $model = new TestimonialsModel();
        $id = $this->request->getPost('id');

        $testimonial = $model->find($id);
        if ($testimonial) {
            unlink('uploads/testimonials/' . $testimonial['gambar']); // perbaiki path penghapusan file
            $model->delete($id);
            return $this->response->setJSON(['success' => 'Testimonial deleted successfully']);
        }

        return $this->response->setJSON(['error' => 'Testimonial not found']);
    }



    // public function upload()
    // {
    //     $imageModel = new GalleryModel();

    //     if ($this->request->getFile('file')->isValid()) {
    //         $img = $this->request->getFile('file');
    //         $fileName = $img->getRandomName();
    //         $img->move(WRITEPATH . 'uploads/gallery/', $fileName);

    //         $data = [
    //             'img' => $fileName,
    //             'kategori' => $this->request->getPost('kategori'),
    //             'is_active' => $this->request->getPost('is_active'),
    //             'is_show_home' => $this->request->getPost('is_show_home'),
    //         ];

    //         $imageModel->save($data);

    //         return $this->response->setJSON(['success' => 'Gambar berhasil diunggah.']);
    //     } else {
    //         return $this->response->setJSON(['error' => 'Maaf, terjadi kesalahan saat mengunggah gambar.']);
    //     }
    // }

    // public function save_gallery()
    // {
    //     $model = new GalleryModel();
    //     $file = $this->request->getFile('file');

    //     if ($file && $file->isValid() && !$file->hasMoved()) {
    //         $imgName = $file->getRandomName();
    //         $file->move('uploads/gallery/', $imgName);

    //         $data = [
    //             'img' => $imgName,
    //             'is_active' => $this->request->getPost('status') == 1 ? 1 : 0,
    //             'is_show_home' => $this->request->getPost('show_home') == 1 ? 1 : 0,
    //             'kategori' => $this->request->getPost('kategori'),
    //         ];

    //         $model->insert($data);

    //         return $this->response->setJSON(['success' => 'File uploaded successfully']);
    //     }

    //     return $this->response->setJSON(['error' => 'Failed to upload file']);
    // }
}
