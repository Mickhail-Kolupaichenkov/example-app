<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Project extends Model
{
    protected $fillable = [
        'project_name',
        'status_active',
        'user_id',
        'assignee_id',
        'deadline_date'
    ];

    protected $casts = [
        'status_active' => 'boolean',
        'deadline_date' => 'date',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    protected $dates = [
        'deadline_date',
        'created_at',
        'updated_at'
    ];

    /**
     * Связь проекта с юзером, который его создал
     */
    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Связь проекта с отвественным за выполнение проекта
     */
    public function assignee(): BelongsTo
    {
        return $this->belongsTo(User::class, 'assignee_id');
    }
}
