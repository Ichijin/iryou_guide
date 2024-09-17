<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!doctype html>
<html prefix="og: http://ogp.me/ns#" lang="ja">
<head>
<meta charset="utf-8">
<title>看護・医療系学校 入試情報検索ガイド｜[看護医療進学ネット]看護・医療・福祉専門学校・大学の情報サイト</title>
<meta name="keywords" content="日本で最長の歴史を誇る看護・医療看系進学ガイドがWEBになりました,看護,医療,福祉,看護専門学校,医療専門学校,専門学校,大学,情報,進学">
<meta name="description" content="看護・医療看系進学ガイド,看護･医療･福祉の専門学校・看護専門学校・医療専門学校・大学の情報サイト。倍率情報や過去入試問題も満載。全国模試の申込みもできる看護医療進学ネット。">
<meta name="robots" content="index,follow">
<meta name="viewport" content="initial-scale=1.0">
<!--<link rel="shortcut icon" href="//www.ishin.jp/favicon.ico">
<link rel="alternate" media="only screen and (max-width: 640px)" href="https://smt.ishin.jp/">
<!--<link rel="canonical" href="https://smt.ishin.jp/">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<!-- ogp-->
<meta property="og:type" content="website">
<meta property="og:title" content="看護・医療看系進学ガイド,看護・医療・福祉専門学校・大学の情報サイト[看護医療進学ネット]">
<meta property="og:site_name" content="看護・医療看系進学ガイド,看護・医療・福祉専門学校・大学の情報サイト[看護医療進学ネット]">
<meta property="og:description" content="看護・医療看系進学ガイド,看護･医療･福祉の専門学校・看護専門学校・医療専門学校・大学の検索ができる看護医療進学ネット">
<meta property="og:locale" content="ja_JP">
<!-- twitter card-->
<meta name="twitter:card" content="summary">
<meta name="twitter:site" content="@sanpoukun">
<meta property="og:url" content="https://www.ishin.jp/guide/">
<meta property="og:title" content="看護・医療看系進学ガイド,看護・医療・福祉専門学校・大学の情報サイト[看護医療進学ネット]">
<meta property="og:description" content="看護・医療看系進学ガイド,看護･医療･福祉の専門学校・看護専門学校・医療専門学校・大学の検索ができる看護医療進学ネット">
<!--<link href="/common/css/import.css" rel="stylesheet" media="all">
<!--<link href="/css/print.css" rel="stylesheet" media="print">
<link href="/css/index.css" rel="stylesheet" media="all">
<!--<link href="/css/main_slider.css" rel="stylesheet" media="all"><!--スライドバナー-->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<script async src="https://www.googletagmanager.com/gtag/js?id=G-CJKCHL4WSB"></script>
<script src="<?= $path ?>js/gtag.js"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3/dist/jquery.min.js"></script> -->
<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="<?= $path ?>js/medical_guide.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
<link href="<?= $path ?>css/guide2024.css" rel="stylesheet" media="all">
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.0-beta.1/dist/js/select2.min.js"></script>
<script src="<?= $path ?>js/guide_schoolsearch.js"></script>
<script src="<?= $path ?>js/common.js"></script>
<script src="<?= $path ?>js/index.js"></script>
<script src="<?= $path ?>js/pagetop.js"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=M+PLUS+1p&display=swap" rel="stylesheet">
<!--  cretio用タグ -->
<script type="text/javascript" src="//static.criteo.net/js/ld/ld.js" async="true"></script>
<script type="text/javascript">
window.criteo_q = window.criteo_q || [];
window.criteo_q.push(
        { event: "setAccount", account: 28005 },
        { event: "setSiteType", type: "d" },
        { event: "viewHome" });

// クラス変更
window.onload = function () {
    const spinner = document.getElementById('loading');
    spinner.classList.add('loaded');
}

//safari対策
window.onpageshow = function (event) {
    if (event.persisted) {
        window.location.reload();
    }
};
</script>
<!--  トップページタグ cretio-->
</head>

<style>
	.schoolPage{
		margin:200px auto 0;
	}
	.searchPage{
		margin:220px auto 0;
	}
	.managePage{
		margin:60px auto 0;
	}
	
	.design01 {
		width: 100%;
		text-align: center;
		border-collapse: collapse;
		border-spacing: 0;
	}
	.design01 th {
		padding: 3px;
		background: #e9faf9;
		border: solid 1px #778ca3;
	}
	.design01 td {
		padding: 3px;
		border: solid 1px #778ca3;
	}

	.map {
    width: 400px;
    height: 350px;
	}

	.Pagination {
		display: flex;
		align-items: center;
		border: solid 2px #111;
		border-radius: 9999px;
		overflow: hidden;
	}
	.Pagination > * + * {
		/*border-left: solid 2px #111;*/
	}
	.Pagination-Item-Link {
		display: flex;
		justify-content: center;
		align-items: center;
		flex-wrap: wrap;
		width: 30px;
		height: 30px;
		background: #fff;
		font-size: 9px;
		color: #111;
		/*font-weight: bold;*/
		transition: all 0.15s linear;
	}
	.Pagination-Item-Link-Icon {
		width: 20px;
	}
	.Pagination-Item-Link.isActive {
		background: #111;
		color: #fff;
		pointer-events: none;
	}
	.Pagination-Item-Link:not(.isActive):hover {
		background: #111;
		color: #fff;
	}

  .Paging{
    overflow-x: auto;
    border: 1px solid #999;
    /*padding: 10px;*/
    width: 95%;
  }
  .Paging>div{
      display: flex;
  }
  .Paging>div>div{
      /*コレ*/white-space: nowrap;
      border: 1px solid #999;
      /**padding: 10px 20px;*/
      /*margin: 10px;*/
      background: #f2f2f2;
  }

/**.loading {
  height: 100vh;
  width: 100vw;
  cursor: progress;
  
  &::before{
    content: "";
    position: absolute;
    top: 50%;
    left: 50%;
    width: 5em;
    height: 5em;
    margin-top: -2.5em;
    margin-left: -2.5em;
    border-radius: 50%;
    border: 0.25em solid #ccc;
    border-top-color: #333;
    animation: spinner 1.5s linear infinite;
  }
}**/
.loading{
  height: 100vh;
  width: 100vw;
  cursor: progress;
}
.loading:before{
    content: "";
    position: absolute;
    top: 50%;
    left: 50%;
    width: 5em;
    height: 5em;
    margin-top: -2.5em;
    margin-left: -2.5em;
    border-radius: 50%;
    border: 0.25em solid #ccc;
    border-top-color: #333;
    animation: spinner 1.5s linear infinite;
}
@keyframes spinner {
  to {
    transform: rotate(360deg);
  }
}

</style>

<body>
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5XLZ4N" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>



<div class="loading" id="loading" style="display:none;"></div>

<?php
  $top = ($page == 'top') ? ' class="top"': '';
  $header = ($page == 'top') ? '': ' class="schoolHeader"';
?>
<div<?= $top ?>>
	<header<?= $header ?>>
		<div class="header-area">
    <?php if($page == 'top'): ?>
      <p></p>
		<?php else: ?>
			<div>
				<h1>2025年度<br>看護・医療系学校<br>入試情報検索ガイド
				<?php if($page == 'viewer'): ?>
					<!-- <p style="display:float;">
						<form method="POST" action="viewer">
							<!--フォーム
							<div class="infoBox pr10 pl10 pt10">
								<input type="text" name="keyword" />
								<input type="submit" name="uploadBtn" value="検索" class="btn_next mt20" />&nbsp;
							</div>
						</form>
					</p> -->
				<?php endif; ?>
				</h1>
				<?php if($page != 'manage' && $page != 'viewer'): ?>
					<p><small>受験を希望される方は、必ず各校の募集要項をご確認ください</small></p>
				<?php endif; ?>
			</div>
    <?php endif; ?>
			<a class="menu">
				<span class="menu__line menu__line--top"></span>
				<span class="menu__line menu__line--center"></span>
				<span class="menu__line menu__line--bottom"></span>
			</a>
			<nav class="gnav">
				<div class="gnav__wrap">
					<ul class="gnav__menu">
						<li class="gnav__menu__item"><a href="https://www.ishin.jp/iryou_guide/">2025年度<br class="nav_sp"> 看護・医療系学校<br class="nav_sp"> 入試情報検索ガイド</a></li>
						<li class="gnav__menu__item"><a href="https://www.ishin.jp/">看護医療進学ネット</a></li>
						<li class="gnav__menu__item"><a href="https://www.sanpou-s.net/">さんぽう進学ネット</a></li>
						<!-- <li class="gnav__menu__item"><a href="<?= $path ?>pages/manager">管理者ページ</a></li> -->
					</ul>
				</div>
			</nav>
		</div>
	
		<?php if($page == 'search'): ?>
		<div class="container">
			<p class="search_word"><strong>検索ワード</strong>
			<?php
//print_r($forms);
//exit();
				if(@$forms['keyword']) echo('<span>'.$forms['keyword'].'</span>');
				if(@$forms['distinct']) echo('<span>'.$forms['distinct'].'</span>');
				if(@$forms['pref']){
					foreach($pref_info as $row){
						if($row[0] == $forms['pref'])
							echo('<span>'.$row[1].'</span>');
					}
				}
				if(@$forms['category']){
					foreach($field_info as $row){
						if($row[0] == $forms['category'])
							echo('<span>'.$row[1].'</span>');
					}
				}
				if(@$forms['first_payment']):
					if($forms['first_payment'] == 'mon_lim01') echo('<span>1,000,000円以下</span>');
					if($forms['first_payment'] == 'mon_lim02') echo('<span>1,000,001-1,200,000円</span>');
					if($forms['first_payment'] == 'mon_lim03') echo('<span>1,200,001-1,400,000円</span>');
					if($forms['first_payment'] == 'mon_lim04') echo('<span>1,400,001-1,600,000円</span>');
					if($forms['first_payment'] == 'mon_lim05') echo('<span>1,600,001-1,800,000円</span>');
					if($forms['first_payment'] == 'mon_lim06') echo('<span>1,800,001-2,000,000円</span>');
					if($forms['first_payment'] == 'mon_lim07') echo('<span>2,000,001円以上</span>');
				endif;
				if(@$forms['entrance_outline']) echo('<span>'.$forms['entrance_outline'].'</span>');
				if(@$forms['term_from'] || @$forms['term_end']) echo('<span>'.@$forms['term_from'].'～'.@$forms['term_end'].'</span>');
				if(@$forms['entrance_subject']) echo('<span>'.$forms['entrance_subject'].'</span>');
				if(@$forms['dormitory']){
          $dormitory = '';
					if($forms['dormitory'] == 'あり') $dormitory = '学生寮あり';
					if($forms['dormitory'] == 'あり（女子のみ）') $dormitory = '女子寮あり';
					if($forms['dormitory'] == 'あり（男子のみ）') $dormitory = '男子寮あり';
					if($forms['dormitory'] == 'あり（提携先学生寮）') $dormitory = '提携先学生寮あり';
					echo('<span>'.$dormitory.'</span>');
				}
			?>
			</p>
			<dl class="search_result">
				<dt>検索結果</dt><dd class="result"><?= $total_cnt ?></dd><dd>校</dd>
			</dl>
		<div class="subinfo">
			<p class="subLeft">絞りこみ条件に該当するものがない場合、全件データが表示される場合がございます</p>
			<p class="comment"><a href="/iryou_guide/caption.html" target="window_name" onClick="disp('caption.html');" width="320" height="480">※各アイコンの説明</a></p>
		</div>
		</div>
		<?php endif; ?>
	
	<!-- ↓body閉じタグ直前でjQueryを読み込む -->
	<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	</header>

	<h2>看護・医療系入学全ガイド</h2>
	<div class="search">
			<div class="search-box">
				<form method="POST" action="pages/search">
					<input class="btn" type="text" name="keyword" placeholder="検索ワード" data-hint="WORLD!">
					<button type="submit" onclick="keywordEvent();">
						<i class="fa fa-search fa-fw"></i>
					</button>
          <br>
				</form>
		</div>
	</div>
</div>



<script>
	function keywordEvent() {
	
		$("body, html").scrollTop(0);
		$('.loading').css('display', 'block');
	}
</script>