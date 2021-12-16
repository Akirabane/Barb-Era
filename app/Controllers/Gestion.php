<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;
use App\Libraries\GroceryCrud;

class Gestion extends Controller
{

    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);
        $this->mesSessions = \Config\Services::session();
    }

    public function index() {
        $this->mesSessions->admin=0;
        echo view('Login_view');
    }

    public function AccueilAdmin() {
        if($this->mesSessions->admin==0) return redirect()->to(base_url().'/Gestion');
        echo view('HeaderAdmin_view');
        echo view('AccueilAdmin_view');
        echo view('Footer_view');
    }

    public function Verification() {
        /* basic admin logins, not in database. change them as soon as you use that*/
        if($_POST['username']=='admin' && $_POST['pass']=='insurg123') {
            $this->mesSessions->admin=1;
            return redirect()->to(base_url().'/Gestion/AccueilAdmin');
        } else {
            return redirect()->to(base_url().'/Gestion');
        }
    }

    public function JoueursAdmin() {
        if($this->mesSessions->admin==0) return redirect()->to(base_url().'/Gestion');
        $crud = new GroceryCrud();
        $crud->setTheme('datatables');
        $crud->setTable('user');
        $crud->unsetExport();
        $output = $crud->render();
        echo view('HeaderAdmin_view');
        echo view('JoueursAdmin_view', (array)$output,);
        echo view('Footer_view');
    }

    public function EnigmesAdmin() {
        if($this->mesSessions->admin==0) return redirect()->to(base_url().'/Gestion');
        $crud = new GroceryCrud();
        $crud->setTheme('datatables');
        $crud->setTable('enigme');
        $crud->unsetExport();
        $crud->callbackAddField('enigme_bg',function(){
            return '<input type="hidden" name="enigme_photo" id="enigme_photo"><input type="file" name="file_photo" id="file_photo"><img src="" id="miniature" height="100px">';
        });
        $crud->callbackAddField('enigme_creature',function(){
            return '<input type="hidden" name="enigme_photo2" id="enigme_photo"><input type="file" name="file_photo2" id="file_photo2"><img src="" id="miniature2" height="100px">';
        });
        $output = $crud->render();
        echo view('HeaderAdmin_view');
        echo view('EnigmesAdmin_view', (array)$output);
        echo view('Footer_view');
    }

    public function DialoguesAdmin() {
        if($this->mesSessions->admin==0) return redirect()->to(base_url().'/Gestion');
        $crud = new GroceryCrud();
        $crud->setTheme('datatables');
        $crud->setTable('dialogue');
        $crud->unsetExport();
        $crud->callbackAddField('dialogue_bg',function(){
            return '<input type="hidden" name="dialogue_photo" id="enigme_photo"><input type="file" name="file_photo" id="file_photo"><img src="" id="miniature" height="100px">';
        });
        $crud->callbackAddField('dialogue_creature',function(){
            return '<input type="hidden" name="dialogue_photo2" id="enigme_photo"><input type="file" name="file_photo2" id="file_photo2"><img src="" id="miniature2" height="100px">';
        });
        $output = $crud->render();
        echo view('HeaderAdmin_view');
        echo view('EnigmesAdmin_view', (array)$output);
        echo view('Footer_view');
    }

    public function Telechargement() {
        if($this->mesSessions->admin==0) return redirect()->to(base_url().'/Gestion');
        $image=$this->request->getFile('fichierphoto');
        $nomPhoto=date('Ymd-H-i-s').$image->getName();
        if ($image->getMimeType()!="image/jpeg" && $image->getMimeType()!="image/png") {
            echo "erreur de format de fichier";
            return;
        }
        echo $nomPhoto;
        $image->move("./assets/photos/enigmes/",$nomPhoto);
    }

    public function Telechargement2() {
        if($this->mesSessions->admin==0) return redirect()->to(base_url().'/Gestion');
        $image=$this->request->getFile('fichierphoto');
        $nomPhoto=date('Ymd-H-i-s').$image->getName();
        if ($image->getMimeType()!="image/jpeg" && $image->getMimeType()!="image/png") {
            echo "erreur de format de fichier";
            return;
        }
        echo $nomPhoto;
        $image->move("./assets/photos/dialogues/",$nomPhoto);
    }
}
