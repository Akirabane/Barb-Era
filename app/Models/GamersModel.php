<?php namespace App\Models;

use CodeIgniter\Model;

class GamersModel extends Model
{

    protected $table      = 'user';
    protected $primaryKey = 'user_id';


    public function verif ($u,$ic) {
        $mabase=db_connect();
        $query=$mabase->query('SELECT * FROM user WHERE user_mail=? AND is_confirmed=?', [$u,$ic]);
        $resultat=$query->getResultArray();
        return count($resultat);
    }

    public function recup () {
        $mabase=db_connect();
        $query=$mabase->query('SELECT * FROM user');
        return $query->getResultArray();
    }

    public function recupClassement () {
        $mabase=db_connect();
        $query=$mabase->query('SELECT * FROM user ORDER BY user_enigme DESC, user_essais_total');
        return $query->getResultArray();
    }

    public function recupTout ($u) {
        $mabase=db_connect();
        $query=$mabase->query('SELECT * FROM user INNER JOIN enigme ON user_enigme=enigme_id INNER JOIN dialogue ON user_dialogue=dialogue_id WHERE user_mail=?', [$u]);
        return $query->getResultArray();
    }

    public function recupUserMail ($u) {
        $mabase=db_connect();
        $query=$mabase->query('SELECT * FROM user WHERE user_mail=?', [$u]);
        return $query->getResultArray();
    }

    public function recupUserPass ($p) {
        $mabase=db_connect();
        $query=$mabase->query('SELECT * FROM user WHERE user_mdp=?', [$p]);
        return $query->getResultArray();
    }

    public function isUserConfirmed($c) {
        $mabase=db_connect();
        $query = $mabase->query('SELECT * FROM user WHERE is_confirmed=?', [$c]);
        return $query->getResultArray();
    }

    public function recupEnigme ($id) {
        $mabase=db_connect();
        $query=$mabase->query('SELECT * FROM enigme WHERE enigme_id=?', [$id]);
        return $query->getResultArray();
    }

    public function recupDialogue ($id) {
        $mabase=db_connect();
        $query=$mabase->query('SELECT * FROM dialogue WHERE dialogue_id=?', [$id]);
        return $query->getResultArray();
    }

    public function enigmeVrai ($u, $idenigme) {
        $mabase = db_connect();
        //$mabase->query ('UPDATE etudier SET etat_resolution=1 WHERE gamers_gamer_id=? AND enigmes_enigme_id=?',[ $idgamer, $idenigme ]);
        $idenigme +=1;
        $mabase->query ('UPDATE user SET user_enigme=?,user_dialogue=?,user_essais_total = user_essais_total + user_essais + 1,  user_essais=0 WHERE user_mail=? ',[ $idenigme , $idenigme , $u]);
        
    }

    public function enigmeFaux ($u) {
        $mabase=db_connect();
        $mabase->query('UPDATE user SET user_essais=user_essais+1, user_essais_total=user_essais_total+1 WHERE user_mail=?', [$u]);
        $query=$mabase->query('SELECT user_essais FROM user WHERE user_mail=?', [$u]);
    }

    public function signUp ($pseudo,$nom,$prenom,$mail,$mdp) {
        
        $longueurkey = 12;
        $key = "";
        for($i=1;$i<$longueurkey;$i++)
        {
            $key .= mt_rand(0,9);
        }

        $mabase=db_connect();
        $passHash = password_hash($mdp, PASSWORD_DEFAULT);
        $mabase->query('INSERT INTO user(user_id, user_pseudo, user_nom, user_prenom, user_mail, user_mdp, user_enigme, user_dialogue, user_essais, user_essais_total, user_concours, user_etat, mail_confirmKey, is_confirmed) VALUES (null, ?, ?, ?, ?, ?, 1, 1, 0, 0, 0, 0, '.$key.', 0)', [$pseudo,$nom,$prenom,$mail,$passHash]);
        
        $to = $mail;

        $subject = "Confirmation d'inscription $pseudo"; 

        $htmlContent = ' 
            <html> 
                <head> 
                    <title>Bienvenue chez Barb\'Era '.$pseudo.' !</title> 
                </head> 
                <body> 
                    <h1>Vous y êtes presque '.$prenom.' !</h1>
                    <h2>Résumé de vos informations :</h2>
                    <br />
                    <ul>
                        <li>Pseudonyme : '.$pseudo.'.</li>
                        <li>Prénom : '.$prenom.'.</li>
                        <li>Nom : '.$nom.'.</li>
                        <li>Mail : '.$mail.'.</li>
                    </ul> 
                    <br />
                    <h3>Finalisez votre inscription en cliquant <a href="your link">ici !</a></h3>
                </body> 
            </html>';
        // Set content-type header for sending HTML email 
        $headers = "MIME-Version: 1.0" . "\r\n"; 
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 

        // Additional headers 
        $headers .= 'From: Barb\'Era<support@barbera.fr>' . "\r\n"; 
        $headers .= 'Cc: bienvenue@barbera.com' . "\r\n"; 
        $headers .= 'Bcc: confirmation@barbera.com' . "\r\n"; 

        // Send email 
        mail($to, $subject, $htmlContent, $headers);
    }

    public function modifProfilFull ($pseudo, $nom, $prenom, $mail, $pass, $email) {

        $mabase=db_connect();
        $passHash = password_hash($pass, PASSWORD_DEFAULT);
        $mabase->query('UPDATE user SET user_pseudo=?, user_nom=?, user_prenom=?, user_mail=?, user_mdp=? WHERE user_mail=?', [$pseudo, $nom, $prenom, $mail, $passHash, $email]);
        
        $to = $mail;

        $subject = "Bonjour ".$pseudo.", voici la confirmation de la mise à jour de votre profil Barb'Era."; 

        $htmlContent = ' 
            <html> 
                <head> 
                    <title>Barb\'Era | Modification de profil</title> 
                </head> 
                <body>
                    <h2>Résumé des informations modifiées :</h2>
                    <br />
                    <ul>
                        <li>Pseudonyme : '.$pseudo.'.</li>
                        <li>Prénom : '.$prenom.'.</li>
                        <li>Nom : '.$nom.'.</li>
                        <li>Mail : '.$mail.'.</li>
                        <li>Mot de passe : '.$pass.'.</li>
                        <li>Si le mot de passe est crypté, il s\'agit de votre ancien mot de passe.</li>
                    </ul> 
                    <br />
                 </body> 
            </html>';
        // Set content-type header for sending HTML email 
        $headers = "MIME-Version: 1.0" . "\r\n"; 
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 

        // Additional headers 
        $headers .= 'From: Barb\'Era<support@barbera.fr>' . "\r\n"; 
        $headers .= 'Cc: bienvenue@barbera.com' . "\r\n"; 
        $headers .= 'Bcc: confirmation@barbera.com' . "\r\n"; 

        // Send email 
        mail($to, $subject, $htmlContent, $headers);
    }

    public function Concour($u){
        $mabase = db_connect();
        $mabase->query('UPDATE user SET user_concours=1 WHERE user_mail=?',[$u]);
        
    }

    public function Concour2(){
        $mabase = db_connect();
        $query=$mabase->query('SELECT * FROM user WHERE user_concours=1');
        return $query->getResultArray();
    }

    public function mailBloque($u, $p){
        $to = $u;

        $subject = "Bonjour ".$p.", voici la confirmation de la mise à jour de votre profil Barb'Era."; 

        $htmlContent = ' 
            <html> 
                <head> 
                    <title>Barb\'Era | Suspension du compte</title> 
                </head> 
                <body>
                    <h2>Résumé des informations :</h2>
                    <br />
                    <ul>
                        <li>Votre compte a été bloqué après un nombre d\'essais excessif.</li>
                        <li>Veuillez nous contacter si vous souhaitez régler ce problème.</li>
                    </ul> 
                    <br />
                 </body> 
            </html>';
        // Set content-type header for sending HTML email 
        $headers = "MIME-Version: 1.0" . "\r\n"; 
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 

        // Additional headers 
        $headers .= 'From: Barb\'Era<support@barbera.fr>' . "\r\n"; 
        $headers .= 'Cc: bienvenue@barbera.com' . "\r\n"; 
        $headers .= 'Bcc: confirmation@barbera.com' . "\r\n"; 

        // Send email 
        mail($to, $subject, $htmlContent, $headers);
    }

    public function recupMdp1($mdp,$u){
        $mabase = db_connect();
        $passHash = password_hash($mdp, PASSWORD_DEFAULT);
        $query=$mabase->query('UPDATE user SET user_mdp=? WHERE user_mail=?',[$passHash,$u]);
    }

    public function recupMdp2($u,$p,$ps){
        $to = $u;

        $subject = "Bonjour ".$ps.", voici l'aide à la récupération de votre profil Barb'Era."; 

        $htmlContent = ' 
            <html> 
                <head> 
                    <title>Barb\'Era | Changement de mot de passe</title> 
                </head> 
                <body>
                    <h2>Résumé des informations :</h2>
                    <br />
                    <ul>
                        <li>Votre compte a maitenant comme mot de passe "'.$p.'".</li>
                        <li>Si vous souhaitez le changer, vous pouvez vous rendre dans la section profil.</li>
                    </ul> 
                    <br />
                 </body> 
            </html>';
        // Set content-type header for sending HTML email 
        $headers = "MIME-Version: 1.0" . "\r\n"; 
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 

        // Additional headers 
        $headers .= 'From: Barb\'Era<support@barbera.fr>' . "\r\n"; 
        $headers .= 'Cc: bienvenue@barbera.com' . "\r\n"; 
        $headers .= 'Bcc: confirmation@barbera.com' . "\r\n"; 

        // Send email 
        mail($to, $subject, $htmlContent, $headers);
    }

    public function recupChat(){
        $mabase=db_connect();
        $query=$mabase->query('SELECT * FROM chat ORDER BY id DESC LIMIT 10');
        return $query->getResultArray();
    }

    public function ajoutChat($pseudo, $message){
        $mabase=db_connect();
        $mabase->query('INSERT INTO chat(pseudo, message) VALUES (?, ?)', [$pseudo,$message]);
    }
}