<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    use HasFactory;

    public const STATUS_PENDING = 0;
    public const STATUS_ACCEPTED = 1;
    public const STATUS_REJECTED = 2;
    public const STATUS_CANCELLED = 3;

    protected $fillable = [
        'user_id',
        'job_id',
        'consent_flg',
    ];

    public static function statusLabels()
    {
        return [
            self::STATUS_PENDING => '応募中',
            self::STATUS_ACCEPTED => '承諾',
            self::STATUS_REJECTED => '不採用',
            self::STATUS_CANCELLED => 'キャンセル',
        ];
    }

    public function statusLabel()
    {
        return self::statusLabels()[$this->consent_flg] ?? '不明';
    }

    public function isPending()
    {
        return (int) $this->consent_flg === self::STATUS_PENDING;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function job()
    {
        return $this->belongsTo(Job::class);
    }
}
