<div class="block-border">
	<div class="block-header">
		<h1>Quản Lý Tồn Thành Phẩm</h1><span></span>
	</div>

	<div class="block-content">
                <div style=" overflow:auto; height:700px;">

		<table class="table">
			<thead>
				<tr>
					<th><p>Mã Số</p></th>
                    <th><p>Tên</p></th>
                    <th><p>Tồn Đầu Kỳ</p></th>
                    <th><p>Sản Xuất</p></th>
                    <th><p>Xuất Kho</p></th>
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
	</div>	
</div>

<div id="createForm" style="left:auto; right:auto"></div>

<div class="block-border">
	<div class="block-header">
		<h1>Quản Lý Lệnh Sản Xuất Sản Phẩm</h1><span></span>
	</div>

	<div class="block-content">
		<table class="table">
			<thead>
				<tr>
					<th><p>Mã Số</p></th>
                    <th><p>Ngày Lập Lệnh</p></th>
					<th><p>Sản Phẩm</p></th>
					<th><p>Số Lượng</p></th>
                    <th><p>Trạng Thái</p></th>
                    <th><p>Ngày Hoàn Tất</p></th>
				</tr>
			</thead>
          
			<tbody id="productOrders">
			</tbody>
		</table>
	</div>
	<div class="block-header">
		<h1>Quản Lý Lệnh Xuất Kho Thành Phẩm</h1><span></span>
	</div>

	<div class="block-content">
		<table class="table">
			<thead>
				<tr>
					<th><p>Mã Số</p></th>
                    <th><p>Ngày Lập Lệnh</p></th>
                    <th><p>Trạng Thái</p></th>
                    <th><p>Ngày Hoàn Tất</p></th>
				</tr>
			</thead>
          
			<tbody id="orders">
			</tbody>
		</table>
	</div>
	<div class="block-actions-tab block-actions">
		<ul style="margin-top:3px;" class="actions-left">
			<li><input type="button" class="button" value="Thêm Lệnh Sản Xuất" onclick="callCreate()" /></li>
            <li><input type="button" class="button" value="Thêm Lệnh Xuất Kho" onclick="callExport()" /></li>
		</ul>
	</div>		
</div>
<script language="javascript" type="text/javascript" src="server/products/view.js"></script>