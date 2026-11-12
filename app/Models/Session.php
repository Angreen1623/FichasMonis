<?php

namespace App\Models;

use App\DAO\SessionDAO;

class Session extends Model
{
    private ?string $id = null;
    private ?int $id_user = null;
    private ?string $ip_address = null;
    private ?string $user_agent = null;
    private ?string $created_at = null;
    private ?string $last_activity = null;
    private ?string $expires_at = null;
    private ?string $expired_at = null;


    #region CRUD

    public function save(): ?Session
    {
        return (new SessionDAO)->save($this);
    }

    public function getById(string $id_session): ?Session
    {
        return (new SessionDAO)->selectById($id_session);
    }

    #endregion

    #region Getters and Setters

    public function getId(): ?string {
        return $this->id;
    }

    public function setId(?string $id): void {
        $this->id = $id;
    }

    public function getIdUser(): ?int {
        return $this->id_user;
    }

    public function setIdUser(?int $id_user): void {
        $this->id_user = $id_user;
    }

    public function getIpAddress(): ?string {
        return $this->ip_address;
    }

    public function setIpAddress(?string $ip_address): void {
        $this->ip_address = $ip_address;
    }

    public function getUserAgent(): ?string {
        return $this->user_agent;
    }

    public function setUserAgent(?string $user_agent): void {
        $this->user_agent = $user_agent;
    }

    public function getCreatedAt(): ?string {
        return $this->created_at;
    }

    public function setCreatedAt(?string $created_at): void {
        $this->created_at = $created_at;
    }

    public function getLastActivity(): ?string {
        return $this->last_activity;
    }

    public function setLastActivity(?string $last_activity): void {
        $this->last_activity = $last_activity;
    }

    public function getExpiresAt(): ?string {
        return $this->expires_at;
    }

    public function setExpiresAt(?string $expires_at): void {
        $this->expires_at = $expires_at;
    }

    public function getExpiredAt(): ?string {
        return $this->expired_at;
    }

    public function setExpiredAt(?string $expired_at): void {
        $this->expired_at = $expired_at;
    }

    #endregion
}