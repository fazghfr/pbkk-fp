<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProductModel;
class ProductController extends BaseController
{
    public function index()
    {
        $productModel = new ProductModel();
        $searchQuery = $this->request->getPost('q');

        // Get the current page from the query string (default to 1 if not present)
        $currentPage = $this->request->getGet('page') ? (int) $this->request->getGet('page') : 1;

        if ($searchQuery) {
            // If there is a search query, filter the results
            $data['products'] = $productModel->like('product_name', $searchQuery)->paginate(5, 'product');
        } else {
            // If no search query, get all products
            $data['products'] = $productModel->paginate(5, 'product');
        }

        // Get the pager
        $pager = $productModel->pager;

        // Pass the pager information to the view
        $data['pager'] = $pager;

        return view('products/viewAll', $data);
    }

    public function addForm()
    {
        return view('products/add');
    }

    public function add()
    {
        $productModel = new ProductModel();

        $productName = $this->request->getPost('product_name');
        $productPrice = $this->request->getPost('product_price');
        $productQty = $this->request->getPost('product_qty');

        $productModel->insert([
            'product_name' => $productName,
            'product_price' => $productPrice,
            'product_qty' => $productQty,
        ]);

        return redirect()->to('/product');
    }

    public function view($id)
    {
        $productModel = new ProductModel();
        $data['product'] = $productModel->find($id);

        if (!$data['product']) {
            return redirect()->to('/product');
        }

        return view('products/view', $data);
    }

    public function edit($id)
    {
        $productModel = new ProductModel();
        $data['product'] = $productModel->find($id);

        if (!$data['product']) {
            return redirect()->to('/product');
        }

        return view('products/edit', $data);
    }

    public function update($id)
    {
        $productModel = new ProductModel();
        $product = $productModel->find($id);

        if (!$product) {
            return redirect()->to('/product');
        }

        $productModel->update($id, [
            'product_name' => $this->request->getPost('product_name'),
            'product_price' => $this->request->getPost('product_price'),
            'product_qty' => $this->request->getPost('product_qty'),
        ]);

        return redirect()->to('/product/view/' . $id);
    }

    public function delete($id)
    {
        $productModel = new ProductModel();
        $product = $productModel->find($id);

        if (!$product) {
            return redirect()->to('/product');
        }

        $productModel->delete($id);

        return redirect()->to('/product');
    }
}
