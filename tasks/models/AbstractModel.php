<?php
require "./utils/InterfaceDatabase.php";
abstract class AbstractModel {

    //! Properties

    /**
     * Database
     * @var InterfaceDatabase $db
     */
    private InterfaceDatabase $db;


    //! Getters & Setters

    /**
     * Get the db
     *
     * @return InterfaceDatabase
     */
    public function getDb(): InterfaceDatabase {
        return $this->db;
    }

    /**
     * Set the db
     *
     * @param InterfaceDatabase $db
     *
     * @return self
     */
    public function setDb(InterfaceDatabase $db): self {
        $this->db = $db;
        return $this;
    }

    //! Methods

    abstract public function add(PDO $bdd, array $account ): void;
    abstract public function update(PDO $bdd, array $account ): void;
    abstract public function delete(PDO $bdd, array $account ): void;
    abstract public function getAll(PDO $bdd ): ?array;
    abstract public function getById(PDO $bdd, int $id): ?array;
}