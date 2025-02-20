<?php

/**
 * @method Adding a user
 * @param PDO $bdd
 * @param object $account [username, email, password]
 * @return void
 */
function addAccount(PDO $bdd, object $account): void {
    try{
        $requete = "INSERT INTO `user`(username, email, `password`)
        VALUE(?,?,?)";
        $req = $bdd->prepare($requete);
        $req->bindParam(1,$account->username, PDO::PARAM_STR);
        $req->bindParam(2,$account->email, PDO::PARAM_STR);
        $req->bindParam(3,$account->password, PDO::PARAM_STR);
        $req->execute();
    }
    catch(Exception $e) {
        echo "Error : " . $e->getMessage();
    }
}

/**
 * @method Editing a user account
 * @param PDO $bdd
 * @param array $account [username, new email, current email]
 * @return void
 */
function updateAccount(PDO $bdd, array $account): void {
    try {
        $requete = "UPDATE `user` SET username=?,  email=? 
        WHERE email=?";
        $req = $bdd->prepare($requete);
        $req->bindParam(1,$account[0], PDO::PARAM_STR);
        $req->bindParam(2,$account[1], PDO::PARAM_STR);
        $req->bindParam(3,$account[3], PDO::PARAM_STR);
        $req->execute();
    } catch (Exception $e) {
        echo "Error : " . $e->getMessage();
    }
}

/**
 * @method Delete a user
 * @param PDO $bdd
 * @param string $email
 * @return void
 */
function deleteAccount(PDO $bdd, string $email): void {
    try{
        $requete = "DELETE FROM `user` WHERE email=?";
        $req = $bdd->prepare($requete);
        $req->bindParam(1,$email, PDO::PARAM_STR);
        $req->execute();
    } catch(Exception $e) {
        echo "Error : " . $e->getMessage();
    }
}
/**
 * @method Retrieve a user by its email
 * @param PDO $bdd
 * @param string $email
 * @return ?array acount [id, username, email, password]
 */
function getAccountByEmail(PDO $bdd, string $email): array | bool | null {
    try {
        $requete = "SELECT id, username, email, `password` FROM `user`
        WHERE email = ?";
        $req = $bdd->prepare($requete);
        $req->bindParam(1,$email, PDO::PARAM_STR);
        $req->execute();
        $data = $req->fetch(PDO::FETCH_ASSOC);
        return $data;
    } catch (Exception $e) {
        echo "Error : " . $e->getMessage();
        return null;
    }
}

/**
 * @method Retrieve all the users
 * @param PDO $bdd
 * @return ?array acount [id, username, email]
 */
function getAllAccount(PDO $bdd): ?array{
    try {
        $requete = "SELECT id, username, email FROM `user`";
        $req = $bdd->prepare($requete);
        $req->execute();
        $data = $req->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    } catch (Exception $e) {
        echo "Error : " . $e->getMessage();
    }
}
