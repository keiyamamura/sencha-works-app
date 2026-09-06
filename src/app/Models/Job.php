<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    public const RECRUITMENT_OPEN = 1;
    public const RECRUITMENT_CLOSED = 2;
    public const PUBLIC_OPEN = 1;
    public const PUBLIC_CLOSED = 2;

    protected $fillable = [
        'owner_id',
        'title',
        'description',
        'prefectures_id',
        'status',
        'recruitment_status',
        'public_status',
        'wage_type',
        'salary_amount',
        'img_name',
        'img_path',
        'age',
        'license',
        'experience',
        'company_name',
        'company_tel',
        'company_email',
    ];

    public function owner()
    {
        return $this->belongsTo(Owner::class);
    }

    public function isRecruiting()
    {
        return (int) $this->recruitment_status === self::RECRUITMENT_OPEN;
    }

    public function isPublished()
    {
        return (int) $this->public_status === self::PUBLIC_OPEN;
    }

    public function applicants()
    {
        return $this->hasMany(Applicant::class);
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }
}
