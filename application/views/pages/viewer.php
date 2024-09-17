<div class="managePage" style="margin-left:30px;margin-right:30px;">
  <h3>登録データ一覧</h3>
  <div class="contents_wrap">
    <?php foreach($datas['principals'] as $row){ ?>
    <table class="design01">
      <tr>
        <th style="width:100px;">学校区分</th>
        <th style="width:100px;">貴学名</th>
        <th style="width:100px;">電話番号</th>
        <th style="width:200px;">メールアドレス</th>
        <th style="width:100px;">開校年</th>
        <th style="width:100px;">住所</th>
        <th style="width:100px;">アクセス</th>
        <th style="width:100px;">学生寮</th>
        <th style="width:100px;">パンフ</th>
        <th style="width:100px;">願書</th>
        <th style="width:100px;">WEB出願</th>
        <th style="width:100px;">回答ID</th>
        <th style="width:100px;">ご回答者名</th>
        <th style="width:100px;">電話番号</th>
        <th style="width:200px;">メールアドレス</th>
      </tr>
      <tr>
        <th style="width:100px;"><?= $row['distinct'] ?></th>
        <th style="width:100px;">
        <p class="js-modal-view"><?= $row['school_name'] ?></p><br>
        <?= $row['school_name_furi'] ?>
        </th>
        <th style="width:100px;"><?= $row['tel'] ?></th>
        <th style="width:200px;"><?= $row['mail'] ?></th>
        <th style="width:100px;"><?= $row['open_school'] ?></th>
        <th>
          <?= $row['zip'] ?>
          <?= $row['pref'] ?><br>
          <?= $row['city'] ?><br>
          <?= $row['town'] ?><br>
          <?= $row['build'] ?><br>                 
        </th>
        <th style="width:100px;"><?= $row['transport'] ?></th>
        <th style="width:100px;"><?= $row['dormitory'] ?></th>
        <th style="width:100px;"><?= $row['pamph'] ?></th>
        <th style="width:100px;"><?= $row['application'] ?></th>
        <th style="width:100px;"><?= $row['web_application'] ?></th>
        <th style="width:100px;"><?= $row['response_id'] ?></th>
        <th style="width:100px;">
          <?= $row['respondent_sei'] ?><br>
          <?= $row['respondent_mei'] ?>
        </th>
        <th style="width:100px;"><?= $row['confirm_tel'] ?></th>
        <th style="width:200px;"><?= $row['confirm_mail'] ?></th>
      </tr>
      <tr>
        <th colspan="3">広告校リンク</th>
        <td colspan="12"<?php if(@$row['ad_contract'] && !@$row['ad_url']): ?> style="background-color:#FF82B2;"<?php endif; ?>>
            <?php if(@$row['ad_contract'] && @$row['ad_url']): ?>
              <a href="<?= @$row['ad_url'] ?>" target="_new"><?= @$row['ad_url'] ?></a>
            <?php endif; ?>
        </td>
      </tr>
      <!-- <tr> -->
      <?php if(@$datas['guides']){
        if(!@$datas['guides'][$row['id']]) continue;
        foreach($datas['guides'][$row['id']] as $guide){
          foreach($guide as $detail){
            $p_cnt = (@$datas['publicys'][$row['id']][$detail['ct_id']]) ? count($datas['publicys'][$row['id']][$detail['ct_id']]): 0;
            $g_cnt = (@$datas['generals'][$row['id']][$detail['ct_id']]) ? count($datas['generals'][$row['id']][$detail['ct_id']]): 0;
            $ad_cnt = 0;
            if(@$p_cnt) $ad_cnt++;
            if(@$g_cnt) $ad_cnt++;
            $payment = (@$detail['first_str']) ? $detail['first_str'].' ': '';
						if($detail['first_payment_s'] == $detail['first_payment_e']):
							$payment .= ($detail['first_payment_s'] == 0) ? '-': number_format($detail['first_payment_s']);
            else:
              $payment .= number_format($detail['first_payment_s']).'～'.number_format($detail['first_payment_e']);
            endif;
            $total_payment = (@$detail['total_str']) ? $detail['total_str'].' ': '';
						if($detail['total_payment_s'] == $detail['total_payment_e']):
							$total_payment .= ($detail['total_payment_s'] == 0) ? '-': number_format($detail['total_payment_s']);
            else:
              $total_payment .= number_format($detail['total_payment_s']).'～'.number_format($detail['total_payment_e']);
            endif;
            ?>
            <tr>
              <th rowspan="<?= $p_cnt+$g_cnt+6+$ad_cnt ?>" colspan="3"><?= str_replace(array(), '', $detail['category']) ?></th>
              <th colspan="2">設置学部学科コースの分野</th><td colspan="10"<?php if(!@$detail['field']): ?> style="background-color:#FF82B2;"<?php endif; ?>><?= str_replace(';', '、', $detail['field']) ?></td>
            </tr>
            <tr><th colspan="2">学部学科コース・年限・定員</th><td colspan="10"><?= $detail['course'] ?></td></tr>
            <tr>
              <th colspan="2">初年度納入金</th><td colspan="4"><?= $payment ?></td>
              <th colspan="2">卒業までの納入金</th><td colspan="4"><?= $total_payment ?></td>
            </tr>
            <tr><th colspan="2">主な就職先</th><td colspan="10"><?= $detail['employment'] ?></td></tr>
            <tr>
              <th colspan="2">入試概要</th><td colspan="6"><?= str_replace(';', '、', $detail['entrance_outline']) ?></td>
              <th colspan="2">公募推薦出願条件</th><td colspan="3"><?= str_replace(';', '、', $detail['term_publicy']) ?></td>
            </tr>
            <?php if(@$p_cnt): ?>
              <tr>
                <th colspan="2">公募推薦の試験科目</th><td colspan="10"><?= str_replace(';', '、', $detail['subject_publicy']) ?></td>
              </tr>
            <?php endif; ?>
            <?php if(@$g_cnt): ?>
              <tr>
                <th colspan="2">一般の試験科目</th><td colspan="10"><?= str_replace(';', '、', $detail['subject_general']) ?></td>
              </tr>
            <?php endif; ?>
            <tr><th colspan="2">評定平均</th><td colspan="10"><?= $detail['average'] ?></td></tr>
            <tr>
              <th colspan="2" rowspan="<?= $p_cnt ?>">公募試験日程</th>
            <?php 
              $l = 0;
              if($p_cnt > 0):
                foreach($datas['publicys'][$row['id']][$detail['ct_id']] as $publicys){
                  $ex_str = explode(' ', $publicys['title']);
                  $examin = $ex_str[0];
                  if(@$ex_str[1]) $examin .= ' 出願期間：'.$ex_str[1];
                  if(@$ex_str[2]) $examin .= ' 試験日：'.$ex_str[2];
                  if($l > 0) echo('</tr><tr>'); ?>
                <td colspan="12">
                  <?= $examin ?>
                </td>
              <?php $l++;
                }
              endif; ?>
            </tr>
            <tr>
              <th colspan="2" rowspan="<?= $g_cnt ?>">一般試験日程</th>
            <?php 
              $l = 0;
              if($g_cnt > 0):
                foreach($datas['generals'][$row['id']][$detail['ct_id']] as $generals){
                  $ex_str = explode(' ', $generals['title']);
                  $term = '';
                  $examin = $ex_str[0];
                  if(@$ex_str[1]) $examin .= ' 出願期間：'.$ex_str[1];
                  if(@$ex_str[2]) $examin .= ' 試験日：'.$ex_str[2];
                  $remark = ''; //(@$generals['remark']) ? '（'.$generals['remark'].'）': '';
                  if($l > 0) echo('</tr><tr>'); ?>
                  <td colspan="12">
                    <?= $examin.$remark ?>
                  </td>
              <?php $l++;
                }
              endif; ?>
            </tr>
          <?php }
          }
        } ?>
      <!-- </tr> -->
    </table>
    <?php } ?>
  </div>
</div>
