<?php

namespace App\Controllers;
use App\Models;
use App\Models\TransactionModel;
use App\Models\User;
use App\Models\ProductModel;

class Home extends BaseController
{
    public function index(): string|\CodeIgniter\HTTP\RedirectResponse
    {
        date_default_timezone_set("Asia/Jakarta");

        if(auth()->user()->username == 'admin')
        {
            //getting the total earnings (laba kotor)
            $transactionModel = new TransactionModel();
            $transactionModel->select('SUM(total) AS totalAmount');
            $result = $transactionModel->get()->getRow();
            $totalEarnings = number_format($result->totalAmount, 0, '.', ',');


            //getting the daily earnings (laba kotor)
            $date = date('Y-m-d 23:59:59');
            $transactionModel->select('SUM(total) AS dailyAmount')->where("date_added <= '$date'");
            $result = $transactionModel->get()->getRow(); 
            $dailyEarnings = number_format($result->dailyAmount , 0, '.', ',');

            //getting the number of daily transactions
            $transactionModel->select('COUNT(transaction_id) AS ids')->where("date_added <= '$date'");
            $result = $transactionModel->get()->getRow(); 
            $dailyEarningsNum = $result->ids;
            

            //getting the number of employees
            $userModel = new User();
            $employeeNum = $userModel->countAll();

            //getting the net profit
            $db = db_connect();
            $sql = "SELECT SUM(MYVALUE) as ans
            FROM (
                    SELECT product_transaction.product_id, COUNT(product_transaction.product_id) AS quantity, marginproduct.netprofit * 																										COUNT(product_transaction.product_id) as myvalue
                    FROM product_transaction
                    INNER JOIN (
                        SELECT pt.product_id as pid, SUM(margins) AS netprofit
                        FROM product_transaction pt
                        INNER JOIN (
                            SELECT product_id, product_price - base_price AS margins
                            FROM product
                        ) as tabelku ON tabelku.product_id = pt.product_id
                        GROUP BY pt.product_id
                    ) as marginproduct ON product_transaction.product_id = marginproduct.pid
                    GROUP BY product_transaction.product_id, marginproduct.netprofit
                ) AS mytables;";
            $query = $db->query($sql);
            $result = $query->getRow(); 
            $netProfit = number_format($result->ans, 0, '.', ',');;

            // getting the number of products
            $productModel = new ProductModel();
            $countProduct = $productModel->countAll();

            $data = [
                'totalEarnings' => $totalEarnings,
                'dailyEarnings' => $dailyEarnings,
                'dailyEarningsNum' => $dailyEarningsNum,
                'employeeNum' => $employeeNum,
                'netProfit' => $netProfit,
                'countProduct' => $countProduct,
            ];

            return view('welcome_message', $data);
        }

        return redirect()->to('/home-transaction');
    }
}
