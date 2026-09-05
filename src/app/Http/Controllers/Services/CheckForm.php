<?php

namespace App\Http\Controllers\Services;


class CheckForm
{
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
        $prefecture = '';

        if ($data == 1) {
            $prefecture = '北海道';
        }
        if ($data == 2) {
            $prefecture = '青森県';
        }
        if ($data == 3) {
            $prefecture = '岩手県';
        }
        if ($data == 4) {
            $prefecture = '宮城県';
        }
        if ($data == 5) {
            $prefecture = '秋田県';
        }
        if ($data == 6) {
            $prefecture = '山形県';
        }
        if ($data == 7) {
            $prefecture = '福島県';
        }
        if ($data == 8) {
            $prefecture = '茨城県';
        }
        if ($data == 9) {
            $prefecture = '栃木県';
        }
        if ($data == 10) {
            $prefecture = '群馬県';
        }
        if ($data == 11) {
            $prefecture = '埼玉県';
        }
        if ($data == 12) {
            $prefecture = '千葉県';
        }
        if ($data == 13) {
            $prefecture = '東京都';
        }
        if ($data == 14) {
            $prefecture = '神奈川';
        }
        if ($data == 15) {
            $prefecture = '新潟県';
        }
        if ($data == 16) {
            $prefecture = '富山県';
        }
        if ($data == 17) {
            $prefecture = '石川県';
        }
        if ($data == 18) {
            $prefecture = '福井県';
        }
        if ($data == 19) {
            $prefecture = '山梨県';
        }
        if ($data == 20) {
            $prefecture = '長野県';
        }
        if ($data == 21) {
            $prefecture = '岐阜県';
        }
        if ($data == 22) {
            $prefecture = '静岡県';
        }
        if ($data == 23) {
            $prefecture = '愛知県';
        }
        if ($data == 24) {
            $prefecture = '三重県';
        }
        if ($data == 25) {
            $prefecture = '滋賀県';
        }
        if ($data == 26) {
            $prefecture = '京都府';
        }
        if ($data == 27) {
            $prefecture = '大阪府';
        }
        if ($data == 28) {
            $prefecture = '兵庫県';
        }
        if ($data == 29) {
            $prefecture = '奈良県';
        }
        if ($data == 30) {
            $prefecture = '和歌山';
        }
        if ($data == 31) {
            $prefecture = '鳥取県';
        }
        if ($data == 32) {
            $prefecture = '島根県';
        }
        if ($data == 33) {
            $prefecture = '岡山県';
        }
        if ($data == 34) {
            $prefecture = '広島県';
        }
        if ($data == 35) {
            $prefecture = '山口県';
        }
        if ($data == 36) {
            $prefecture = '徳島県';
        }
        if ($data == 37) {
            $prefecture = '香川県';
        }
        if ($data == 38) {
            $prefecture = '愛媛県';
        }
        if ($data == 39) {
            $prefecture = '高知県';
        }
        if ($data == 40) {
            $prefecture = '福岡県';
        }
        if ($data == 41) {
            $prefecture = '佐賀県';
        }
        if ($data == 42) {
            $prefecture = '長崎県';
        }
        if ($data == 43) {
            $prefecture = '熊本県';
        }
        if ($data == 44) {
            $prefecture = '大分県';
        }
        if ($data == 45) {
            $prefecture = '宮崎県';
        }
        if ($data == 46) {
            $prefecture = '鹿児島';
        }
        if ($data == 47) {
            $prefecture = '沖縄県';
        }

        return $prefecture;
    }

    public static function wage_type($data)
    {
        $wage_type = '';
        if ($data == 0) {
            $wage_type = '月給';
        }
        if ($data == 1) {
            $wage_type = '時給';
        }

        return $wage_type;
    }

    public static function age_limit($data)
    {
        $age_limit = '';

        if ($data == 1) {
            $age_limit = '~19歳';
        }
        if ($data == 2) {
            $age_limit = '20歳~29歳';
        }
        if ($data == 3) {
            $age_limit = '30歳~39歳';
        }
        if ($data == 4) {
            $age_limit = '40歳~';
        }
        if ($data == 4) {
            $age_limit = '年齢制限なし';
        }

        return $age_limit;
    }

    public static function license($data)
    {
        $license = '';

        if ($data == 1) {
            $license = 'AT';
        }
        if ($data == 2) {
            $license = 'MT';
        }
        if ($data == 3) {
            $license = '不問';
        }

        return $license;
    }

    public static function experience($data)
    {
        $experience = '';

        if ($data == 1) {
            $experience = '経験者';
        }
        if ($data == 2) {
            $experience = '未経験者歓迎';
        }

        return $experience;
    }

    public static function status($data)
    {
        $status = '';

        if ($data == 1) {
            $status = '正社員';
        }
        if ($data == 2) {
            $status = '派遣';
        }
        if ($data == 3) {
            $status = 'アルバイト';
        }

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
