<div class="container" id="search">
	<p class="toppage_ex"><small>2024年6月-7月の調査に基づいたデータとなります。<br class="sp">
	入試日程・内容は変更になる可能性があるため、<br class="sp">
	必ず事前に学校のHPを確認してください。</small></p>
	<h3>条件で検索する</h3>
		<div class="contents_wrap">
			<form class="drop_menu_flex" method="POST" action="pages/search">
				<div class="drop_Menu">
					<p>学校区分</p>
					<select class="select01" name="distinct">
						<option value="">すべて</option>
						<option value="大学">大学</option>
						<option value="大学校">大学校</option>
						<option value="短期大学">短大</option>
						<option value="専門学校">専門学校</option>
						<option value="専門職大学">専門職大学</option>
					</select>
				</div>
				<div class="drop_Menu">
					<p>エリア</p>
					<select class="select01" name="pref">
						<option value="">すべて</option>
						<?php $line = 0;
						foreach($pref_info as $row):
							if($row[0] == 0){
								if($line > 0) echo('</optgroup>');
								echo('<optgroup label="'.$row[1].'">');
							}
							else
								echo('<option value="'.$row[1].'">'.$row[1].'</option>');
							$line++;
						endforeach; ?>
						</optgroup>
					</select>
				</div>
				<div class="drop_Menu">
					<p>分野</p>
					<select class="select01" name="category">
						<option value="">すべて</option>
						<option value="Ａ 看護師">Ａ 看護師</option>
						<optgroup label="Ｂ 臨床検査技師・臨床工学技士・診療放射線技師">
							<option value="臨床検査技師">臨床検査技師</option>
							<option value="臨床工学技士">臨床工学技士</option>
							<option value="診療放射線技師">診療放射線技師</option>
						</optgroup>
						<optgroup label="Ｃ 理学療法士・作業療法士・言語聴覚士">
							<option value="理学療法士">理学療法士</option>
							<option value="作業療法士">作業療法士</option>
							<option value="言語聴覚士">言語聴覚士</option>
						</optgroup>
						<optgroup label="Ｄ 歯科衛生士・歯科技工士">
							<option value="歯科衛生士">歯科衛生士</option>
							<option value="歯科技工士">歯科技工士</option>
						</optgroup>
						<optgroup label="Ｅ はり師・きゅう師・柔道整復師・あん摩マッサージ指圧師">
							<option value="はり師">はり師</option>
							<option value="きゅう師">きゅう師</option>
							<option value="柔道整復師">柔道整復師</option>
							<option value="あん摩マッサージ指圧師">あん摩マッサージ指圧師</option>
						</optgroup>
						<optgroup label="Ｆ 視能訓練士・救急救命士・義肢装具士">
							<option value="視能訓練士">視能訓練士</option>
							<option value="救急救命士">救急救命士</option>
							<option value="技師装具士">技師装具士</option>
						</optgroup>
					</select>
				</div>
<!--				<div class="drop_Menu">
					<p>WEB出願制度</p>
					<select class="select01">
						<option value="web_01">あり</option>
						<option value="web_00">なし</option>
					</select>
				</div>-->
				<div class="drop_Menu">
					<p>初年度納入金</p>
					<select class="select01" name="first_payment">
						<option value="">すべて</option>
						<option value="mon_lim01">1,000,000円以下</option>
						<option value="mon_lim02">1,000,001-1,200,000円</option>
						<option value="mon_lim03">1,200,001-1,400,000円</option>
						<option value="mon_lim04">1,400,001-1,600,000円</option>
						<option value="mon_lim05">1,600,001-1,800,000円</option>
						<option value="mon_lim06">1,800,001-2,000,000円</option>
						<option value="mon_lim07">2,000,001円以上</option>
					</select>
				</div>
				<div class="drop_Menu">
					<p>入試区分</p>
					<select class="select01" name="entrance_outline">
						<option value="">すべて</option>
						<option value="総合型選抜/AO入試あり">総合型選抜/AO入試</option>
						<option value="学校推薦型選抜/公募推薦入試あり">学校推薦型選抜/公募推薦入試</option>
						<option value="指定校推薦あり">指定校推薦</option>
						<option value="スポーツ推薦あり">スポーツ推薦</option>
						<option value="その他（地域指定など）の推薦あり">その他（地域指定など）の推薦</option>
						<option value="大学入学共通テスト利用（公募推薦）">大学入学共通テスト利用（公募推薦）</option>
						<option value="大学入学共通テスト利用（一般）">大学入学共通テスト利用（一般）</option>
						<option value="一般選抜/一般入試あり">一般選抜/一般入試</option>
						<option value="社会人入試あり">社会人入試</option>
						<option value="特待生入試あり">特待生入試</option>
					</select>
				</div>
				<div class="drop_Menu">
					<p>出願期間</p>
					<div class="select_date" name="entrance_term">
						<input type="date" name="term_from"></input><span>-</span><input type="date" name="term_end"></input>
					</div>
				</div>
				<div class="drop_Menu">
					<p>入試科目</p>
					<select class="select01" name="entrance_subect">
						<option value="">すべて</option>
						<option value="学科試験（国）">国語</option>
						<option value="学科試験（英）">英語</option>
						<option value="学科試験（数）">数学</option>
						<option value="学科試験（理）">理科</option>
						<option value="">学科その他</option>
						<option value="面接（口頭試問を含む）">面接（口頭試問含む）</option>
						<option value="小論文">小論文</option>
						<option value="プレゼンテーション">プレゼンテーション</option>
						<option value="書類選考">書類選考</option>
					</select>
				</div>
				<div class="drop_Menu">
					<p>学生寮</p>
					<select class="select01" name="dormitory">
						<option value="">すべて</option>
						<option value="あり">学生寮あり</option>
						<option value="あり（女子のみ）">女子寮あり</option>
						<option value="あり（男子のみ）">男子寮あり</option>
						<option value="あり（提携先学生寮）">提携先学寮あり</option>
					</select>
				</div>
                <div class="SearchButton"><input type="submit" id="btn-submit" name="btn-submit" value="search"><i class="fas fa-search fa-fw"></i></div>
            </form>
		</div>
