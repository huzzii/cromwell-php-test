<?php

require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../helpers/Validator.php';

class UserService
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new User();
    }

    /**
     * Register User
     */
    public function register(array $data)
    {
        // Trim all string values
        $data = array_map(function ($value) {
            return is_string($value) ? trim($value) : $value;
        }, $data);

        $validator = new Validator();

        // Required Fields
        $validator->required('forenames', $data['forenames'] ?? '', 'Forenames');
        $validator->required('surname', $data['surname'] ?? '', 'Surname');
        $validator->required('title', $data['title'] ?? '', 'Title');
        $validator->required('date_of_birth', $data['date_of_birth'] ?? '', 'Date of Birth');
        $validator->required('mobile_phone', $data['mobile_phone'] ?? '', 'Mobile Phone');
        $validator->required('email', $data['email'] ?? '', 'Email');
        $validator->required('password', $data['password'] ?? '', 'Password');
        $validator->required('confirm_password', $data['confirm_password'] ?? '', 'Confirm Password');

        // Email Validation
        if (!empty($data['email'])) {
            $validator->email('email', $data['email']);
        }

        // Password Length
        if (!empty($data['password'])) {
            $validator->minLength('password', $data['password'], 8, 'Password');
        }

        // Password Match
        $validator->match(
            'confirm_password',
            $data['password'] ?? '',
            $data['confirm_password'] ?? '',
            'Passwords do not match.'
        );

        if (!$validator->isValid()) {
            return [
                'success' => false,
                'message' => 'Validation failed.',
                'errors' => $validator->getErrors(),
                'status' => 422
            ];
        }

        // Check duplicate email
        if ($this->userModel->emailExists($data['email'])) {
            return [
                'success' => false,
                'message' => 'Email already exists.',
                'errors' => [
                    'email' => 'This email is already registered.'
                ],
                'status' => 409
            ];
        }

        // Optional fields
        $data['title'] = $data['title'] ?? null;
        $data['other_phone'] = $data['other_phone'] ?? null;

        // Hash password
        $data['password_hash'] = password_hash(
            $data['password'],
            PASSWORD_DEFAULT
        );

        unset($data['password'], $data['confirm_password']);

        // Save user
        $this->userModel->create($data);

        return [
            'success' => true,
            'message' => 'User registered successfully.',
            'data' => [],
            'status' => 201
        ];
    }

    public function login(array $data)
    {
        $validator = new Validator();

        $validator->required('email', $data['email'] ?? '', 'Email');
        $validator->required('password', $data['password'] ?? '', 'Password');

        if (!$validator->isValid()) {
            return [
                'success' => false,
                'message' => 'Validation failed.',
                'errors' => $validator->getErrors(),
                'status' => 422
            ];
        }

        $user = $this->userModel->findByEmail($data['email']);

        if (!$user) {
            return [
                'success' => false,
                'message' => 'Invalid email or password.',
                'errors' => [],
                'status' => 401
            ];
        }

        if (!password_verify($data['password'], $user['password_hash'])) {
            return [
                'success' => false,
                'message' => 'Invalid email or password.',
                'errors' => [],
                'status' => 401
            ];
        }

        unset($user['password_hash']);

        return [
            'success' => true,
            'message' => 'Login successful.',
            'data' => $user,
            'status' => 200
        ];
    }

    public function getUser($id)
    {
        $user = $this->userModel->getById($id);

        if (!$user) {

            return [
                'success' => false,
                'message' => 'User not found.',
                'errors' => [],
                'status' => 404
            ];
        }

        return [
            'success' => true,
            'message' => 'User fetched successfully.',
            'data' => $user,
            'status' => 200
        ];
    }

    public function update($id, $data)
    {
        $this->userModel->updateUser($id, $data);

        return [
            'success' => true,
            'message' => 'User updated successfully.',
            'data' => [],
            'status' => 200
        ];
    }
}