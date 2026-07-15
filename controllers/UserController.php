<?php

require_once __DIR__ . '/../services/UserService.php';
require_once __DIR__ . '/../helpers/Response.php';

class UserController
{
    private $userService;

    public function __construct()
    {
        $this->userService = new UserService();
    }

    /**
     * Register User
     */
    public function register(array $data)
    {
        $result = $this->userService->register($data);

        if ($result['success']) {
            Response::success(
                $result['message'],
                $result['data'] ?? [],
                $result['status'] ?? 200
            );
        }

        Response::error(
            $result['message'],
            $result['errors'] ?? [],
            $result['status'] ?? 400
        );
    }

    /**
     * Login User
     */
    public function login(array $data)
    {
        $result = $this->userService->login($data);

        if ($result['success']) {
            Response::success(
                $result['message'],
                $result['data'] ?? [],
                $result['status'] ?? 200
            );
        }

        Response::error(
            $result['message'],
            $result['errors'] ?? [],
            $result['status'] ?? 400
        );
    }

    /**
     * Get User
     */
    public function getUser($id)
    {
        $result = $this->userService->getUser($id);

        if ($result['success']) {
            Response::success(
                $result['message'],
                $result['data'],
                $result['status']
            );
        }

        Response::error(
            $result['message'],
            $result['errors'] ?? [],
            $result['status']
        );
    }

    /**
     * Update User
     */
    public function update($id, array $data)
    {
        $result = $this->userService->update($id, $data);

        if ($result['success']) {
            Response::success(
                $result['message'],
                $result['data'] ?? [],
                $result['status']
            );
        }

        Response::error(
            $result['message'],
            $result['errors'] ?? [],
            $result['status']
        );
    }
}