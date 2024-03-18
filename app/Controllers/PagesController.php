<?php

namespace App\Controllers;

use CodeIgniter\Exceptions\PageNotFoundException; //tambahkan baris ini

class Pages extends BaseController
{
    // ...

    public function view($page = 'home')
    {
        if (! is_file(APPPATH . 'Views/pages/' . $page . '.php')) {
            // jika tidak ada halaman yang dimuat maka akan menampilkan
            throw new PageNotFoundException($page);
        }

        $data['title'] = ucfirst($page); // kapitalkan huruf pertama

        return view('templates/header', $data)
            . view('pages/' . $page)
            . view('templates/footer');
    }
}