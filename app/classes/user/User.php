<?php

namespace App\User;

Class User {

    protected $data;

    public function __construct($data = null) {
        if (!$data) {
            $this->data = [
                'email' => null,
                'balance' => null,
            ];
        } else {
            $this->setData($data);
        }
    }

    public function setEmail(string $email) {
        $this->data['email'] = $email;
    }

    public function getEmail() {
        return $this->data['email'];
    }

    public function setBalance(int $balance) {
        $this->data['balance'] = $balance;
    }

    public function getBalance() {
        return $this->data['balance'];
    }

    public function setData(array $data) {
        $this->setEmail($data['email'] ?? '');
        $this->setBalance($data['balance'] ?? null);
    }

    public function getData() {
        return $this->data;
    }

}
