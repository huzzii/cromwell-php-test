<?php

require_once __DIR__ . '/../config/Database.php';

class User
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    /**
     * Check if email already exists.
     */
    public function emailExists($email)
    {
        $sql = "SELECT id FROM users WHERE email = :email LIMIT 1";

        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        return $stmt->fetch() ? true : false;
    }

    /**
     * Register new user.
     */
    public function create($data)
    {
        $sql = "INSERT INTO users
                (
                    forenames,
                    surname,
                    title,
                    date_of_birth,
                    mobile_phone,
                    other_phone,
                    email,
                    password_hash
                )
                VALUES
                (
                    :forenames,
                    :surname,
                    :title,
                    :date_of_birth,
                    :mobile_phone,
                    :other_phone,
                    :email,
                    :password_hash
                )";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            ':forenames' => $data['forenames'],
            ':surname' => $data['surname'],
            ':title' => $data['title'],
            ':date_of_birth' => $data['date_of_birth'],
            ':mobile_phone' => $data['mobile_phone'],
            ':other_phone' => $data['other_phone'],
            ':email' => $data['email'],
            ':password_hash' => $data['password_hash']
        ]);
    }

    /**
     * Get user by email.
     */
    public function findByEmail($email)
    {
        $sql = "SELECT * FROM users WHERE email = :email LIMIT 1";

        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        return $stmt->fetch();
    }

    /**
     * Get user by ID.
     */
    public function findById($id)
    {
        $sql = "SELECT
                    id,
                    forenames,
                    surname,
                    title,
                    date_of_birth,
                    mobile_phone,
                    other_phone,
                    email,
                    created_at,
                    updated_at
                FROM users
                WHERE id = :id";

        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        return $stmt->fetch();
    }

    /**
     * Update user.
     */
    public function update($id, $data)
    {
        $sql = "UPDATE users SET

                    forenames = :forenames,
                    surname = :surname,
                    title = :title,
                    date_of_birth = :date_of_birth,
                    mobile_phone = :mobile_phone,
                    other_phone = :other_phone,
                    updated_at = CURRENT_TIMESTAMP

                WHERE id = :id";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            ':forenames' => $data['forenames'],
            ':surname' => $data['surname'],
            ':title' => $data['title'],
            ':date_of_birth' => $data['date_of_birth'],
            ':mobile_phone' => $data['mobile_phone'],
            ':other_phone' => $data['other_phone'],
            ':id' => $id
        ]);
    }

    /**
     * Get user without password
     */
    public function getById($id)
    {
        $sql = "SELECT
                id,
                forenames,
                surname,
                title,
                date_of_birth,
                mobile_phone,
                other_phone,
                email
            FROM users
            WHERE id = :id
            LIMIT 1";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            ':id' => $id
        ]);

        return $stmt->fetch();
    }

    /**
     * Update User
     */
    public function updateUser($id, $data)
    {
        $sql = "UPDATE users SET
                forenames = :forenames,
                surname = :surname,
                title = :title,
                date_of_birth = :date_of_birth,
                mobile_phone = :mobile_phone,
                other_phone = :other_phone
            WHERE id = :id";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            ':forenames' => $data['forenames'],
            ':surname' => $data['surname'],
            ':title' => $data['title'],
            ':date_of_birth' => $data['date_of_birth'],
            ':mobile_phone' => $data['mobile_phone'],
            ':other_phone' => $data['other_phone'],
            ':id' => $id
        ]);
    }
}