<div class="container searchPage">

<ul class="schoolPage">
	<?php if(@$guides): ?>
		<li>
			<?php if($show_cnt == 50)
				$page_cnt = 30;
			else
				$page_cnt = 10;
			$total_page = ceil($total_cnt/$show_cnt); ?>
			<ul class="Pagination">
				<li class="Pagination-Item">
					<a class="Pagination-Item-Link" href="#" onclick="changePage(0);">
						<svg xmlns="http://www.w3.org/2000/svg" class="Pagination-Item-Link-Icon" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
							<path stroke-linecap="round" stroke-linejoin="round" d="M11 19l-7-7 7-7m8 14l-7-7 7-7" />
						</svg>
					</a>
				</li>
				<div class="Paging" id="paging_top">
					<div>
						<?php for($d = 0; $d < $total_page; $d++): ?>
							<div><a class="Pagination-Item-Link<?php if($page_info['page'] == $d): ?> isActive<?php endif; ?>" href="#" onclick="changePage(<?= ($d) ?>);"><span><?= ($d+1) ?></span></a></div>
						<?php endfor; ?>
					</div>
				</div>
				<li class="Pagination-Item">
					<a class="Pagination-Item-Link" href="#" onclick="changePage(<?= $page ?>);">
						<svg xmlns="http://www.w3.org/2000/svg" class="Pagination-Item-Link-Icon" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
							<path stroke-linecap="round" stroke-linejoin="round" d="M13 5l7 7-7 7M5 5l7 7-7 7" />
						</svg>
					</a>
				</li>
			</ul>
			<br>
		</li>
	
		<?php foreach($datas as $detail):
				$row = $detail['id']; ?>
		<li>
			<details class="school">
				<summary class="scHead">
					<div class="kubun">
						<?php
							if($detail['distinct']  == '大学') echo('<img src="'.$path.'images/icon_daigaku.svg" alt="大学">');
							if($detail['distinct']  == '省庁大学校') echo('<img src="'.$path.'images/icon_daigakkou.svg" alt="省庁大学校">');
							if($detail['distinct']  == '短期大学') echo('<img src="'.$path.'images/icon_tandai.svg" alt="短大">');
							if($detail['distinct']  == '専門学校他') echo('<img src="'.$path.'images/icon_senmon.svg" alt="専門学校他">');
							if($detail['distinct']  == '専門職大学') echo('<img src="'.$path.'images/icon_senmonshokudaigaku.svg" alt="専門職大学">');
						?>
					</div>
					<h3><?= $detail['school_name'] ?></h3>
					<?php if(@$detail['ad_url'] && trim($detail['ad_url']) != ''): ?>
						<button><a href="<?= $detail['ad_url'] ?>" data-gtm-click="ishin_school" target="_new">学校ページへ<?php if(strstr($detail['ad_url'], 'smt.ishin')): ?>（スマートフォンのみ）<?php endif; ?></a></button>
					<?php endif; ?>
				</summary>
				<?php foreach($guides[$row] as $line): ?>
				<details class="schoolInnerFaculty">
					<summary class="department">
					  <h4><?= str_replace(';', '、', $line['field']) ?></h4>
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
									$payment .= ($line['first_payment_s'] == 0) ? '-': number_format($line['first_payment_s']).'円';
								else:
									$payment .= number_format($line['first_payment_s']).'円～'.number_format($line['first_payment_e']).'円';
								endif; ?>
								<span class="fixed"><?= $payment ?></span>
							</p>
						</li>
						<li>
							<p class="fac01">卒業までの納入金</p>
							<p class="fac02">
								<?php $payment = (@$line['total_str']) ? $line['total_str'].' ': '';
								if($line['total_payment_s'] == $line['total_payment_e']):
									$payment .= ($line['total_payment_s'] == 0) ? '-': number_format($line['total_payment_s']).'円';
								else:
									$payment .= number_format($line['total_payment_s']).'円～'.number_format($line['total_payment_e']).'円';
								endif; ?>
								<span class="fixed"><?= $payment ?></span>
							</p>
						</li>
						<li class="caution_about_fee">※その他「諸経費」がかかる場合があります</li>
						<?php
							$entrance_outline = '';
							$outline = explode(';', $line['entrance_outline']);
							foreach($outline as $o_row):
								if($o_row == '総合型選抜/AO入試あり') $entrance_outline[] = 'icon_ao.svg:'.$o_row;
								if($o_row == '学校推薦型選抜/公募推薦入試あり') $entrance_outline[] = 'icon_gakkousuisen.svg:'.$o_row;
								if($o_row == '指定校推薦あり') $entrance_outline[] = 'icon_shiteikousuisen.svg:'.$o_row;
								if($o_row == 'スポーツ推薦あり') $entrance_outline[] = 'icon_sports.svg:'.$o_row;
								if($o_row == 'その他（地域指定など）の推薦あり') $entrance_outline[] = 'icon_sonotasuisen.svg:'.$o_row;
								if($o_row == '一般選抜/一般入試あり') $entrance_outline[] = 'icon_ippan.svg:'.$o_row;
								if($o_row == '大学入学共通テスト利用入試あり（公募推薦）') $entrance_outline[] = 'icon_kyoutsuukoubo.svg:'.$o_row;
								if($o_row == '大学入学共通テスト利用入試あり（一般）') $entrance_outline[] = 'icon_kyoutsuuippan.svg:'.$o_row;
								if($o_row == '社会人入試あり') $entrance_outline[] = 'icon_shakaijin.svg:'.$o_row;
								if($o_row == '特待生入試あり') $entrance_outline[] = 'icon_tokutaisei.svg:'.$o_row;
								if($o_row == 'オープンキャンパス等の進路イベント参加必須') $entrance_outline[] = 'icon_event.svg:'.$o_row;
							endforeach;
						?>
						<?php if(@$entrance_outline): ?>
							<li>
								<p>入試概要</p>
								<?php 
								foreach($entrance_outline as $o_row):
									list($svg, $name) = explode(':', $o_row);
									echo('<img src="'.$path.'images/'.$svg.'" alt="'.$name.'">');
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
								<?php foreach($publicys[$row] as $t_row):
										foreach($t_row as $t_key=>$test):
											if($test['ct_id'] != $line['ct_id']) continue;
	
											if($test['title'] == '※詳細は学校にお問い合わせください'): ?>
												<tr><th><?= $test['title'] ?></td></tr>
											<?php else:
												if($t_key == 0): ?>
													<tr><th></th><th>出願期間</th><th>試験日</th></tr>
												<?php endif;
													$ex_str = explode(' ', $test['title']);
													$examin = $ex_str[0];
													if(@$ex_str[1]) $examin .= ' 出願期間：'.$ex_str[1];
													if(@$ex_str[2]) $examin .= ' 試験日：'.$ex_str[2];
													?>
													<tr><th><?= $ex_str[0] ?></th><td><?= @$ex_str[1] ?></td><td><?= @$ex_str[2] ?></td></tr>
										<?php endif;
										endforeach;
									endforeach; ?>
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
										if($s_row  == '学科試験（英）') $subject .= '<img src="'.$path.'images/icon_eigo.svg" alt="英語">';
										if($s_row  == '学科試験（数）') $subject .= '<img src="'.$path.'images/icon_suugaku.svg" alt="数学">';
										if($s_row  == '学科試験（理）') $subject .= '<img src="'.$path.'images/icon_rika.svg" alt="理科">';
										if($s_row  == '学科試験（その他）') $subject .= '<img src="'.$path.'images/icon_sonotagakka.svg" alt="学科その他">';
										if($s_row  == 'その他') $subject .= '<img src="'.$path.'images/icon_gakkasonota.svg" alt="その他の試験">';
										if($s_row  == '面接（口頭試問を含む）') $subject .= '<img src="'.$path.'images/icon_mensetsu.svg" alt="小論文">';
										if($s_row  == '小論文（作文を含む）') $subject .= '<img src="'.$path.'images/icon_shouronbun.svg" alt="面接">';
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
									<?php if(@$line['average'] && $line['average'] != '-'): ?><p class="average">学習成績：<?= $line['average'] ?></p><?php endif; ?>
									<?php
										$term = '';
										$term_examin = explode(';', $line['term_publicy']);
										foreach($term_examin as $t_row):
											if($t_row  == '専願のみ') $term .= '<img src="'.$path.'images/icon_sengan.svg" alt="専願のみ">';
											if($t_row  == '併願可') $term .= '<img src="'.$path.'images/icon_heigan.svg" alt="併願可">';
											if($t_row  == '現役生のみ') $term .= '<img src="'.$path.'images/icon_geneki.svg" alt="現役生のみ">';
											if($t_row  == '浪人可') $term .= '<img src="'.$path.'images/icon_rounin.svg" alt="浪人可">';
											if($t_row  == '進学イベント参加必須') $term .= '<img src="'.$path.'images/icon_event.svg" alt="進学イベント参加必須">';
											if($t_row  == 'オープンキャンパス等の進路イベント参加必須') $term .= '<img src="'.$path.'images/icon_event.svg" alt="オープンキャンパス等の進路イベント参加必須">';
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
								<?php foreach($generals[$row] as $t_row):
										foreach($t_row as $t_key=>$test):
											if($test['ct_id'] != $line['ct_id']) continue;
	
											if($test['title'] == '※詳細は学校にお問い合わせください'): ?>
												<tr><th><?= $test['title'] ?></td></tr>
											<?php else:
												if($t_key == 0): ?>
													<tr><th></th><th>出願期間</th><th>試験日</th></tr>
												<?php endif;
													$ex_str = explode(' ', $test['title']);
													$examin = $ex_str[0];
													if(@$ex_str[1]) $examin .= ' 出願期間：'.$ex_str[1];
													if(@$ex_str[2]) $examin .= ' 試験日：'.$ex_str[2];
													?>
													<tr><th><?= $ex_str[0] ?></th><td><?= @$ex_str[1] ?></td><td><?= @$ex_str[2] ?></td></tr>
										<?php endif;
										endforeach;
									endforeach; ?>
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
										if($s_row  == '学科試験（その他）') $subject .= '<img src="'.$path.'images/icon_sonotagakka.svg" alt="学科その他">';
										if($s_row  == 'その他') $subject .= '<img src="'.$path.'images/icon_gakkasonota.svg" alt="その他の試験">';
										if($s_row  == '面接（口頭試問を含む）') $subject .= '<img src="'.$path.'images/icon_mensetsu.svg" alt="小論文">';
										if($s_row  == '小論文（作文を含む）') $subject .= '<img src="'.$path.'images/icon_shouronbun.svg" alt="面接">';
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
						<div class="info">
							<dl>
								<dt>〒</dt>
								<dd class="zipcode"><?= $detail['zip'] ?></dd>
								<dt>住所</dt>
								<dd class="address"><?= $detail['pref'].$detail['city'].$detail['town'].$detail['build'] ?></dd>
								<dt><i class="fa fa-solid fa-phone"></i></dt>
								<dd class="phone"><?= $detail['tel'] ?></dd>
								<dt><i class="fa fa-solid fa-envelope"></i></dt>
								<dd class="email"><?= $detail['mail'] ?></dd>
								<dt>アクセス</dt>
								<dd class="access"><?= $detail['transport'] ?></dd>
								<dt>開校年</dt>
								<dd class="openingyear"><?= $detail['open_school'] ?><span>年</span></dd>
								<dt>学生寮</dt>
								<dd class="domitory">
									<?php $dormitory = '';
									if($detail['dormitory'] == 'あり') $dormitory = '学生寮あり';
									elseif($detail['dormitory'] == 'あり（女子のみ）') $dormitory = '女子寮あり';
									elseif($detail['dormitory'] == 'あり（男子のみ）') $dormitory = '男子寮あり';
									elseif($detail['dormitory'] == 'あり（提携先学生寮）') $dormitory = '提携先学生寮あり';
									else $dormitory = $detail['dormitory'];
									echo($dormitory); ?>
								</dd>
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
								$lat = @$json[0]->geometry->coordinates[0];
								$lon = @$json[0]->geometry->coordinates[1];
							?>
							<div id="map<?= $row ?>" class="map" data-lat="<?= $lat ?>" data-lon="<?= $lon ?>" data-name="<?= $detail['school_name'] ?>" data-addr="<?= $post ?>"></div>
						</div>
					</div>
				</details>
			</details>
		</li>
		<?php //endforeach;
		endforeach; ?>
	
		<li>
			<?php if($show_cnt == 50)
				$page_cnt = 30;
			else
				$page_cnt = 10;
			$total_page = ceil($total_cnt/$show_cnt); ?>
			<ul class="Pagination">
				<li class="Pagination-Item">
					<a class="Pagination-Item-Link" href="#" onclick="changePage(0);">
						<svg xmlns="http://www.w3.org/2000/svg" class="Pagination-Item-Link-Icon" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
							<path stroke-linecap="round" stroke-linejoin="round" d="M11 19l-7-7 7-7m8 14l-7-7 7-7" />
						</svg>
					</a>
				</li>
				<div class="Paging">
					<div>
						<?php for($d = 0; $d < $total_page; $d++): ?>
							<div><a class="Pagination-Item-Link<?php if($page_info['page'] == $d): ?> isActive<?php endif; ?>" href="#" onclick="changePage(<?= ($d) ?>);"><span><?= ($d+1) ?></span></a></div>
						<?php endfor; ?>
					</div>
				</div>
				<li class="Pagination-Item">
					<a class="Pagination-Item-Link" href="#" onclick="changePage(<?= $page ?>);">
						<svg xmlns="http://www.w3.org/2000/svg" class="Pagination-Item-Link-Icon" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
							<path stroke-linecap="round" stroke-linejoin="round" d="M13 5l7 7-7 7M5 5l7 7-7 7" />
						</svg>
					</a>
				</li>
			</ul>
		</li>
	<?php else: ?>
		<li>
			お探しの学校データはありません。
		</li>
	<?php endif; ?>
</ul>

<form method="POST" action="search" id="pageForm" style="display:none;">
    <input type="hidden" name="page" id="page_id" value="<?= $page_info['page'] ?>">
    <input type="hidden" name="keyword" value="<?= $page_info['keyword'] ?>">
    <input type="hidden" name="distinct" value="<?= $page_info['distinct'] ?>">
    <input type="hidden" name="pref" value="<?= $page_info['pref'] ?>">
    <input type="hidden" name="dormitory" value="<?= $page_info['dormitory'] ?>">
    <input type="hidden" name="category" value="<?= $page_info['category'] ?>">
    <input type="hidden" name="first_payment" value="<?= $page_info['first_payment'] ?>">
    <input type="hidden" name="entrance_subject" value="<?= $page_info['entrance_subject'] ?>">
    <input type="hidden" name="entrance_outline" value="<?= $page_info['entrance_outline'] ?>">
    <input type="hidden" name="term_from" value="<?= $page_info['term_from'] ?>">
    <input type="hidden" name="term_end" value="<?= $page_info['term_end'] ?>">
</form>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAOEMd3TbTH_LcMjMH7BggYQJdTlWSNsU8&language=ja&region=JP"></script>
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

$('div#paging_top').animate({scrollLeft:150});

function changePage(page){
	$("body, html").scrollTop(0);
	$('.loading').css('display', 'block');

    $('#page_id').val(page);
    $('#pageForm').submit();
    return false;
}

//-->
</script>
