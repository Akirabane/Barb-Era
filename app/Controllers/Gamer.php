<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

class Gamer extends Controller
{

    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);
        $this->mesSessions = \Config\Services::session();
    }

    public function index() {
        $this->mesSessions->joueur=0;
        echo view('LoginGamer_view');
    }

    public function index2() {
        $this->mesSessions->joueur=0;
        echo view('NewGamer_view');
    }

    public function NewGamer() {
        $this->mesSessions->joueur=0;
        echo view('NewGamer_view');
    }

    public function Profil() {
        $gamermodel = new \App\Models\GamersModel();
        $data['profil'] = $gamermodel->recupTout( $this->mesSessions->username);
        $data['connecte'] = $this->mesSessions->joueur;
        echo view('Header_view', $data);
        echo view('profil_view', $data);
        echo view('Footer_view');
    }

    public function Verification() {
        $gamersmodel = new \App\Models\GamersModel();
        $data['verif'] = $gamersmodel->recupUserMail($_POST['username']);
        $passHash = $data['verif'][0]['user_mdp'];
        if (password_verify(htmlspecialchars($_POST['pass']), $passHash)==true && $data['verif'][0]['is_confirmed']==1){
            $this->mesSessions->joueur=1;
            $this->mesSessions->username=$_POST['username'];
            return redirect()->to(base_url().'/Gamer/AccueilGamer');
        } else {
            return redirect()->to(base_url().'/Gamer');
        }
    }

    public function Enregistrement() {
        $gamersmodel = new \App\Models\GamersModel();

        $userMail = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
        $userMailVerif = filter_var($_POST['emailvalidation'], FILTER_VALIDATE_EMAIL);

        $userPass = htmlspecialchars($_POST['pass']);
        $userPassVerif = htmlspecialchars($_POST['passvalidation']);

        if($userMail == $userMailVerif)
        {
            if($userPass == $userPassVerif)
            {
                if($gamersmodel->recupUserMail($_POST['email'])!=null) {
                    $data['message']="Ce compte existe déjà";
                    echo view('ErreurUser_view',$data);
                    return;
                } else {                    
                    $gamersmodel->signUp($_POST['pseudo'], $_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['pass']);
                    echo view('NewGamerValide_view');
                    return;
                }
            } else {
                $data['message']="Mot de passe invalide";
                echo view('ErreurUser_view', $data);
                return;
            }
        } else {
            $data['message']="Les mails ne correspondent pas";
            echo view('ErreurUser_view', $data);
            return;
        }
    }

    public function ModifProfil() {
        $gamersmodel = new \App\Models\GamersModel();
        $data['modifprofil'] = $gamersmodel->recupUserMail( $this->mesSessions->username);
        $data['connecte'] = $this->mesSessions->joueur;
        $userPass = htmlspecialchars($_POST['pass']);
        $userPassVerif = htmlspecialchars($_POST['passvalidation']);

        if(!empty($_POST['pseudo'])){
            $pseudo=$_POST['pseudo'];
        } else {
            $pseudo=$data['modifprofil'][0]['user_pseudo'];
        }
        if(!empty($_POST['nom'])){
            $nom=$_POST['nom'];
        } else {
            $nom=$data['modifprofil'][0]['user_nom'];
        }
        if(!empty($_POST['prenom'])){
            $prenom=$_POST['prenom'];
        } else {
            $prenom=$data['modifprofil'][0]['user_prenom'];
        }
        if(!empty($_POST['email'])){
            $mail=$_POST['email'];
            $email=$data['modifprofil'][0]['user_mail'];
        } else {
            $mail=$data['modifprofil'][0]['user_mail'];
            $email=$data['modifprofil'][0]['user_mail'];
        }
        if(!empty($_POST['pass'])){
            if($userPass == $userPassVerif){
                $pass=$_POST['pass'];
            } else {
                $data['message']="Mot de passe non identiques";
                echo view('ErreurUser_view', $data);
            }
        } else {
            $pass=$data['modifprofil'][0]['user_mdp'];
        }

        $gamersmodel->modifProfilFull($pseudo, $nom, $prenom, $mail, $pass, $email);
        echo view('Header_view', $data);
        echo view('editValide_view', $data);
        echo view('Footer_view');
    }

    public function ConfirmationMail() {
        $key = $_GET['key'];
        $mabase = db_connect();
        $mabase->query('UPDATE user SET is_confirmed=1 WHERE mail_confirmKey='.$key.'');
        echo view("NewGamerConfirm_view");
    }

    public function AccueilGamer() {
        if($this->mesSessions->joueur ==0) return redirect()->to(base_url() );

        $gamermodel = new \App\Models\GamersModel();
        $data['profil'] = $gamermodel->recupTout( $this->mesSessions->username);
        $data['connecte'] = $this->mesSessions->joueur;
        //echo var_dump($data);

        if($data['profil'][0]['user_etat']==1){

            echo view('Header_view', $data);
            echo view('BloquerGamer_view', $data);
            $gamermodel->mailBloque($data['profil'][0]['user_mail'],$data['profil'][0]['user_pseudo']);
            echo view('Footer_view');
        }

        elseif($data['profil'][0]['user_essais']>6){

            echo view('Header_view', $data);
            echo view('BloquerGamer_view', $data);
            $gamermodel->mailBloque($data['profil'][0]['user_mail'],$data['profil'][0]['user_pseudo']);
            echo view('Footer_view');
        }

        elseif($data['profil'][0]['user_enigme'] >= 8){
            $gamersmodel = new \App\Models\GamersModel();
            $data['lesjoueurs'] = $gamersmodel->recupClassement();
            $data['connecte']=$this->mesSessions->joueur;
            $data['profil']=$gamermodel->recupTout( $this->mesSessions->username);
            echo view('HeaderGamer_view', $data);
            echo view('GamerProfilWin_view', $data);
            echo view('Footer_view');

        }else{

            echo view('Header_view', $data);
            echo view('dialogue_view', $data);
            echo view('Footer_view');
        }
    }

    public function validReponse() {
        if($this->mesSessions->joueur==0) return redirect()->to(base_url());
        $gamersmodel = new \App\Models\GamersModel();
        $data['profil'] = $gamersmodel->recupTout($this->mesSessions->username);
        $data['connecte']=$this->mesSessions->joueur;
        $reponse = $_POST['reponse'];
        $labonnereponse=$data['profil'][0]['enigme_mot'];
        $idgamer=$data['profil'][0]['user_mail'];
        $idenigme=$data['profil'][0]['user_enigme'];
        if ($reponse==$labonnereponse) {
            $gamersmodel->enigmeVrai($idgamer,$idenigme);
            $data['profil'] = $gamersmodel->recupTout($this->mesSessions->username);
        } else {
            $gamersmodel->enigmeFaux($idgamer);
        }
        if($data['profil'][0]['user_enigme'] >= 7){
            $gamersmodel = new \App\Models\GamersModel();
            $data['lesjoueurs'] = $gamersmodel->recupClassement();
            $data['connecte']=$this->mesSessions->joueur;
            $data['profil']=$gamersmodel->recupTout( $this->mesSessions->username);
            echo view('HeaderGamer_view', $data);
            echo view('GamerProfilWin_view', $data);
            echo view('Footer_view');

        } elseif ($data['profil'][0]['user_essais']>6){

            echo view('Header_view', $data);
            echo view('BloquerGamer_view', $data);
            $gamermodel->mailBloque($data['profil'][0]['user_mail'],$data['profil'][0]['user_pseudo']);
            echo view('Footer_view');
            
        } else {
            echo view('Header_view',$data);
            echo view('dialogue_view',$data);
            echo view('Footer_view');
        }
    }

    public function validDialogue() {
        if($this->mesSessions->joueur==0) return redirect()->to(base_url());
        $gamersmodel = new \App\Models\GamersModel();
        $data['profil'] = $gamersmodel->recupTout($this->mesSessions->username);
        $data['connecte']=$this->mesSessions->joueur;
        echo view('Header_view', $data);

        if ($data['profil'][0]['user_enigme'] == 1){
            echo view('enigme1_view',$data);
            echo view('Footer_view');
        }
        elseif ($data['profil'][0]['user_enigme'] == 2){
            echo view('enigme2_view', $data);
            echo view('Footer_view');
        }
        elseif ($data['profil'][0]['user_enigme'] == 3){
            echo view('enigme3_view', $data);
            echo view('Footer_view');
        }
        elseif ($data['profil'][0]['user_enigme'] == 4){
            echo view('enigme4_view', $data);
            echo view('Footer_view');
        }
        elseif ($data['profil'][0]['user_enigme'] == 5){
            echo view('enigme7_view', $data);
            echo view('Footer_view');
        }
        elseif ($data['profil'][0]['user_enigme'] == 6){
            echo view('enigme6_view', $data);
            echo view('Footer_view');
        }else{
            echo view('enigme5_view', $data);
            echo view('Footer_view');
        }
    }

    public function Concour(){
        if($this->mesSessions->joueur==0) return redirect()->to(base_url());

        $gamersmodel = new \App\Models\GamersModel();
        $data['profil'] = $gamersmodel->recupTout($this->mesSessions->username);
        $data['connecte']=$this->mesSessions->joueur;
        $idmail=$data['profil'][0]['user_mail'];
        $gamersmodel->concour($idmail);
        $data['concours']=$gamersmodel->concour2();
        echo view('Header_view',$data);
        echo view('concours_view',$data);
        echo view('Footer_view');
    }

    public function mdpRecup() {
        $this->mesSessions->joueur=0;
        echo view('recupGamer_view');
    }

    public function mdpRecup2() {
        $gamersmodel = new \App\Models\GamersModel();
        $mail = $_POST['mail'];
        $longueurkey = 12;
        $key = "";
        for($i=1;$i<$longueurkey;$i++){
            $key .= mt_rand(0,9);
        }
        $gamersmodel->recupMdp1($key,$mail);
        $data['profil']=$gamersmodel->recupUserMail($mail);
        $gamersmodel->recupMdp2($mail,$key,$data['profil'][0]['user_pseudo']);
        echo view('LoginGamer_view',$data);
    }
}