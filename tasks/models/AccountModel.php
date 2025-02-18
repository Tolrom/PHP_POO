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
 * @method Add an account to the database
 * @param PDO $bdd
 * @param array $account [firstname, lastname, email, password]
 * @return void
 */
public function add(PDO $bdd, array $account): void {
    try{
        $requete = "INSERT INTO account(firstname, lastname, email, `password`)
        VALUE(?,?,?,?)";
        $req = $bdd->prepare($requete);
        $req->bindParam(1,$account[0], PDO::PARAM_STR);
        $req->bindParam(2,$account[1], PDO::PARAM_STR);
        $req->bindParam(3,$account[2], PDO::PARAM_STR);
        $req->bindParam(4,$account[3], PDO::PARAM_STR);
        $req->execute();
    }
    catch(Exception $e) {
        echo "Erreur : " . $e->getMessage();
    }
}
    public function update(PDO $bdd, array $account): void {
        //TODO
    }
    public function delete(PDO $bdd, array $account): void {
        //TODO
    }
    public function getAll(PDO $bdd): array|null {
        //TODO
        return null ;
    }
    public function getById(PDO $bdd, int $id): array|null {
        //TODO
        return null ;
    }
    public function getAccountByEmail(PDO $bdd, string $email): array|null {
        //TODO
        return null ;
    }

}