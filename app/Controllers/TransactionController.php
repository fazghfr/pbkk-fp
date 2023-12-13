<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProductModel;
use App\Models\TransactionModel;
use App\Models\DetailedTransactionModel;

class TransactionController extends BaseController
{
    public function index()
    {
        $productModel = new ProductModel();
        $searchQuery = $this->request->getPost('q');

        // Get the current page from the query string (default to 1 if not present)
        $currentPage = $this->request->getGet('page') ? (int) $this->request->getGet('page') : 1;

        if ($searchQuery) {
            // If there is a search query, filter the results
            $data['products'] = $productModel->like('product_name', $searchQuery)->paginate(5, 'default', $currentPage);
        } else {
            // If no search query, get all products
            $data['products'] = $productModel->paginate(5, 'default', $currentPage);
        }

        // Get the pager
        $pager = $productModel->pager;

        // Pass the pager information to the view
        $data['pager'] = $pager;

        return view('transaction/transactionsession', $data);
    }

    public function beforeSes()
    {
        return view('transaction/preform');
    }

    public function createSes()
    {
        $transactionModel = new TransactionModel();

        // Insert data into the 'transactions' table
        $transactionModel->insert([
            'employee_id' => auth()->user()->id,
            'date_added' => date("Y-m-d H:i:s"),
        ]);

        // Get the inserted ID
        $insertedID = $transactionModel->getInsertID();

        return redirect()->to('/transaction/' . $insertedID);
    }

    public function onSes($id)
    {
        $data['transaction_id'] = $id;

        $productModel = new ProductModel();
        $searchQuery = $this->request->getPost('q');

        // Get the current page from the query string (default to 1 if not present)
        $currentPage = $this->request->getGet('page') ? (int) $this->request->getGet('page') : 1;

        if ($searchQuery) {
            // If there is a search query, filter the results
            $data['products'] = $productModel->like('product_name', $searchQuery)->paginate(5, 'default', $currentPage);
        } else {
            // If no search query, get all products
            $data['products'] = $productModel->paginate(5, 'default', $currentPage);
        }

        // Get the pager
        $pager = $productModel->pager;

        // Pass the pager information to the view
        $data['pager'] = $pager;
        return view('transaction/transactionsession', $data);
    }

    public function addItem()
    {
        $transactionModel = new TransactionModel();
        $transID = $this->request->getPost('transaction_id');
        $transaction = $transactionModel->find($transID);

        $productModel = new ProductModel();
        $productId = $this->request->getPost('product_id');
        $product = $productModel->find($productId);

        if (!$product) {
            return redirect()->to('/transaction/' . $transID);
        }


        if (!$transaction) {
            return redirect()->to('/home-transaction');
        }

        $detailedTransactionModel = new DetailedTransactionModel();

        // Insert data into the 'detailed_transactions' table
        $detailedTransactionModel->insert([
            'transaction_id' => $transID,
            'product_id' => $productId,
            'amount' => $this->request->getPost('quantity'),
        ]);

        $productModel = new ProductModel();
        $productQty = $this->request->getPost('quantity');
        $productQtyonDb = $productModel->find($productId)['product_qty'];
        $productModel->update($productId, [
            'product_qty' => $productQtyonDb - $productQty,
        ]);

        return redirect()->to('/transaction/' . $transaction['transaction_id']);
    }

    public function confirm()
    {
        $transactionModel = new TransactionModel();
        $transID = $this->request->getPost('transaction_id');
        $transaction = $transactionModel->find($transID);

        if (!$transaction) {
            return redirect()->to('/home-transaction');
        }

        $detailedTransactionModel = new DetailedTransactionModel();
        $detailedTransaction = $detailedTransactionModel->where('transaction_id', $transID)->findAll();


        // getting the distinct product id and storing the quantity in an array
        
        $total = 0;
        $setID = array();
        foreach ($detailedTransaction as $detailed) {
            $productModel = new ProductModel();
            $productId = $detailed['product_id'];

            // Check if the key exists, if not, initialize it
            if (!isset($setID[$productId])) {
                $setID[$productId] = 0; // Initialize to 0 or any default value
            }
        
            // Increment the value
            $setID[$productId] += $detailed['amount'];
            $product = $productModel->find($detailed['product_id']);
            $total += $product['product_price'] * $detailed['amount'];
        }
        

        $distinctProductID = array_keys($setID);
        $productModel = new ProductModel();
        $products = $productModel->whereIn('product_id', $distinctProductID)->findAll();


        $transactionModel->update($transID, [
            'total' => $total,
        ]);

        $transaction = $transactionModel->find($transID);

        $data = [
            'transaction' => $transaction,
            'products' => $products,
            'setID' => $setID, //an array of product id and quantity
        ];


        return view('transaction/confirm', $data);
    }
}


