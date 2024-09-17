<div class="container" id="search">
	<p class="toppage_ex"><small>2024年6月-8月の調査に基づいたデータとなります。<br class="sp">
	入試日程・内容は変更になる可能性があるため、<br class="sp">
	必ず事前に学校のHPを確認してください。</small></p>
	<div class="search_caption"><h3>条件で検索する</h3><p>全国にある看護・医療系学校の<br class="sp">入試情報を検索できる！</p></div>
		<div class="contents_wrap">
			<form class="drop_menu_flex" method="POST" action="pages/search">
				<div class="drop_Menu">
					<p>学校区分</p>
					<select class="select01" name="distinct">
						<option value="">すべて</option>
						<?php foreach($school_info as $row):
							echo('<option value="'.$row[1].'">'.$row[1].'</option>');
						endforeach; ?>
					</select>
				</div>
				<div class="drop_Menu">
					<p>エリア</p>
					<select class="select01" name="pref">
						<option value="">すべて</option>
						<?php foreach($pref_info as $row):
							$style = $mark = '';
							if($row[0] > 90):
								$style = ' style="font-weight:bold;"';
								$mark = '■';
							endif;
							echo('<option value="'.$row[0].'"'.$style.'>'.$mark.$row[1].'</option>');
						endforeach; ?>
						</optgroup>
					</select>
				</div>
				<div class="drop_Menu">
					<p>分野</p>
					<select class="select01" name="category">
						<option value="">すべて</option>
						<?php foreach($field_info as $row):
							$style = $mark = '';
							if($row[0] > 90):
								$style = ' style="font-weight:bold;"';
								$mark = '■';
							endif;
							echo('<option value="'.$row[0].'"'.$style.'>'.$mark.$row[1].'</option>');
						endforeach; ?>
					</select>
				</div>
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
						<option value="総合型選抜/AO入試あり">総合型選抜/AO入試あり</option>
						<option value="学校推薦型選抜/公募推薦入試あり">学校推薦型選抜/公募推薦入試あり</option>
						<option value="指定校推薦あり">指定校推薦あり</option>
						<option value="スポーツ推薦あり">スポーツ推薦あり</option>
						<option value="その他（地域指定など）の推薦あり">その他（地域指定など）の推薦あり</option>
						<option value="大学入学共通テスト利用あり（公募推薦）">大学入学共通テスト利用あり（公募推薦）</option>
						<option value="大学入学共通テスト利用入試あり（一般）">大学入学共通テスト利用入試あり（一般）</option>
						<option value="一般選抜/一般入試あり">一般選抜/一般入試あり</option>
						<option value="社会人入試あり">社会人入試あり</option>
						<option value="特待生入試あり">特待生入試あり</option>
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
						<option value="学科試験（国）">学科試験（国）</option>
						<option value="学科試験（英）">学科試験（英）</option>
						<option value="学科試験（数）">学科試験（数）</option>
						<option value="学科試験（理）">学科試験（理）</option>
						<option value="学科その他">学科その他</option>
						<option value="面接（口頭試問を含む）">面接（口頭試問含む）</option>
						<option value="小論文（作文を含む）">小論文（作文を含む）</option>
						<option value="プレゼンテーション">プレゼンテーション</option>
						<option value="書類選考">書類選考</option>
						<option value="その他">その他</option>
					</select>
				</div>
				<div class="drop_Menu">
					<p>学生寮</p>
					<select class="select01" name="dormitory">
						<option value="">すべて</option>
						<option value="あり">学生寮あり</option>
						<option value="あり（女子のみ）">女子寮あり</option>
						<option value="あり（男子のみ）">男子寮あり</option>
						<option value="あり（提携先学生寮）">提携先学生寮あり</option>
					</select>
				</div>
                <div class="SearchButton"><input type="submit" id="btn-submit" name="btn-submit" value="検索"><img src="https://www.ishin.jp/iryou_guide/images/icon_search.svg" alt="search" width="15" height="15"></div>
            </form>
		</div>
