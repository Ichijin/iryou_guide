<div class="container searchPage">
<ul class="schoolPage">
    <?php foreach($mt_ids as $row):
        foreach($datas as $detail):
            if(@$detail['id'] != $row) continue; ?>
	<li>
		<details class="school">
			<summary class="scHead">
				<div class="kubun">
					<?php
						if($detail['distinct']  == '大学') echo('<img src="'.$path.'images/icon_daigaku.svg" alt="大学">');
						if($detail['distinct']  == '大学校') echo('<img src="'.$path.'images/icon_daigakkou.svg" alt="大学校">');
						if($detail['distinct']  == '短期大学') echo('<img src="'.$path.'images/icon_tandai.svg" alt="短大">');
						if($detail['distinct']  == '専門学校') echo('<img src="'.$path.'images/icon_senmon.svg" alt="専門学校">');
						if($detail['distinct']  == '専門職大学') echo('<img src="'.$path.'images/icon_senmonshokudaigaku.svg" alt="専門職大学">');
					?>
				</div>
				<h3><?= $detail['school_name'] ?></h3>
				<button><a href="#" data-gtm-click="ishin_school">学校ページへ</a></button>
			</summary>
			<?php foreach($guides[$row] as $line): ?>
			<details class="schoolInnerFaculty">
				<summary class="department">
				  <h4><?= $line['category'] ?></h4>
				</summary>
				<ul class="faculty">
					<li>
						<p class="fac01">学部・学科・コース/年限/定員</p>
						<p class="fac02"><?= $line['course'] ?></p>
					</li>
					<li>
						<p class="fac01">主な就職先</p>
						<p class="fac02">
						<?php
							$employment = '';
							if(@$line['employment']):
								$employment = $line['employment'];
								if($line['employment'] != '-') $employment .= '<span>他</span>';
							endif;
							echo($employment); ?>
						</p>
					</li>
					<li>
						<p class="fac01">初年度納入金</p>
						<p class="fac02">
							<?php $payment = (@$line['first_str']) ? $line['first_str'].' ': '';
							if($line['first_payment_s'] == $line['first_payment_e']):
								$payment .= number_format($line['first_payment_s']);
							else:
								$payment .= number_format($line['first_payment_s']).'～'.number_format($line['first_payment_e']);
							endif; ?>
							<span class="fixed"><?= $payment ?>円</span>
						</p>
					</li>
					<li>
						<p class="fac01">卒業までの納入金</p>
						<p class="fac02">
							<?php $payment = (@$line['first_str']) ? $line['first_str'].' ': '';
							if($line['total_payment_s'] == $line['total_payment_e']):
								$payment .= number_format($line['total_payment_s']);
							else:
								$payment .= number_format($line['total_payment_s']).'～'.number_format($line['total_payment_e']);
							endif; ?>
							<span class="fixed"><?= $payment ?>円</span>
						</p>
					</li>
					<li class="caution_about_fee">※その他「諸経費」がかかる場合があります</li>
					<?php
						$entrance_outline = '';
						$outline = explode(';', $line['entrance_outline']);
						foreach($outline as $o_row):
							if($o_row == '総合型選抜/AO入試あり') $entrance_outline[] = 'icon_ao.svg';
							if($o_row == '学校推薦型選抜/公募推薦入試あり') $entrance_outline[] = 'icon_gakkousuisen.svg';
							if($o_row == '指定校推薦あり') $entrance_outline[] = 'icon_shiteikousuisen.svg';
							if($o_row == 'スポーツ推薦あり') $entrance_outline[] = 'icon_sports.svg';
							if($o_row == 'その他（地域指定など）の推薦あり') $entrance_outline[] = 'icon_sonotasuisen.svg';
							if($o_row == '一般選抜/一般入試あり') $entrance_outline[] = 'icon_ippan.svg';
							if($o_row == '大学入学共通テスト利用（公募推薦）') $entrance_outline[] = 'icon_kyoutsuukoubo.svg';
							if($o_row == '大学入学共通テスト利用（一般）') $entrance_outline[] = 'icon_kyoutsuuippan.svg';
							if($o_row == '社会人入試あり') $entrance_outline[] = 'icon_shakaijin.svg';
							if($o_row == '特待生入試あり') $entrance_outline[] = 'icon_tokutaisei.svg';
						endforeach;
					?>
					<?php if(@$entrance_outline): ?>
						<li>
							<p>入試概要</p>
							<?php 
							foreach($entrance_outline as $o_row):
								echo('<img src="'.$path.'images/'.$o_row.'" alt="'.$o_row.'">');
							endforeach;
							?>
						</li>
					<?php endif; ?>
				</ul>
				<details class="schoolInnerApplication">
					<summary class="testway">公募</summary>
					<ul class="application_inner">
						<li>
							<p class="heading">入試日程</p>
							<table>
								<tr><th></th><th>出願期間</th><th>試験日</th></tr>
								<?php foreach($publicys[$row] as $test){
									$ex_str = explode(' ', $test['title']);
									$examin = $ex_str[0];
									if(@$ex_str[1]) $examin .= ' 出願期間：'.$ex_str[1];
									if(@$ex_str[2]) $examin .= ' 試験日：'.$ex_str[2];
									?>
									<tr><th><?= $ex_str[0] ?></th><td><?= @$ex_str[1] ?></td><td><?= @$ex_str[2] ?></td></tr>
								<?php } ?>
								</tr>
							</table>
						</li>
						<li>
							<p class="heading">試験科目</p>
							<div class="detail">
							<?php
								$subject = '';
								$subject_examin = explode(';', $line['subject_publicy']);
								foreach($subject_examin as $s_row):
									if($s_row  == '学科試験（国）') $subject .= '<img src="'.$path.'images/icon_kokugo.svg" alt="国語">';
									if($s_row  == '学科試験（英）') $subject .= '<img src="'.$path.'images/icon_suugaku.svg" alt="数学">';
									if($s_row  == '学科試験（数）') $subject .= '<img src="'.$path.'images/icon_eigo.svg" alt="英語">';
									if($s_row  == '学科試験（理）') $subject .= '<img src="'.$path.'images/icon_rika.svg" alt="理科">';
									if($s_row  == 'その他') $subject .= '<img src="'.$path.'images/icon_gakkasonota.svg" alt="学科その他">';
									if($s_row  == '面接（口頭試問を含む）') $subject .= '<img src="'.$path.'images/icon_mensetsu.svg" alt="面接">';
									if($s_row  == '小論文') $subject .= '<img src="'.$path.'images/icon_shouronbun.svg" alt="小論文">';
									if($s_row  == 'プレゼンテーション') $subject .= '<img src="'.$path.'images/icon_presen.svg" alt="プレゼン">';
									if($s_row  == '書類選考') $subject .= '<img src="'.$path.'images/icon_shoruisenkou.svg" alt="書類選考">';
								endforeach;
								echo($subject);
							?>
							</div>
						</li>
						<li>
							<p class="heading">出願条件</p>
							<div class="detail">
								<?php if(@$line['average'] && $line['average'] != '-'): ?><p class="average">学習成績:<?= $line['average'] ?></p><?php endif; ?>
								<?php
									$term = '';
									$term_examin = explode(';', $line['term_publicy']);
									foreach($term_examin as $t_row):
										if($t_row  == '専願のみ') $term .= '<img src="'.$path.'images/icon_sengan.svg" alt="専願のみ">';
										if($t_row  == '併願可') $term .= '<img src="'.$path.'images/icon_heigan.svg" alt="併願可">';
										if($t_row  == '現役生のみ') $term .= '<img src="'.$path.'images/icon_geneki.svg" alt="現役生のみ">';
										if($t_row  == '浪人可') $term .= '<img src="'.$path.'images/icon_rounin.svg" alt="浪人可">';
										if($t_row  == '進学イベント参加必須') $term .= '<img src="'.$path.'images/icon_event.svg" alt="進学イベント参加必須">';
										if($t_row  == 'その他') $term .= '<img src="'.$path.'images/icon_sonota.svg" alt="その他">';
									endforeach;
									echo($term);
								?>
							</div>
						</li>
					</ul>
				</details>
				<details class="schoolInnerApplication">
					<summary class="testway">一般</summary>
					<ul class="application_inner">
						<li>
							<p class="heading">入試日程</p>
							<table>
								<tr><th></th><th>出願期間</th><th>試験日</th></tr>
								<?php foreach($generals[$row] as $test){
									$ex_str = explode(' ', $test['title']);
									$examin = $ex_str[0];
									if(@$ex_str[1]) $examin .= ' 出願期間：'.$ex_str[1];
									if(@$ex_str[2]) $examin .= ' 試験日：'.$ex_str[2]; ?>
									<tr><th><?= $ex_str[0] ?></th><td><?= @$ex_str[1] ?></td><td><?= @$ex_str[2] ?></td></tr>
								<?php } ?>
							</table>
						</li>
						<li>
							<p class="heading">試験科目</p>
							<div class="detail">
							<?php
								$subject = '';
								$subject_examin = explode(';', $line['subject_general']);
								foreach($subject_examin as $s_row):
									if($s_row  == '学科試験（国）') $subject .= '<img src="'.$path.'images/icon_kokugo.svg" alt="国語">';
									if($s_row  == '学科試験（英）') $subject .= '<img src="'.$path.'images/icon_eigo.svg" alt="英語">';
									if($s_row  == '学科試験（数）') $subject .= '<img src="'.$path.'images/icon_suugaku.svg" alt="数学">';
									if($s_row  == '学科試験（理）') $subject .= '<img src="'.$path.'images/icon_rika.svg" alt="理科">';
									if($s_row  == 'その他') $subject .= '<img src="'.$path.'images/icon_gakkasonota.svg" alt="学科その他">';
									if($s_row  == '面接（口頭試問を含む）') $subject .= '<img src="'.$path.'images/icon_shouronbun.svg" alt="小論文">';
									if($s_row  == '小論文') $subject .= '<img src="'.$path.'images/icon_mensetsu.svg" alt="面接">';
									if($s_row  == 'プレゼンテーション') $subject .= '<img src="'.$path.'images/icon_presen.svg" alt="プレゼン">';
									if($s_row  == '書類選考') $subject .= '<img src="'.$path.'images/icon_shoruisenkou.svg" alt="書類選考">';
								endforeach;
								echo($subject);
							?>
							</div>
						</li>
					</ul>
				</details>
			</details>
			<?php endforeach; ?>
			<!--学校基本情報-->
			<details class="basis">
				<summary class="basisHeader">学校基本情報</summary>
				<div class="basis_inner">
					<h5> <span class="pref"><?= $detail['pref'] ?></span> <span class="schoolname"> 
					<!--<a href="https://sanpou-s.net" data-gtm-click="url_school" target="_blank">--> 
					<?= $detail['school_name'] ?>
					<!--</a>--></span> 
					</h5>
					<div class="info">
						<dl>
							<dt>〒</dt>
							<dd class="zipcode"><?= $detail['zip'] ?></dd>
							<dt>住所</dt>
							<dd class="address"><?= $detail['pref'].$detail['city'].$detail['town'].$detail['build'] ?></dd>
							<dt><img src="https://www.ishin.jp/iryou_guide/images/icon_envelope.svg" alt="email"></dt>
							<dd class="phone"><?= $detail['tel'] ?></dd>
							<dt><img src="https://www.ishin.jp/iryou_guide/images/icon_phone.svg" alt="phone"></dt>
							<dd class="email"><?= $detail['mail'] ?></dd>
							<dt>アクセス</dt>
							<dd class="access"><?= $detail['transport'] ?></dd>
							<dt>開校年</dt>
							<dd class="openingyear"><?= $detail['open_school'] ?><span>年</span></dd>
							<dt>学生寮</dt>
							<dd class="domitory"><?= $detail['dormitory'] ?></dd>
							<dt class="pamphlet_dt">学校案内</dt>
							<dd class="pamphlet_dd"><?= $detail['pamph'] ?></dd>
							<dt class="application_dt">願書</dt>
							<dd class="application_dd"><?= $detail['application'] ?></dd>
							<dt>WEB出願</dt>
							<dd class="web_app"><?= $detail['web_application'] ?></dd>
						</dl>
						<?php
							$post = $detail['pref'].$detail['city'].$detail['town'];	//.$detail['build'];
							$apiurl = "https://msearch.gsi.go.jp/address-search/AddressSearch?q=";
							$json = json_decode(@file_get_contents($apiurl.$post), false);
							$lat = $json[0]->geometry->coordinates[0];
							$lon = $json[0]->geometry->coordinates[1];
						?>
						<div id="map<?= $row ?>" class="map" data-lat="<?= $lat ?>" data-lon="<?= $lon ?>" data-name="<?= $detail['school_name'] ?>" data-addr="<?= $post ?>"></div>
					</div>
				</div>
			</details>
		</details>
	</li>
    <?php endforeach;
    endforeach; ?>
</ul>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCYll1TfI-zcT66fJLdXr4_YW7HlcWfQII&language=ja&region=JP"></script>
<script type="text/javascript">
<!-- 
$.each($(".map"), function(i, val) {
    //console.log(i + ': ' + $(this).attr('id') + ': ' + $(this).data('lat')+ ': ' + $(this).data('lon')+ ': ' + $(this).data('name')+ ': ' + $(this).data('addr'));
	mapinit($(this).attr('id'), $(this).data('lat'), $(this).data('lon'), $(this).data('name'), $(this).data('addr'));
});

function mapinit(id, lat, lon, name, addr) {
  var latlng = new google.maps.LatLng(lon,lat);
  var opts = {
    zoom: 16,
    center: latlng,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  };
  var map = new google.maps.Map(document.getElementById(id), opts);

  var infowindow = new google.maps.InfoWindow({
    content: name+"<br>"+addr,
    position: latlng
  });
  infowindow.open(map);
}
//-->
</script>
