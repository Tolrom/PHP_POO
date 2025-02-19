<?php
class AccountModel extends AbstractModel {
    //! Properties
    private int $id;
    private array $account;
    private string $email;

    //! Getters & Setters

    /**
     * Get the value of id
     *
     * @return int
     */
    public function getId(): int {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @param int $id
     *
     * @return self
     */
    public function setId(int $id): self {
        $this->id = $id;
        return $this;
    }

    /**
     * Get the value of account
     *
     * @return array
     */
    public function getAccount(): array {
        return $this->account;
    }

    /**
     * Set the value of account
     *
     * @param array $account
     *
     * @return self
     */
    public function setAccount(array $account): self {
        $this->account = $account;
        return $this;
    }

    /**
     * Get the value of email
     *
     * @return string
     */
    public function getEmail(): string {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @param string $email
     *
     * @return self
     */
    public function setEmail(string $email): self {
        $this->email = $email;
        return $this;
    }

    //! Methods

/**
 * @method Adds an account to the database
 * @return void
 */
public function add(): void {
    try{
        $requete = "INSERT INTO account(firstname, lastname, email, `password`)
        VALUE(?,?,?,?)";
        $req = $this->connexion()->prepare($requete);
        $req->bindParam(1,$this->getAccount()[0], PDO::PARAM_STR);
        $req->bindParam(2,$this->getAccount()[1], PDO::PARAM_STR);
        $req->bindParam(3,$this->getAccount()[2], PDO::PARAM_STR);
        $req->bindParam(4,$this->getAccount()[3], PDO::PARAM_STR);
        $req->execute();
    }
    catch(Exception $e) {
        echo "Erreur : " . $e->getMessage();
    }
}

    /**
     * @method Edit an account in the database
     * @return void
     */
    public function update(array $newAccount): void {
        try {
            $requete = "UPDATE account SET firstname=?, lastname=?, email=? 
            WHERE email=?";
            $req = $this->connexion()->prepare($requete);
            $req->bindParam(1,$newAccount[0], PDO::PARAM_STR);
            $req->bindParam(2,$newAccount[1], PDO::PARAM_STR);
            $req->bindParam(3,$newAccount[2], PDO::PARAM_STR);
            $req->bindParam(4,$this->getAccount()[2], PDO::PARAM_STR);
            $req->execute();
        } catch (Exception $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }
    
    /**
     * @method Delete an account in the database
     * @return void
     */
    public function delete(): void {
        try{
            $requete = "DELETE FROM account WHERE email=?";
            $req = $this->connexion()->prepare($requete);
            $req->bindParam(1,$this->getAccount()[2], PDO::PARAM_STR);
            $req->execute();
        } catch(Exception $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }
    public function getAll(): ?array {
        try {
            $requete = "SELECT id_account, firstname, lastname, email FROM account";
            $req = $this->connexion()->prepare($requete);
            $req->execute();
            $data = $req->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        } catch (Exception $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }
    public function getById(string $id): ?array {
        try {
            $requete = "SELECT id_account, firstname, lastname, email, `password` FROM account
            WHERE id_account = ?";
            $req = $this->connexion()->prepare($requete);
            $req->bindParam(1,$id, PDO::PARAM_STR);
            $req->execute();
            $data = $req->fetch(PDO::FETCH_ASSOC);
            return $data;
        } catch (Exception $e) {
            echo "Erreur : " . $e->getMessage();
            return null;
        }
    }
    public function getAccountByEmail(string $email): array|null|bool {
        try {
            $requete = "SELECT id_account, firstname, lastname, email, `password` FROM account
            WHERE email = ?";
            $req = $this->connexion()->prepare($requete);
            $req->bindParam(1,$email, PDO::PARAM_STR);
            $req->execute();
            $data = $req->fetch(PDO::FETCH_ASSOC);
            return $data;
        } catch (Exception $e) {
            echo "Erreur : " . $e->getMessage();
            return null;
        }
    }

}