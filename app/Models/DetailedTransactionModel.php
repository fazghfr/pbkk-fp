<?php

namespace App\Models;

use CodeIgniter\Model;

class DetailedTransactionModel extends Model
{
    protected $table            = 'product_transaction';
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['transaction_id', 'product_id', 'amount'];
}
