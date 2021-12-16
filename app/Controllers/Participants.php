<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

class Participants extends Controller
{

    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Preload any models, libraries, etc, here.

        $this->mesSessions = session();
    }

    public function index(){

        $gamersmodel = new \App\Models\GamersModel();
        $data['lesjoueurs'] = $gamersmodel->findAll();
        $data['connecte']=$this->mesSessions->joueur;
        echo view('Header_view',$data);
        echo view('Participants_view',$data);
        echo view('Footer_view');
    }

}