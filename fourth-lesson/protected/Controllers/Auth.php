<?php

namespace App\Controllers;

use App\Controller;

use App\Models\User;

class Auth
    extends Controller
{
    public static function checkAdmin() : bool
    {   
        session_start();
        if ( isset( $_SESSION['id'] ) ) {
            if ( md5( '1' ) == $_SESSION['id'] ){
                return true;
            }
        }
        return false;
    }

    public function actionVerify()
    {
        if ( !empty( $_POST['email'] ) && !empty( $_POST['password'] )  ) {
            $user = User::findByEmail( $_POST['email'] );
            if ( !empty( $user ) ) {
               $user = $user[0];
               if ( password_verify( $_POST['password'], $user->password ) ) {
                    session_start();
                    $_SESSION['id'] = md5( $user->id );
                    $_SESSION['email'] = $user->email;

                    if ( self::checkAdmin() ) {
                        header("Location: http://learn-php2.local/fourth-lesson/public/Admin/");
                        exit;
                    }
                    header("Location: http://learn-php2.local/fourth-lesson/public/News/");
                    exit;
               }
            }
        }
    }

    public function actionLogin()
    {
        $this->view->login = ['login']; //Заглушка
        $this->view->display( __DIR__ . '/../../templates/login.php' );
    }

    public function actionLogout()
    {   
        session_start();
        var_dump($_SESSION);
        unset($_SESSION['id']);
        unset($_SESSION['user']);
        session_destroy();
        var_dump($_SESSION);
        // header("Location: http://learn-php2.local/fourth-lesson/public/News/");    
        // exit; 
    }
}