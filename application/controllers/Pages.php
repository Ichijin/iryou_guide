<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

	/** 
	 * Inddex Page for this controller.
	 */
	public function index()
	{
		$this->load->view('common/header');
		$this->load->view('common/footer');
	}
	
	public function manager()
	{
		$this->load->view('common/header', array('page' => 'manage', 'path' => '/iryou_guide/'));
		$this->load->view('pages/manager', array('path' => '/iryou_guide/'));
		$this->load->view('common/footer', array('path' => '/iryou_guide/'));
	}

	public function capture()
	{
		$this->load->helper('url');

		if(@$_FILES['csv_file']['name'] && ($_FILES['csv_file']['type'] == 'text/csv' || $_FILES['csv_file']['type'] == 'application/vnd.ms-excel')){
			$this->load->database();

			// 一旦、サーバーにCSVアップロードする
			// sample01.php でアップロードされたCSVファイルは$_FILES['csv_file']取得できる
			$fileName = 'irou_guiede.csv';
			$fileTmpName = $_FILES['csv_file']['tmp_name'];

			// ファイルパス
			$filePath = './csv/' . $fileName;

			// CSVファイルをcsvディレクトリに保存する
			move_uploaded_file($fileTmpName, $filePath);


			$handle = fopen($filePath, "r");  // readonly

			// ファイル内容を出力
			$id = $cnt =  0;
			$examin_publicy = $examin_general = $cat_arry = array();
			$examin_publicy = $examin_general = $list_tmp = '';
			while(!feof($handle)) {
				$line = fgets($handle);
				$list = explode(',', $line);
				if($cnt > 0){
					if(@$list[0]){
//print_r($list);
//echo('<br>');
echo($list[0].' '.$list[1].'<br>');
						$cat_arry = array();

						// メインのデータ処理
						$mt_data = array(
							'distinct' => @$list[0],			// 学校区分
							'school_name' => @$list[1],			// 貴学名
							'tel' => @$list[2],					// 電話番号（学生からの問い合わせ用）
							'mail' => @$list[3],				// メールアドレス（学生からの問い合わせ用）2
							'open_school' => @$list[4],			// 開校年
							'zip' => @$list[5],					// 郵便番号1
							'pref' => @$list[6],				// 都道府県1
							'city' => @$list[7],				// 市区町村1
							'town' => @$list[8],				// 町名番地1
							'build' => @$list[9],				// ビル建物名
							'transport' => @$list[10],			// アクセス
							'dormitory' => @$list[11],			// 学生寮の有無
							'pamph' => @$list[12],				// パンフ
							'application' => @$list[13],		// 願書
							'web_application' => @$list[14],	// WEB出願
							'response_id' => (@$list[375]) ? $list[375]: 0,    // 回答ID
							'school_name_furi' => @$list[378],	// 貴学名（ふりがな）
							'respondent_sei' => @$list[379],	// ご回答者名1(姓)
							'respondent_mei' => @$list[380],	// ご回答者名1(名)
							'confirm_tel' => @$list[381],		// 電話番号（アンケート内容確認用）
							'confirm_mail' => @$list[382],		// メールアドレス（確認メール送付先）1
							'ad_contract' => @$list[388],		// 広告校
							'ad_url' => @$list[389],			// 広告リンク
							'response_date' => @$list[383],		// 回答日時
							'update_date' => @$list[384],		// 更新日時
							'browser' => @$list[385],			// ブラウザ
							'ip_address' => @$list[386],		// IPアドレス
							'link' => @$list[387]				// リンク元
						);
						$this->db->insert('school_mt', $mt_data);
						$id = $this->db->insert_id();
					}

					// カテゴリ数を繰り返す
					/* 
					 */
					for($i = 0; $i < 6; $i++){
						// 1カテゴリ59項目
						$p = $i * 60;
						$guide = $payment = array();
						$field = $entrance_outline = $subject_publicy = $subject_general = $term_publicy = '';
						for($j = 15; $j < 75; $j++){
							$k = $j + $p;
							if(@$list[$k]){
								if($j == 15) $category_no = @$list[$k];    // カテゴリー選択
								if($j == 16) $category = @$list[$k];    // カテゴリー選択
								if($j >= 17 && $j <= 31 && @$list[$k] && $list[$k] != '-'){
									if(@$field) $field .= ';';
									$field .= @$list[$k];    // 入試概要
								}
								if($j == 32) $course = str_replace('"', '', @$list[$k]);    // 学部学科コース・年限・定員
								if($j == 33){	// 初年度納入金
									$first_payment_s = $first_payment_e = 0;
									if(@$list[$k]) {
										$res = $this->payment_edit($list[$k]);
										$first_str = $res['str'];
										$first_payment_s = trim($res['start']);    // 初年度納入金
										$first_payment_e = trim($res['end']);    // 初年度納入金
									}
								}
								if($j == 34){    // 卒業までの納入金
									$total_payment_s = $total_payment_e = 0;
									if(@$list[$k]) {
										$res = $this->payment_edit($list[$k]);
										$total_str = $res['str'];
										$total_payment_s = trim($res['start']);    // 初年度納入金
										$total_payment_e = trim($res['end']);    // 初年度納入金
									}
								}
								if($j == 35) $employment = @$list[$k];    // 主な就職先
								if($j >= 36 && $j <= 45 && @$list[$k] && $list[$k] != '-'){    // 入試概要
									if(@$entrance_outline) $entrance_outline .= ';';
									$entrance_outline .= @$list[$k];
								}
								if($j >= 47 && $j <= 56 && @$list[$k] && $list[$k] != '-'){    // 公募推薦の試験科目
									if(@$subject_publicy) $subject_publicy .= ';';
									$subject_publicy .= $list[$k];
								}
								if($j >= 57 && $j <= 62 && @$list[$k] && $list[$k] != '-'){    // 公募推薦出願条件
									if(@$term_publicy) $term_publicy .= ';';
									$term_publicy .= $list[$k];
								}
								if($j == 63) $average = @$list[$k];    // 評定平均
								if($j >= 65 && $j <= 74 && @$list[$k] && $list[$k] != '-'){    // 一般の試験科目
									if(@$subject_general) $subject_general .= ';';
									$subject_general .= $list[$k];
								}
							}

							if(($j == 46 || $j == 64) && @$list[$k]){		// 試験日程
								$res = $this->term_edit($list[$k]);
								if(@$cat_arry[$k]){
									$cat_no = $cat_arry[$k];
								}else{	
									$cat_arry[$k] = $category_no;
									$cat_no = $category_no;
								}
								if($j == 46)
									$examin_publicy[$id][$cat_no][$list[$k]] = array('title' => $list[$k], 'prefix' => str_replace('"', '', $res['prefix']), 'term_s' => $res['term_s'], 'term_e' => $res['term_e'], 'examin' => $res['examin'], 'remark' => $res['remark']);    // 公募推薦　試験日
								else{
									$examin_general[$id][$cat_no][$list[$k]] = array('title' => $list[$k], 'prefix' => str_replace('"', '', $res['prefix']), 'term_s' => $res['term_s'], 'term_e' => $res['term_e'], 'examin' => $res['examin'], 'remark' => $res['remark']);    // 公募推薦　試験日
								}
							}
						}
						if(@$category && @$list[0] && !strstr($category, 'カテゴリー選択')){
							$guide_data[$id][$category_no][$i] = array(
								'mt_id' => $id,   // 親ID
								'ct_id' => $category_no,   // カテゴリID
								'category' => $category,   // カテゴリー選択
								'field' => @$field,   // 設置学部学科コースの分野
								'course' => $course,   // 学部学科コース・年限・定員
								'first_str' => $first_str,   // 初年度納入金
								'first_payment_s' => $first_payment_s,   // 初年度納入金
								'first_payment_e' => $first_payment_e,   // 初年度納入金
								'total_str' => $total_str,   // 初年度納入金
								'total_payment_s' => $total_payment_s,   // 卒業までの納入金
								'total_payment_e' => $total_payment_e,   // 卒業までの納入金
								'employment' => $employment,   // 主な就職先
								'entrance_outline' => $entrance_outline,   // 入試概要
								'subject_publicy' => $subject_publicy,   // 公募推薦の試験科目
								'term_publicy' => $term_publicy,   // 公募推薦出願条件
								'average' => $average,   // 評定平均
								'subject_general' => $subject_general,   // 一般の試験内容・科目'
							);
						}
					}
				}
				$cnt++;
			}
			ksort($guide_data);
//print_r($guide_data);
//echo('<br><br>');

			foreach($guide_data as $key=>$row){
				ksort($row);
				foreach($row as $detail){
					ksort($detail);
					foreach($detail as $data){
						if(!@$data['field']) continue;
						$this->db->insert('school_guide', $data);
					}
				}
			}
			for($key = 0; $key <= $id; $key++){
				if(@$examin_publicy[$key]){
					foreach($examin_publicy[$key] as $ct=>$detail){
						foreach($detail as $row){
							$examin1 = $examin2 = $examin3 = '';
							if(@$row['examin']){
								if(is_array($row['examin'])){
									$ex_no = 1;
									foreach($row['examin'] as $exam){
										if(@$exam) ${'ex_no'.$ex_no} = $exam;
										$ex_no++;
									}
								}else{
									$examin1 = $row['examin'];
								}
							}
							$examin_data= array(
								'mt_id' => $key,   // 親ID
								'ct_id' => $ct,   // カテゴリID
								'title' => $row['title'],   // 
								'prefix' => $row['prefix'],   // 
								'term_s' => $row['term_s'],   // 
								'term_e' => $row['term_e'],   // 
								'examin1' => $examin1,   // 
								'examin2' => $examin2,   // 
								'examin3' => $examin3,   // 
								'remark' => $row['remark'],   // 
							);
							$this->db->insert('examin_publicy', $examin_data);
						}
					}
				}
				if(@$examin_general[$key]){
					foreach($examin_general[$key] as $ct=>$detail){
						foreach($detail as $row){
							$examin1 = $examin2 = $examin3 = '';
							if(@$row['examin']){
								if(is_array($row['examin'])){
									$ex_no = 1;
									foreach($row['examin'] as $exam){
										if(@$exam) ${'examin'.$ex_no} = $exam;
										$ex_no++;
									}
								}else{
									$examin1 = $row['examin'];
								}
							}
							$examin_data = array(
								'mt_id' => $key,   // 親ID
								'ct_id' => $ct,   // カテゴリID
								'title' => $row['title'],   // 
								'prefix' => $row['prefix'],   // 
								'term_s' => $row['term_s'],   // 
								'term_e' => $row['term_e'],   // 
								'examin1' => $examin1,   // 
								'examin2' => $examin2,   // 
								'examin3' => $examin3,   // 
								'remark' => $row['remark'],   // 
							);
							$this->db->insert('examin_general', $examin_data);
						}
					}
				}
			}
			// ファイルポインタをクローズ
			fclose($handle);
		}
exit();

		redirect($_SERVER['HTTP_ORIGIN'].'/iryou_guide');
	}

	public function search()
	{
		$this->load->database();
		$this->load->helper('url');
		$this->load->helper('html');

		$this->load->library('sharingclass');
		$pref_info		= $this->sharingclass->pref_info();
		$school_info	= $this->sharingclass->school_info();
		$field_info		= $this->sharingclass->field_info();
		
		$ua = $_SERVER['HTTP_USER_AGENT'];
		if ((strpos($ua, 'Android') !== false) && (strpos($ua, 'Mobile') !== false) || (strpos($ua, 'iPhone') !== false) || (strpos($ua, 'Windows Phone') !== false)){
			$show_cnt = 10;
			$device = 'smt';
		}else{
			$show_cnt = 50;
			$device = 'pc';
		}

//print_r($_POST);
//echo('<br>');
		$page_info = array(
			'page' => @$_POST['page'] ? $_POST['page']: 0,
			'keyword' => @$_POST['keyword'],
			'distinct' => @$_POST['distinct'],
			'pref' => @$_POST['pref'],
			'dormitory' => @$_POST['dormitory'],
			'category' => @$_POST['category'],
			'first_payment' => @$_POST['first_payment'],
			'entrance_subject' => @$_POST['entrance_subject'],
			'entrance_outline' => @$_POST['entrance_outline'],
			'term_from' => @$_POST['term_from'],
			'term_end' => @$_POST['term_end']
		);
//print_r($page_info);
//echo('<br>');
//exit();

		// メインデータの読み込み
		$this->db->select('*');
		$this->db->from('school_mt');
		if(@$page_info['keyword']){
			$this->db->group_start()
						->like('school_name', $page_info['keyword'])
						->or_like('pref', $page_info['keyword'])
						->or_like('city', $page_info['keyword'])
						->or_like('transport', $page_info['keyword'])
						->or_like('school_name_furi', $page_info['keyword'])
					->group_end();
		}else{
			// 学校区分
			if(@$page_info['distinct']) $this->db->where('distinct', $page_info['distinct']);
			// エリア
			if(@$page_info['pref']){
				$pref_in = array();
				$cnt = 0;
				foreach($pref_info as $row){
					if($page_info['pref'] > 90){
						if($row[0] == $page_info['pref']) $cnt = 1;
						if($cnt == 1){
							if($row[0] < 90) $pref_in[] = $row[1];
							if($row[0] == ($page_info['pref']+1)) break;
						}
					}else{
						if($row[0] == $page_info['pref']) $pref_in[] = $row[1];
					}
				}
				$this->db->where_in('pref', $pref_in);
			}
			// 学生寮
			if(@$page_info['dormitory']) $this->db->like('dormitory', $page_info['dormitory']);
		}
		$res = $this->db->get()
						->result_array();
//echo($this->db->last_query().'<br>');

		if(@$page_info['keyword'] && !@$res){
			$this->db->reset_query();
			$res = $this->db->select('*')
							->from('school_mt')
							->get()
							->result_array();
//echo($this->db->last_query().'<br>');
		}
		$data_array =  $res;
//exit();

		// 都道府県、学校区分、50音順
		$datas_array = array();
		foreach($data_array as $row){
			$key = '';
			foreach($school_info as $s_row){
				if($s_row[1] == $row['distinct']){
					$key = sprintf("%02d", $s_row[0]);
					break;
				}
			}
			foreach($pref_info as $p_row){
				if($p_row[1] == $row['pref']){
					$key .= sprintf("%02d", $p_row[0]);
					break;
				}
			}
			$datas_array[$key.$row['school_name_furi']] = $row;
		}
		ksort($datas_array);
//print_r($datas_array);
//exit();

		$datas = array();
		foreach($datas_array as $key=>$row){
			$datas[$row['id']] = $row;
		}
//print_r($datas);
//echo('<br>');
//exit();

		$mt_ids = $ct_ids = array();
		if(@$datas){
			foreach($datas as $key=>$row){
				$this->db->select('*')
							->from('school_guide')
							->where('mt_id', $row['id']);
				
				// 検索ワード
/*
				if(@$page_info['keyword'])
					$this->db->group_start()
								->like('category', $page_info['keyword'])
								->or_like('field', $page_info['keyword'])
								->or_like('course', $page_info['keyword'])
								->or_like('employment', $page_info['keyword'])
								->or_like('entrance_outline', $page_info['keyword'])
								->or_like('subject_publicy', $page_info['keyword'])
								->or_like('subject_general', $page_info['keyword'])
							->group_end();
*/

				// 分野
				if(@$page_info['category']){
					$category_in = array();
					$cnt = 0;
					$this->db->group_start();
					foreach($field_info as $cat){
						if($page_info['category'] > 90){
							if($cat[0] == $page_info['category']) $cnt = 1;
							if($cnt == 1){
								if($cat[0] < 90) $this->db->or_like('field', $cat[1]);
								if($cat[0] == ($page_info['category']+1)) break;
							}
						}else{
							if($cat[0] == $page_info['category']) $this->db->or_like('field', $cat[1]);
						}
					}
					$this->db->group_end();
				}
				// 初年度納入金
				if(@$page_info['first_payment']){
					if($page_info['first_payment'] == 'mon_lim01')
						$this->db->where('first_payment_e >', 0)
									->where('first_payment_e <=', 1000001);
					if($page_info['first_payment'] == 'mon_lim02')
						$this->db->where('first_payment_s <=', 1200000)
									->where('first_payment_e >=', 1000001);
					if($page_info['first_payment'] == 'mon_lim03')
						$this->db->where('first_payment_s <=', 1400000)
									->where('first_payment_e >=', 1200001);
					if($page_info['first_payment'] == 'mon_lim04')
						$this->db->where('first_payment_s <=', 1600000)
									->where('first_payment_e >=', 1400001);
					if($page_info['first_payment'] == 'mon_lim05')
						$this->db->where('first_payment_s <=', 1800000)
									->where('first_payment_e >=', 1600001);
					if($page_info['first_payment'] == 'mon_lim06')
						$this->db->where('first_payment_s <=', 2000000)
									->where('first_payment_e >=', 1800001);
					if($page_info['first_payment'] == 'mon_lim07')
						$this->db->group_start()
									->where('first_payment_s >=', 2000001)
									->or_where('first_payment_e >=', 2000001)
								->group_end();
				}
				// 入試区分
				if(@$page_info['entrance_outline']) $this->db->like('entrance_outline', $page_info['entrance_outline']);
				// 入試科目
				if(@$page_info['entrance_subject'])
					$this->db->group_start()
								->like('subject_publicy', $page_info['entrance_subject'])
								->or_like('subject_general', $page_info['entrance_subject'])
							->group_end();
				$res = $this->db->get()
								->result_array();
				if(@$res){
					$guides[$row['id']] = $res;
					$mt_ids[] = $row['id'];
				}
//echo($this->db->last_query().'<br>');
			}
//print_r($mt_ids);
//print_r($guides);
//print_r($page_info);
//echo('<br>');
//exit();

			$generals = $publicys = $generals = $publicys = array();
			if(@$guides){
				$mt_ids = array();
				foreach($guides as $line){
	
					foreach($line as $row){
//print_r($row);
//echo('<br>');
						// 「その他」の場合、「その他」と「学科試験（その他）」を読み分ける
						if(@$page_info['entrance_subject']){
							$sein = 0;
							foreach(explode(';', $row['subject_publicy']) as $examin){
								if($page_info['entrance_subject'] == $examin){
									$sein = 1;
									break;
								}
							}
							foreach(explode(';', $row['subject_general']) as $examin){
								if($page_info['entrance_subject'] == $examin){
									$sein = 1;
									break;
								}
							}
							if(!@$sein) continue;
						}

						// 出願期間
						$from = '';
						if(@$page_info['term_from']){
							list($y, $m, $d) = explode('-', $page_info['term_from']);
							$from = $y.$m.$d;
						}
						$end = '99991231';
						if(@$page_info['term_end']){
							list($y, $m, $d) = explode('-', $page_info['term_end']);
							$end = $y.$m.$d;
						}
	
						$this->db->select('*')
								->from('examin_general')
								->where('mt_id', $row['mt_id'])
								->where('ct_id', $row['ct_id']);
	
						if(@$page_info['term_from'] || @$page_info['term_end']){
							$this->db->where('term_s <=', @$end);
							$this->db->where('term_e >=', @$from);
						}
						$res = $this->db->get()
								->result_array();
//if($row['mt_id']==235) echo('examin_general 1 :'.$this->db->last_query().'<br>');
						if(@$res){
/*if($row['mt_id']==235) {
	echo('examin_general 2 :'.$this->db->last_query().'<br>');
	print_r($res);
	echo('<br>');
}*/
							$generals[$row['mt_id']][] = $res;
							$mt_ids[] = $row['mt_id'];
						}

						$this->db->select('*')
								->from('examin_publicy')
								->where('mt_id', $row['mt_id'])
								->where('ct_id', $row['ct_id']);
						// 出願期間
						if(@$page_info['term_from'] || @$page_info['term_end']){
							$this->db->where('term_s <=', @$end);
							$this->db->where('term_e >=', @$from);
						}
						$res = $this->db->get()
								->result_array();
//if($row['mt_id']==235) echo('examin_publicy 1 :'.$this->db->last_query().'<br>');
						if(@$res){
/*if($row['mt_id']==235) {
	echo('examin_general 2 :'.$this->db->last_query().'<br>');
	print_r($res);
	echo('<br>');
}*/
							$publicys[$row['mt_id']][] = $res;
							$mt_ids[] = $row['mt_id'];
						}
					}
				}
			}
		}
		$mt_ids = array_unique($mt_ids);
//print_r($generals[235]);
//echo('<br>');
//print_r($publicys[235]);
//echo('<br>');
//print_r($mt_ids);
//echo('<br>');
//print_r($page_info);
//echo('<br>');
//exit();

		// カテゴリ、出願期間、入試区分、入試科目、初年度納入金で絞り込みの場合、該当データの他すべて取得する
		if(@$page_info['category'] || @$page_info['term_from'] || @$page_info['term_end'] || @$page_info['entrance_subject'] || @$page_info['entrance_outline'] || @$page_info['first_payment']){
			$guides = $generals = $publicys = array();
			foreach($mt_ids as $row){
//echo($row.'<br>');
				$res = $this->db->select('*')
					->from('school_guide')
					->where('mt_id', $row)
					->get()
					->result_array();

				if(@$res){
					$guides[$row] = $res;

					foreach($guides[$row] as $g_row){
						$ret = $this->db->select('*')
							->from('examin_general')
							->where('mt_id', $row)
							->where('ct_id', $g_row['ct_id'])
							->get()
							->result_array();
						if(@$ret) $generals[$row][$g_row['ct_id']] = $ret;

						$ret = $this->db->select('*')
							->from('examin_publicy')
							->where('mt_id', $row)
							->where('ct_id', $g_row['ct_id'])
							->get()
							->result_array();
						if(@$ret) $publicys[$row][$g_row['ct_id']] = $ret;
						
					}
				}
			}
		}
		
		$_datas = array();
		$page = $d_cnt = 0;
		if(@$mt_ids){
			$mt_ids = array_unique($mt_ids);
			foreach($mt_ids as $id){
				if($d_cnt >= $show_cnt){
					$page++;
					$d_cnt = 0;
				}
				$_datas[$page][$d_cnt] = $datas[$id];
				$d_cnt++;
			}
		}
		$total_cnt = count($mt_ids);
//print_r($mt_ids);
//echo('<br>');
//echo($total_cnt.'  '.$page_info['page'].'<br>');
//print_r($_datas[$page_info['page']]);
//echo('<br>');
//print_r($generals[235]);
//echo('<br>');
//print_r($publicys[235]);
//echo('<br>');
//exit();

		$this->load->view('common/header', array('page' => 'search', 'path' => '/iryou_guide/', 'total_cnt' => $total_cnt, 'mt_ids'=>@$mt_ids, 'forms'=>$_POST, 'pref_info' => $pref_info, 'field_info' => $field_info));
		$this->load->view('pages/search', array('path' => '/iryou_guide/', 'show_cnt' => $show_cnt, 'page_info'=>$page_info, 'page' => $page, 'total_cnt' => $total_cnt, 'mt_ids'=>@$mt_ids, 'datas'=>@$_datas[$page_info['page']], 'guides'=>@$guides, 'generals'=>@$generals, 'publicys'=>@$publicys));
		$this->load->view('common/footer');
	}

	private function payment_edit($payment) {
		$check = explode(' ', $payment);
		$str = '';
		$pay = $payment;
		if(@$check[1]){
			$str = $check[0];
			$pay = $check[1];
		}
		if(strstr($pay, '約')){
			$str = '約';
			$pay = str_replace('約', '', $pay);
		}
		$start = (@$pay) ? $pay: 0;
		if(strstr($start, '～')) list($start, $end) = explode('～', $start);
		if(@$end && strstr($end, '約')) $end = str_replace('約', '', $pay);
		if(!@$end) $end = $start;

		return array('str' => $str, 'start' => $start, 'end' => @$end);
	}
	
	private function term_edit($term) {
		$terms = explode(' ', $term);
//echo('term_edit in '.$term.'<br>');
//print_r($terms);
//echo('<br>');
		if(@$terms[1] && strstr($terms[1], '～')){
			$_term = str_replace(array(' ', '　'), '', $terms[1]);
			list($start, $end) = explode('～', $_term);
			$_terms = explode('～', $_term);
			if(!@$_terms[0]){
				$start = '';
				$end = $_terms[1];
			}
			if(@$start){
				$day = explode('月', trim($start));
				$days = str_replace('日', '', $day);
				$year = (sprintf("%02d", $days[0]).sprintf("%02d", $days[1]) <= '1231' && sprintf("%02d", $days[0]).sprintf("%02d", $days[1]) > '0401') ? 2024: 2025;
				$term_s = $year.sprintf("%02d", $days[0]).sprintf("%02d", $days[1]);
			}
			
			if(@$end){
				$day = explode('月', trim($end));
				$days = str_replace('日', '', $day);
				$year = (sprintf("%02d", $days[0]).sprintf("%02d", $days[1]) <= '1231' && sprintf("%02d", $days[0]).sprintf("%02d", $days[1]) > '0401') ? 2024: 2025;
				$term_e = $year.sprintf("%02d", $days[0]).sprintf("%02d", $days[1]);
			}
	
			$day = explode('月', $terms[2]);
			$days = str_replace('日', '', $day);
			if(@$days[0] && @$days[01]){
				$year = (sprintf("%02d", $days[0]).sprintf("%02d", $days[1]) <= '1231' && sprintf("%02d", $days[0]).sprintf("%02d", $days[1]) > '0401') ? 2024: 2025;
				$examin = $year.sprintf("%02d", $days[0]).sprintf("%02d", $days[1]);
			}
		}
		if(@$terms[2] && strstr($terms[2], '・')){
			$_term = str_replace(array(' ', '　'), '', $terms[2]);
			list($start, $end) = explode('・', $_term);
//echo('terms[2]:'.$_term.', start:'.$start.', end'.$end.'<br>');
			$examin = explode('・', $_term);
		}
//echo($_term.', start:'.$start.', end'.$end.'-----------------------------------<br>');

		return array('prefix' => @$terms[0], 'term_s' => @$term_s, 'term_e' => @$term_e, 'examin' => @$examin, 'remark' => @$terms[3]);
	}

	public function viewer()
	{
		$this->load->database();
		
		// メインデータの読み込み
		$this->db->select('*');
		$this->db->from('school_mt');
		// キーワード
		if(@$_POST['keyword']){
			$this->db->group_start()
						->like('school_name', $_POST['keyword'])
						->or_like('pref', $_POST['keyword'])
						->or_like('city', $_POST['keyword'])
						->or_like('transport', $_POST['keyword'])
						->or_like('school_name_furi', $_POST['keyword'])
					->group_end();
		}
		$datas['principals'] = $this->db->get()
							->result_array();

		foreach($datas['principals'] as $row){
			for($i = 1; $i <= 6; $i++){
				// ガイド
				$this->db->select('*')
							->from('school_guide')
							->where('mt_id', $row['id'])
							->where('ct_id', $i);
				$tmps = $this->db->get()
									->row_array();
				
				if(!@$tmps) continue;
				
				$datas['guides'][$row['id']][$i][] = $tmps;
	
				// 公募試験日程
				$this->db->select('*')
							->from('examin_publicy')
							->where('mt_id', $row['id'])
							->where('ct_id', $i);
				$tmps = $this->db->get()
								->result_array();

				if(@$tmps) $datas['publicys'][$row['id']][$i] = $tmps;
	
				// 一般試験日程
				$this->db->select('*')
							->from('examin_general')
							->where('mt_id', $row['id'])
							->where('ct_id', $i);
				$tmps = $this->db->get()
								->result_array();

				if(@$tmps) $datas['generals'][$row['id']][$i] = $tmps;
			}
		}
		
		$this->load->view('common/header', array('page' => 'viewer', 'path' => '/iryou_guide/'));
		$this->load->view('pages/viewer', array('path' => '/iryou_guide/', 'datas' => $datas));
		$this->load->view('common/footer', array('path' => '/iryou_guide/'));
	}
}