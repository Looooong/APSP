<div class="block-border">
	<div class="block-header">
		<h1>Quản Lý Tồn Nguyên Liệu</h1><span></span>
	</div>

	<div class="block-content">
		<table class="table">
			<thead>
				<tr>
					<th><p>Mã Số</p></th>
                    <th><p>Tên</p></th>
                    <th><p>Tồn Đầu Kỳ</p></th>
                    <th><p>Nhập</p></th>
                    <th><p>Xuất</p></th>
                    <th><p>Tồn Dự Kiến</p></th>
                    <th><p>Tồn Thực Tế</p></th>
                    <th><p>Cập Nhật Thực Tế</p></th>
				</tr>
			</thead>
			<tbody id="stock">
			</tbody>
		</table>
	</div>	
</div>

<div id="createForm"></div>

<div class="block-border">
	<div class="block-header">
		<h1>Quản Lý Lệnh Nhập Xuất Nguyên Liệu</h1><span></span>
	</div>

	<div class="block-content">
		<table class="table">
			<thead>
				<tr>
					<th><p>Mã Số</p></th>
                    <th><p>Ngày Lập Lệnh</p></th>
                    <th><p>Trạng Thái</p></th>
                    <th><p>Ngày Hoàn Tất</p></th>
					<th><p>Chức năng</p></th>
				</tr>
			</thead>
			<tbody id="orders">
			</tbody>
		</table>
	</div>
	<div class="block-actions-tab block-actions">
		<ul style="margin-top:3px;" class="actions-left">
			<li><input type="button" class="button" value="Thêm" onclick="callCreate()" /></li>
		</ul>
	</div>		
</div>

<div class="block-border">
	<div class="block-header">
		<h1>Quản Lý Tồn Đóng Gói </h1><span></span>
	</div>

	<div class="block-content">
		<table class="table">
			<thead>
				<tr>
					<th><p>Mã Số</p></th>
                    <th><p>Tên</p></th>
                    <th><p>Tồn Đầu Kỳ</p></th>
                    <th><p>Nhập</p></th>
                    <th><p>Xuất</p></th>
                    <th><p>Tồn Dự Kiến</p></th>
                    <th><p>Tồn Thực Tế</p></th>
                    <th><p>Cập Nhật Thực Tế</p></th>
				</tr>
			</thead>
			<tbody id="StockPackage">
			</tbody>
		</table>
	</div>	
</div>

<div id="createForm"></div>

<div class="block-border">
	<div class="block-header">
		<h1>Quản Lý Lệnh Nhập Xuất Đóng Gói</h1><span></span>
	</div>

	<div class="block-content">
		<table class="table">
			<thead>
				<tr>
					<th><p>Mã Số</p></th>
                    <th><p>Ngày Lập Lệnh</p></th>
                    <th><p>Trạng Thái</p></th>
                    <th><p>Ngày Hoàn Tất</p></th>
					<th><p>Chức năng</p></th>
				</tr>
			</thead>
			<tbody id="OrderPackage">
			</tbody>
		</table>
	</div>
	<div class="block-actions-tab block-actions">
		<ul style="margin-top:3px;" class="actions-left">
			<li><input type="button" class="button" value="Thêm" onclick="callCreate()" /></li>
		</ul>
	</div>		
</div>

<script language="javascript" type="text/javascript" src="server/materials/view.js"></script>

<script language="javascript" type="text/javascript" src="server/materials/viewDelete.js"></script>