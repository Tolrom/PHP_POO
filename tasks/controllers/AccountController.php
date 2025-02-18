<?php
class AccountController extends AbstractController {
    public function signUp(): string{
        //  TODO
        return "";
    }
    public function displayAccounts(): string {
            //Récupération de la liste des utilisateurs
        //$data = getAllAccount($bdd);
        $data = [];
        $listUsers = "";
        foreach($data as $account){
            $listUsers = $listUsers."<li><h2>".$account['firstname'] ." ". $account['lastname']."</h2>      <p>".$account['email']."</p></li>";
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
                        <input type='text' name='lastname' placeholder='Name'>
                        <input type='text' name='firstname' placeholder='Firstname'>
                        <input type='text' name='email' placeholder='Email'>
                        <input type='password' name='password' placeholder='Password'>
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
                        <input type='text' name='emailSignIn' placeholder='Email'>
                        <input type='password' name='passwordSignIn' placeholder='Password'>
                        <input type='submit' name='submitSignIn'>
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