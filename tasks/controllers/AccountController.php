<?php
include "models/AccountModel.php";
include "utils/Utils.php";
class AccountController extends AbstractController {
    public function signUp(): void{
    $message = "";
    // Form submitted
    if(isset($_POST['submitSignUp'])){

        // Checking if inputs are all filled
        if( !empty($_POST['firstname']) && 
            !empty($_POST['lastname']) && 
            !empty($_POST['email']) && 
            !empty($_POST['password']) && 
            !empty($_POST['passwordConf'])
            ){

            // Checking that password matches the required characters
            $password = $_POST['password'];
            $uppercase = preg_match('@[A-Z]@', $password);
            $lowercase = preg_match('@[a-z]@', $password);
            $number    = preg_match('@[0-9]@', $password);
            $specialChars = preg_match('@[^\w]@', $password);
            if($uppercase && $lowercase && $number && $specialChars && strlen($password) > 8) {

                // Checking if both passwords match
                if($_POST['password'] == $_POST['passwordConf']){

                    // Cleaning inputs
                    $firstname = Utils::sanitize($_POST['firstname']);
                    $lastname = Utils::sanitize($_POST['lastname']);
                    $email = Utils::sanitize($_POST['email']);

                    // Making sure the account doesn't already exist in the database
                    if(!$this->getListModels()['account']->getAccountByEmail($_POST['email'])) {

                        // Hashing password
                        $hash = password_hash(Utils::sanitize($password), PASSWORD_DEFAULT);

                        // Storing data into an array and sending it to the model
                        $acc = [$firstname, $lastname, $email, $hash];
                        $this->getListModels()['account']->setAccount($acc);
                        $this->getListModels()['account']->add();
                    }
                    else {
                        $message = '<li>Compte déjà existant en bdd</li>';
                    }
                }
                else {
                    $message . '<li>Les mots de passe ne correspondent pas</li>';
                }
            }
            else {
                if(!$uppercase){
                    $message . '<li>Le mot de passe doit contenir une majuscule</li>';
                }
                if(!$lowercase){
                    $message . '<li>Le mot de passe doit contenir une minuscule</li>';
                }
                if(!$number){
                    $message . '<li>Le mot de passe doit contenir un chiffre</li>';
                }
                if(!$specialChars){
                    $message . '<li>Le mot de passe doit contenir un caractère spécial</li>';
                }
                if(strlen($password) < 8){
                    $message . '<li>Le mot de passe doit contenir au moins 8 caractères</li>';
                }
            }
        }
        else {
            $message = '<li>Veuillez remplir tous les champs</li>';
        }
    }
    }
    public function displayAccounts(): string {
            // Fetching accounts from the database
        $data = $this->getListModels()['account']->getAll();
        $listUsers = "";
        foreach($data as $account){
            $listUsers = $listUsers."<li><h4>".$account['firstname'] ." ". $account['lastname']."</h4>      <p>".$account['email']."</p></li>";
        }
        return $listUsers;
    }
    public function login(): string{
        //TODO
        return "";
    }
    public function displayForm(?string $message, ?string $messageLogin): string{
        if(!isset($_SESSION['id'])){
            return "
                <section>
                    <h1>Sign Up</h1>
                    <form action='' method='post'>
                        <input type='text' name='firstname' placeholder='Firstname'>
                        <input type='text' name='lastname' placeholder='Name'>
                        <input type='text' name='email' placeholder='Email'>
                        <input type='password' name='password' placeholder='Password'>
                        <input type='password' name='passwordConf' placeholder='Confirm Password'>
                        <input type='submit' name='submitSignUp'>
                    </form>
                    <p> $message </p>
                </section>
            ";
        }
        else {
            return "
                <section>
                    <h1>Login</h1>
                    <form action=' method=post>
                        <input type='text' name='emailLogin' placeholder='Email'>
                        <input type='password' name='passwordLogin' placeholder='Password'>
                        <input type='submit' name='submitLogin'>
                    </form>
                    <p> $messageLogin </p>
                </section>
            ";
        }
    }
    public function render(): void {
        $this->renderHeader();
        echo $this->getListViews()['home']->setForm($this->displayForm("",""))->setListUsers($this->displayAccounts())->displayView();
        $this->renderFooter();
    }
}