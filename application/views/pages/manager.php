<div class="container managePage">
	<h3>管理ページ</h3>
	<div class="contents_wrap">
		<form method="POST" action="capture" enctype="multipart/form-data">
			<!--フォーム-->
			CSVアップロード
			<div class="infoBox pr10 pl10 pt10">
				<input type="file" name="csv_file" />
				<div class="completeButton" style="width:320px;">
					<div style="text-align:center;">
						<input type="submit" name="uploadBtn" value="アップロード" class="btn_next mt20" />&nbsp;
					</div>
				</div>
			</div>
		</form>
	</div>
	<div class="contents_wrap">
		<form method="POST" action="viewer">
			<!--フォーム-->
			確認用画面
			<div class="infoBox pr10 pl10 pt10">
				<input type="text" name="keyword" />
				<div class="completeButton" style="width:320px;">
					<div style="text-align:center;">
						<input type="submit" name="uploadBtn" value="検索" class="btn_next mt20" />&nbsp;
					</div>
				</div>
			</div>
		</form>
	</div>

<script>
  const modal = document.querySelector('.js-modal');
  const modalButton = document.querySelector('.js-modal-button');


  const modalClose = document.querySelector('.js-close-button');

  modalButton.addEventListener('click', () => {
    modal.classList.add('is-open');

  });

  modalClose.addEventListener('click', () => {
    modal.classList.remove('is-open');

  });
</script>