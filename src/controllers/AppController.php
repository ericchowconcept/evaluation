<?php

class AppController
{

    public static function index()
    {
        $topics = Topic::findAll();

        include(VIEWS . 'app/index.php');
    }

    // *Fonction pour user
    public static function connexion()
    {
       if(!empty($_POST))
       {
        $user = User::findByEmail(['email' => $_POST['email']]);
        if($user){
            if(password_verify($_POST['password'], $user['password']))
            {
                $_SESSION['user'] = $user;
                $_SESSION['messages']['success'][] = "Bienvenue " . $user['nickname'] . "!!";

                header('location:' . BASE);
                exit;
            }else{
                $_SESSION['messages']['danger'][] = " Erreur sur le mot de passe";
            }    
        }else{
        $_SESSION['messages']['danger'][] = " Aucun compte existant à cet adresse mail";
       }
            
       }
        
    
     include(VIEWS."app/connexion.php" ) ;
    }
    // *Fonction pour user
    public static function logout()
    {
    
        unset($_SESSION['user']);

        $_SESSION['messages']['info'][] = "A bientôt !!";
        header('location:' . BASE);
        exit;
    }

    // *Fonction pour user
    public static function inscription()
    {
       if(!empty($_POST))
       {
            $error=[];
            function valid_pass($candidate)
            {
                $r1 = '/[A-Z]/';  //Uppercase
                $r2 = '/[a-z]/';  //lowercase
                $r3 = '/[!@#$%^&*()\-_=+{};:,<.>]/';  // whatever you mean by 'special char'
                $r4 = '/[0-9]/';  //numbers
                
                if (preg_match_all($r1, $candidate, $o) < 1) return FALSE;

               if (preg_match_all($r2, $candidate, $o) < 1) return FALSE;

                if (preg_match_all($r3, $candidate, $o) < 1) return FALSE;

                if (preg_match_all($r4, $candidate, $o) < 1) return FALSE;

               if (strlen($candidate) < 5) return FALSE;

                return TRUE;
            }
            if(empty($_POST['nickname']))
            {
                $error['nickname'] = "le champs est obligatoire";
            }
            if(empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) || User::findByEmail(['email' => $_POST['email'] ]) )
            {
                if(User::findByEmail(['email' => $_POST['email']]))
                {
                    $_SESSION['messages']['danger'][] = "Un compte est déjà existant à cet adresse mail";
                    $error = '';
                }else
                {
                    $error['email'] = "le champs email est obligatoire et l'adresse email doit être validé";
                }
                if(empty($_POST['password']) || !valid_pass($_POST['password']))
                {
                        $error['password'] = "le champs est obligatoire et votre mot de passe doit contenir: 
                        <ul>
                            <li>une majuscule</li>
                            <li>minuscule</li>
                            <li>un chiffre</li> 
                            <li>un caractçre spécial</li> 
                            <li>doit faire plus de 4 caractères</li>
                        </ul>";
                }
                if(empty($_POST['checkPwd']) || $_POST['password'] != $_POST['checkPwd'])
                {
                    $error['checkPwd'] = "le champs est obligatoire est les mot de apsse doivent être concorder";
                }
            }
            if(!$error)
            {
                $mdp = password_hash($_POST['password'], PASSWORD_DEFAULT);

            
                if((!empty($_FILES['photo']['name'])) && $_FILES['photo']['size'] < 3000000 && ($_FILES['photo']['type'] == 'image/jpeg'|| $_FILES['photo']['type'] == 'image/png' || $_FILES['photo']['type'] == 'image/gif' || $_FILES['photo']['type'] == 'image/webp' ))
                {
                    
                    $nameImage = date("dmYHis") . $_FILES['photo']['name'];
                    copy($_FILES['photo']['tmp_name'], PUBLIC_FOLDER . 'upload' . DIRECTORY_SEPARATOR . $nameImage);

                    $data = [
                        'email'     => $_POST['email'],
                        'nickname'  => $_POST['nickname'],
                        'password'  => $mdp,
                        'picture_profile'    => $nameImage,
                    ];
                    User::addUser($data);
                    
                }
                
                

                

                $_SESSION['messages']['success'][] = "Félicitations, vous êtes à présent inscrit. Connectez-vous!!";
                header('location:' . BASE . 'connexion');
                exit;
    
            }

       }
    
    
     include(VIEWS."app/inscription.php" ) ;
    }

    public static function addTopic()
    {   
       if(!empty($_POST))
       {
        
        $error = [];
        if(empty($_POST['topic']))
        {
            $error['topic'] = "";
            $_SESSION['messages']['danger'][] = "pas de topic";
        }
        
        if(!$error)
        {
            Topic::add([
                'title'     => $_POST['topic'],
                'id_user'   => $_SESSION['user']['id_user'],
                'created_at'=> date_format(new DateTime(), 'Y-m-d H:i:s'),
            ]);

            $_SESSION['messages']['success'][] = "Vous pouvez désormais ajouter un commentaire";
               
        }
        
       }
      header('location:' . BASE);
      exit;  
    }

    public static function deleteTopic()
    {
        if(isset($_SESSION['user']))
        {
            if(!empty($_GET['id']))
            {
                Topic::delete([
                    'id_topic' => $_GET['id']
                ]);
                $_SESSION['messages']['success'][] = 'Votre topic est supprimé';
            }
        }
       
    
    
        header('location:' . BASE);
        exit;  
    }

    public static function addMessage()
    {
       
        $topics = Message::findAll();
        if(!empty($_POST))
       {
        
        $error = [];
        if(empty($_POST['content']))
        {
            $error['content'] = "";
            $_SESSION['messages']['danger'][] = "pas de message";
        }
        
        if(!$error)
        {
            Message::add([
                'content'     => $_POST['content'],
                'id_user'   => $_SESSION['user']['id_user'],
                'id_topic'  => $_SESSION['user']['id_topic'],
                'created_at'=> date_format(new DateTime(), 'Y-m-d H:i:s'),
            ]);

            $_SESSION['messages']['success'][] = "Vous pouvez désormais ajouter un commentaire";
               
        }
    
     
    }
include(VIEWS."app/tchat.php" ) ;
}

}