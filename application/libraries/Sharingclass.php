<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sharingclass {

    public function pref_info()
    {
		return array(
            array(91, '北海道・東北'),
            array(1, '北海道'),
            array(2, '青森県'),
            array(3, '岩手県'),
            array(4, '宮城県'),
            array(5, '秋田県'),
            array(6, '山形県'),
            array(7, '福島県'),
            array(92, '関東'),
            array(8, '茨城県'),
            array(9, '栃木県'),
            array(10, '群馬県'),
            array(11, '埼玉県'),
            array(12, '千葉県'),
            array(13, '東京都'),
            array(14, '神奈川県'),
            array(93, '甲信越'),
            array(15, '新潟県'),
            array(16, '山梨県'),
            array(17, '長野県'),
            array(94, '東海'),
            array(18, '静岡県'),
            array(19, '愛知県'),
            array(20, '岐阜県'),
            array(21, '三重県'),
            array(95, '北陸'),
            array(22, '富山県'),
            array(23, '石川県'),
            array(24, '福井県'),
            array(96, '近畿'),
            array(25, '滋賀県'),
            array(26, '京都府'),
            array(27, '大阪府'),
            array(28, '兵庫県'),
            array(29, '奈良県'),
            array(30, '和歌山県'),
            array(97, '中国・四国'),
            array(31, '鳥取県'),
            array(32, '島根県'),
            array(33, '岡山県'),
            array(34, '広島県'),
            array(35, '山口県'),
            array(36, '徳島県'),
            array(37, '香川県'),
            array(38, '愛媛県'),
            array(39, '高知県'),
            array(98, '九州・沖縄'),
            array(40, '福岡県'),
            array(41, '佐賀県'),
            array(42, '長崎県'),
            array(43, '熊本県'),
            array(44, '大分県'),
            array(45, '宮崎県'),
            array(46, '鹿児島県'),
            array(47, '沖縄県'),
		);
    }

    public function school_info()
    {
		return array(
            array(1, '大学'),
            array(2, '省庁大学校'),
            array(3, '短期大学'),
            array(4, '専門職大学'),
            array(5, '専門学校他'),
        );
    }

    public function field_info()
    {
		return array(
            array(91, '看護師'),
            array(1, '看護師'),
            array(92, '臨床検査技師・臨床工学技士・診療放射線技師'),
            array(2, '臨床検査技師'),
            array(3, '臨床工学技士'),
            array(4, '診療放射線技師'),
            array(93, '理学療法士・作業療法士・言語聴覚士'),
            array(5, '理学療法士'),
            array(6, '作業療法士'),
            array(7, '言語聴覚士'),
            array(94, '歯科衛生士・歯科技工士'),
            array(8, '歯科衛生士'),
            array(9, '歯科技工士'),
            array(95, 'はり師・きゅう師・柔道整復師・あん摩マッサージ指圧師'),
            array(10, 'はり師・きゅう師'),
            array(11, '柔道整復師'),
            array(12, 'あん摩マッサージ指圧師'),
            array(96, '視能訓練士・救急救命士・義肢装具士'),
            array(13, '視能訓練士'),
            array(14, '救急救命士'),
            array(15, '義肢装具士'),
        );
    }
}