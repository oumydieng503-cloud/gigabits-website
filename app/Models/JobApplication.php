<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class JobApplication extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'type',
        'position',
        'message',
        'cv_path',
        'read_at',
    ];

    protected function casts(): array
    {
        return [
            'read_at' => 'datetime',
        ];
    }

    public function typeLabel(): string
    {
        return match ($this->type) {
            'stage' => 'Stage',
            'emploi' => 'Emploi',
            default => $this->type,
        };
    }

    public function isUnread(): bool
    {
        return $this->read_at === null;
    }

    public function cvUrl(): ?string
    {
        return $this->cv_path ? Storage::disk('public')->url($this->cv_path) : null;
    }
}
