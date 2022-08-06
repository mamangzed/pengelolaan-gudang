<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;
use App\Models\UserModel;
use App\Models\BarangMasukModel;
use App\Models\GudangModel;
use App\Models\SupplierModel;
use App\Models\BarangKeluar;
use App\Models\JenisBarang;
use App\Models\SatuanBarang;
use Telegram;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
class BaseController extends Controller
{
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var array
     */
    protected $helpers = [];

    /**
     * Constructor.
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Preload any models, libraries, etc, here.

        $this->user = new UserModel();
        $this->barangMasuk  = new BarangMasukModel();
        $this->gudang = new GudangModel();
        $this->supplier = new SupplierModel();
        $this->barangKeluar = new BarangKeluar();
        $this->jenisBarang = new JenisBarang();
        $this->satuanBarang = new SatuanBarang();

        $this->session = \Config\Services::session();
        $this->respon = service('response');
        $this->tele = new Telegram('5519814259:AAHz3Q5s-QFGeilpbab5WZzH7DfoTn8HnRc');
        helper(['text']);
    }
}
