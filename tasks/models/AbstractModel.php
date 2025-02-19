<?php
require "./utils/InterfaceDatabase.php";
require "./utils/MySQLDB.php";
abstract class AbstractModel extends MySQLDB {

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

    abstract public function add(): void;
    abstract public function update(array $newAccount): void;
    abstract public function delete(): void;
    abstract public function getAll(): ?array;
    abstract public function getById(string $id): ?array;
}