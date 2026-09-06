<?php

namespace App\Http\Controllers\Services;


class CheckForm
{
    public static function prefectureOptions()
    {
        return [
            1 => '北海道',
            2 => '青森県',
            3 => '岩手県',
            4 => '宮城県',
            5 => '秋田県',
            6 => '山形県',
            7 => '福島県',
            8 => '茨城県',
            9 => '栃木県',
            10 => '群馬県',
            11 => '埼玉県',
            12 => '千葉県',
            13 => '東京都',
            14 => '神奈川県',
            15 => '新潟県',
            16 => '富山県',
            17 => '石川県',
            18 => '福井県',
            19 => '山梨県',
            20 => '長野県',
            21 => '岐阜県',
            22 => '静岡県',
            23 => '愛知県',
            24 => '三重県',
            25 => '滋賀県',
            26 => '京都府',
            27 => '大阪府',
            28 => '兵庫県',
            29 => '奈良県',
            30 => '和歌山県',
            31 => '鳥取県',
            32 => '島根県',
            33 => '岡山県',
            34 => '広島県',
            35 => '山口県',
            36 => '徳島県',
            37 => '香川県',
            38 => '愛媛県',
            39 => '高知県',
            40 => '福岡県',
            41 => '佐賀県',
            42 => '長崎県',
            43 => '熊本県',
            44 => '大分県',
            45 => '宮崎県',
            46 => '鹿児島県',
            47 => '沖縄県',
        ];
    }

    public static function statusOptions()
    {
        return [
            1 => '正社員',
            2 => '派遣',
            3 => 'アルバイト',
        ];
    }

    public static function wageTypeOptions()
    {
        return [
            0 => '月給',
            1 => '時給',
        ];
    }

    public static function recruitmentStatusOptions()
    {
        return [
            1 => '募集中',
            2 => '募集終了',
        ];
    }

    public static function publicStatusOptions()
    {
        return [
            1 => '公開',
            2 => '非公開',
        ];
    }

    public static function ageLimitOptions()
    {
        return [
            1 => '~19歳',
            2 => '20歳~29歳',
            3 => '30歳~39歳',
            4 => '40歳~',
            5 => '年齢制限なし',
        ];
    }

    public static function licenseOptions()
    {
        return [
            1 => 'AT',
            2 => 'MT',
            3 => '不問',
        ];
    }

    public static function experienceOptions()
    {
        return [
            1 => '経験者',
            2 => '未経験者歓迎',
        ];
    }

    public static function gender($data)
    {
        $gender = '';

        if ($data == 0) {
            $gender = '男性';
        }
        if ($data == 1) {
            $gender = '女性';
        }

        return $gender;
    }

    public static function age($data)
    {
        $age = '';

        if ($data == 19) {
            $age = '19歳';
        }
        if ($data == 20) {
            $age = '20歳';
        }
        if ($data == 21) {
            $age = '21歳';
        }
        if ($data == 22) {
            $age = '22歳';
        }
        if ($data == 23) {
            $age = '23歳';
        }
        if ($data == 24) {
            $age = '24歳';
        }
        if ($data == 25) {
            $age = '25歳';
        }
        if ($data == 26) {
            $age = '26歳';
        }
        if ($data == 27) {
            $age = '27歳';
        }
        if ($data == 28) {
            $age = '28歳';
        }
        if ($data == 29) {
            $age = '29歳';
        }
        if ($data == 30) {
            $age = '30歳';
        }
        if ($data == 31) {
            $age = '31歳';
        }
        if ($data == 32) {
            $age = '32歳';
        }
        if ($data == 33) {
            $age = '33歳';
        }
        if ($data == 34) {
            $age = '34歳';
        }
        if ($data == 35) {
            $age = '35歳';
        }
        if ($data == 36) {
            $age = '36歳';
        }
        if ($data == 37) {
            $age = '37歳';
        }
        if ($data == 38) {
            $age = '38歳';
        }
        if ($data == 39) {
            $age = '39歳';
        }
        if ($data == 40) {
            $age = '40歳';
        }
        if ($data == 41) {
            $age = '41歳';
        }
        if ($data == 42) {
            $age = '42歳';
        }
        if ($data == 43) {
            $age = '43歳';
        }
        if ($data == 44) {
            $age = '44歳';
        }
        if ($data == 45) {
            $age = '45歳';
        }
        if ($data == 46) {
            $age = '46歳';
        }
        if ($data == 47) {
            $age = '47歳';
        }
        if ($data == 48) {
            $age = '48歳';
        }
        if ($data == 49) {
            $age = '49歳';
        }
        if ($data == 50) {
            $age = '50歳';
        }
        if ($data == 51) {
            $age = '51歳';
        }
        if ($data == 52) {
            $age = '52歳';
        }
        if ($data == 53) {
            $age = '53歳';
        }
        if ($data == 54) {
            $age = '54歳';
        }
        if ($data == 55) {
            $age = '55歳';
        }
        if ($data == 56) {
            $age = '56歳';
        }
        if ($data == 57) {
            $age = '57歳';
        }
        if ($data == 58) {
            $age = '58歳';
        }
        if ($data == 59) {
            $age = '59歳';
        }
        if ($data == 60) {
            $age = '60歳';
        }
        if ($data == 61) {
            $age = '61歳';
        }
        if ($data == 62) {
            $age = '62歳';
        }
        if ($data == 63) {
            $age = '63歳';
        }
        if ($data == 64) {
            $age = '64歳';
        }
        if ($data == 65) {
            $age = '65歳';
        }
        if ($data == 66) {
            $age = '66歳';
        }
        if ($data == 67) {
            $age = '67歳';
        }
        if ($data == 68) {
            $age = '68歳';
        }
        if ($data == 69) {
            $age = '69歳';
        }
        if ($data == 70) {
            $age = '70歳';
        }

        return $age;
    }

    public static function prefecture($data)
    {
        $prefecture = self::prefectureOptions()[$data] ?? '';

        return $prefecture;
    }

    public static function wage_type($data)
    {
        $wage_type = self::wageTypeOptions()[$data] ?? '';

        return $wage_type;
    }

    public static function age_limit($data)
    {
        $age_limit = self::ageLimitOptions()[$data] ?? '';

        return $age_limit;
    }

    public static function recruitment_status($data)
    {
        $recruitment_status = self::recruitmentStatusOptions()[$data] ?? '';

        return $recruitment_status;
    }

    public static function public_status($data)
    {
        $public_status = self::publicStatusOptions()[$data] ?? '';

        return $public_status;
    }

    public static function license($data)
    {
        $license = self::licenseOptions()[$data] ?? '';

        return $license;
    }

    public static function experience($data)
    {
        $experience = self::experienceOptions()[$data] ?? '';

        return $experience;
    }

    public static function status($data)
    {
        $status = self::statusOptions()[$data] ?? '';

        return $status;
    }

    public static function current_job($data)
    {
        $current_job = '';

        if ($data == 1) {
            $current_job = '公務員';
        }
        if ($data == 2) {
            $current_job = '経営者・役員';
        }
        if ($data == 3) {
            $current_job = '会社員';
        }
        if ($data == 4) {
            $current_job = '自営業';
        }
        if ($data == 5) {
            $current_job = '専業主婦';
        }
        if ($data == 6) {
            $current_job = 'パート・アルバイト';
        }
        if ($data == 7) {
            $current_job = '学生';
        }
        if ($data == 8) {
            $current_job = 'その他';
        }

        return $current_job;
    }
}
