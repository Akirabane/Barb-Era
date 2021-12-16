<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

class Produits extends Controller
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
        echo view('Produits_view');
        echo view('Footer_view');
    }

    public function CommanderCarte(){

        $gamersmodel = new \App\Models\GamersModel();
        $data['lesjoueurs'] = $gamersmodel->findAll();
        $data['connecte']=$this->mesSessions->joueur;
        echo view('Header_view',$data);
        echo view('Carte_view');
        echo view('Footer_view');
    }

    public function CommanderLivre(){

        $gamersmodel = new \App\Models\GamersModel();
        $data['lesjoueurs'] = $gamersmodel->findAll();
        $data['connecte']=$this->mesSessions->joueur;
        echo view('Header_view',$data);
        echo view('Livre_view');
        echo view('Footer_view');

    }

    public function CommanderPack(){

        $gamersmodel = new \App\Models\GamersModel();
        $data['lesjoueurs'] = $gamersmodel->findAll();
        $data['connecte']=$this->mesSessions->joueur;
        echo view('Header_view',$data);
        echo view('Pack_view');
        echo view('Footer_view');
        
    }

}