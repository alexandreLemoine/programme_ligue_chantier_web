<?php
//DW_PHP_001a_BPHP FICHE MEMO


//******************************************************************************
// TESTER PRESENCE FICHIER, variable, etc.
//******************************************************************************
if ( file_exists('membre.php') ){
    include 'membre.php';
}else{

  //ARRETE LE SCRIPT
  die('Le fichier n\'existe pas');
}

  //Tester si une variable est vide
if(!empty($membre)){
  echo 'ce n\'est pas vide';
}

//******************************************************************************
// FONCTION SUR LES MOTS DE PASSES
//******************************************************************************

  //Donne un nombre x ou n d'octet au format binaire
  // 6 en binaire = 12 caractères
  $password = random_bytes( 6 );

  //donne un nombre entier aléatoire
  echo random_int(0,1000).'<br>';

  //Mettre un nombre au format binaire sous forma hexadecimal
  $password = bin2hex($password);

//******************************************************************************
// ADRESSE MAIL
//******************************************************************************

// TESTER FORMAT MAIL

if(filter_var( $email, FILTER_VALIDATE_EMAIL )){
  echo 'votre adresse email est valide';
}...

//ENVOYER DES MAILS

    $to      = 'lemoine.alexandre.b@gmail.com';
    $subject = 'le sujet';
    $message = '<h2>Bonjour ! Alex</h2> Comment ça va ? ';
    $headers = 'From: alexandre@monsite.dev' . "\r\n" .
    'Reply-To: webmaster@example.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
    $headers .= 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

    mail($to, $subject, $message, $headers);

//******************************************************************************
// FONCTION SUR LES CHAINES
//******************************************************************************

//Longueur CHAINES
if(strlen($password) < 10){
  echo 'votre mot de passe est trop court';
}
//Remplacer un caractère par un autre dans une chaine de CARACTERES
$texte = str_replace('vous','toi', $texte);

//NL2BR prend en compte les saut de ligne effectué dans une variable php
echo nl2br($texte);

//DECOUPER DES TERMES EN TABLEAU
$termes  = 'php,mysql,apache,html,css';
$termes_tableau = explode(',',$termes);

//******************************************************************************
// FONCTION SUR LES DATES
//******************************************************************************

//sans parametre, la fonction donne la date courante.
$date = date_create('2017-12-11T15:32:25');
$date = date_format($date,'j/n/Y à H:i');

//******************************************************************************
// FONCTION SUR LES FICHIERS
//******************************************************************************

if(file_exists('amembre.php')){
  //Inclure un fichier
  //renvoie un warning si le fichier n'est pas disponible
  include 'membre.php';
}

//Fonction de suppression de fichier
if(unlink('test.php')){
  echo 'Le fichier a été supprimé avec succès';
}

<?php

  if(isset($_FILES['avatar']) && $_FILES['avatar']['error'] == 0){

    $erreur = [];


    if($_FILES['avatar']['type'] != 'image/jpeg'){
      $erreur["type"] = 'le format n\'est pas correct.';
    }

    if($_FILES['avatar']['size'] > 204800){ // 200ko
      $erreur["size"] = 'Le fichier dépasse 200 Ko.';
    }

    if( !$erreur ){
      if(move_uploaded_file($_FILES['avatar']['tmp_name'],'img/'. $_FILES['avatar']['name'] )){
         $validation = 'le fichier a été uploadé';
      }
      else{
        $erreur['move'] = 'Il y a eu une erreur lors de l\'envoie';
      }
    }
  }
 ?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>Mon site :D</title>
  </head>
  <body>
    <?php if(isset($erreur['type'] ) ) : ?>
    <b><?= $erreur['type']; ?></b>
    <?php endif ?>
    <?php if(isset($erreur['size'] ) ) : ?>
    <b><?= $erreur['size']; ?></b>
    <?php endif ?>
    <?php if(isset($erreur['size'] ) ) : ?>
    <b><?= $erreur['move']; ?></b>
    <?php endif ?>
    <?php if(isset($validation ) ) : ?>
    <b><?= $validation; ?></b>
    <?php endif ?>
    <form action="" method="post" enctype="multipart/form-data">
      <input type="file" name="avatar">
      <input type='submit' value="uploader">
    </form>

  </body>
</html>

<?php
//******************************************************************************
// FONCTION SUR LES TABLEAUX
//******************************************************************************

//DECOUPER DES TERMES EN TABLEAU
$termes  = 'php,mysql,apache,html,css';

$termes_tableau = explode(',',$termes);

//Regarder si une valeur appartien à un TABLEAUX

if(in_array('javascript', $termes_tableau )){
  echo 'Formation mysql<br>';
}

//le unset va détruire l'entrée 2 ce qui donnera
// 1 3 4 5 6 pour le tableau, ce qui n'est pas propre
unset($termes_tableau['2']);

//array values reconstruit le tableau de facon propre
$tableau = array_values( $termes_tableau );

//recolle des variables d'un tableau en une seule chaine
$chaine = implode( '/',$termes_tableau );

//Compter les éléments dans un tableau
$count = count($termes_tableau);

//Lire un tableau
foreach ($membre as $info => $value) :
  ?>
    <h2><?= $info ?></h2> <?= $value ?><br>
  <?php
endforeach;

//*******************************************
// CONDITIONS
//*******************************************

//EXPRESSION TERNAIRE
$majeur = ( $membre['age'] >= 18 ) ? true : false;

//Structure switch
switch ( $membre['age'] ){

  case 10 :
  echo  'vous avez 10 ans';
  break;

  default :
  echo 'Vous n\'avez pas 10 ou 20 ans';
}

//STRUCTURE IF
if( $membre['age'] < 10  ){
  echo 'Vous êtes un enfant';
}
elseif($membre['age'] < 20){
  echo 'Vous êtes un ado';
}
else{
  echo 'Vous êtes un adulte';
}

//******************************************************************************
// ECHO
//******************************************************************************
?>
  <h1> <?= 'salut ' . $membre['name'] . '! Vous avez ' . $membre['age'] . '
   ans et vous faites ' .$membre['taille']. 'm' ?> </h1>

<?php

//******************************************************************************
// COMPARAISON ET FORMULES MATHEMATIQUE
//******************************************************************************

//Pour les calculs, taper "MATH" dans le manuel php
//sur http://php.net/manual/fr/book.math.php

//Comparaison de valeure
// 28 et 28.0 renverront vraie car la valeure est la même
var_dump( $membre[0]['age'] == $membre [1]['age']);

/*vérifie le contenu mais aussi le type ! exemple 28 et 28.0 renverront false*/
var_dump( $membre[0]['age'] === $membre [1]['age']);

//Opeateur null coalescing
//On regarde si prénom éxiste, si c'est pas le cas ca sera égale a membre 0
//Si membre 0 name n'éxiste pas, ca sera alors égale à Steven
$name = $prenom ?? $membre[0]['name'] ?? 'Steven';

//******************************************************************************
// FONCTIONS
//******************************************************************************

//retourne un string et prend en argument des string
function direBonjour(string $prenom = '', string $nom = '') : string{

  $result = 'Bonjour à vous '. $prenom .' '. $nom;

  return $result;
}

//******************************************************************************
// GESTION DES ERREURS
//******************************************************************************

try {
  echo division (8,0);
} catch (TypeError $e) {
  echo 'erreur : '.$e->getMessage();
}
catch( DivisionByZeroError $e ){

  echo 'Erreur : '.$e->getMessage();
}

//******************************************************************************
// METHOD POST
//******************************************************************************

<?php
  if(!empty( $_POST ) ){
    //seulement si le formulaire a été soumis
    //EXTRACT PERMET D EXTRAIRE LES VARIABLES AFIN DE LES LIRES PLUS FACILEMENT
    //PAR LA SUITE
    extract( $_POST );

    echo $search;
  }
?>

<?php
 //*****************************************************************************
 // VARIABLE SESSION
 //*****************************************************************************

 //CREER SESSION
 session_start();

 $_SESSION['id'] = 8;

 //DETRUIRE LES VARIABLES DE SESSIONS
 $_SESSION = [];

 //DETRUIRE LES COOKIES DE SESSIONS
 if (ini_get("session.use_cookies")) {
   $params = session_get_cookie_params();
   setcookie(session_name(), '', time() - 42000,
       $params["path"], $params["domain"],
       $params["secure"], $params["httponly"]
     );
 }

 session_destroy();
?>
<?php
 //*****************************************************************************
 // BDD BASE DE DONNEES PDO
 //*****************************************************************************

 try {

   $bdd = new PDO('mysql:host=localhost;dbname=tuto','root','');
 } catch (Exception $e) {
   die('erreur'. $e->getMessage() );
 }

//LECTURE

 //A UTILISER SI ON A DES VARIABLES
 //DEUX METHODES POUR LES REQUETES PREPAREES
 $req = $bdd -> prepare('SELECT * FROM article WHERE id = ?');
 $req->execute([$_GET['id']]);
 $data = $req->fetchAll();

 // ou plus propre

 $req2 = $bdd -> prepare('SELECT * FROM article WHERE id = :id');
 $req2->execute([
     'id' => $_GET['id']
 ]);
 $data = $req->fetchAll();

 //INTEGRATION

 //HTMLSPECIALCHARS PERMET DE CONTRER LA FAILLE XSS
 //INCLUSION DE JAVASCRIPT DANS LA BDD



 $req = $bdd->prepare( 'INSERT INTO article(title,body) VALUES (:title,:body)' );
 $req->execute([

   'title' =>  htmlspecialchars($title),
   'body'=> htmlspecialchars($body)

 ]);
}

//******************************************************************************
// POO
//******************************************************************************

//CONSTRUCTEUR

  class Membre {

    private $id;

    public function __construct(int $id){
      $this->id = $id;
    }

    public function getId(){
      //retourner propriété id
      return $this->id ;
    }

    public function setId(int $id){
      $this->id = $id;
    }

    const CONST = 5;
  }

// HERITAGE

class Personne{
  protected function test(){
    return 'salut à vous';
  }
}

  class Membre extends Personne{

    //public [accessible de partout]
    //protected [accessible que par les propriétés]
    // private [bloqué accessivle que dans la classe]
    private $id = 5;

    public function getId(){
      //retourner propriété id
      return $this->id . $this->test();
    }

  // RESOLUTION DE PORTEE

  class Personne {
    private $id;

    public function __construct($id){
      $this->id = $id;
    }

    public function getId(){
      //retourner propriété id
      return $this->id ;
    }

    public function setId(int $id){
      $this->id = $id;
    }
  }

  class Membre extends Personne{

    private $avatar;

    public function __construct(int $id, string $avatar){

      $this->avatar = $avatar;
      parent::__construct( $id );
    }

    public function getId(){
      //retourner propriété id
      return parent::getId();
    }

    public function setId(int $id){
      parent::setId($id);
    }

    const CONST = 5;
  }
