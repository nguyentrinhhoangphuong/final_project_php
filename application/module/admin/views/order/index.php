<?php
// COLUMN
$columnPost		= $this->arrParam['filter_column'];
$orderPost		= $this->arrParam['filter_column_dir'];

$lblCode 		= Helper::cmsLinkSort('Code', 'code', $columnPost, $orderPost);
$lblFullname 		= Helper::cmsLinkSort('Fullname', 'fullname', $columnPost, $orderPost);
$lblEmail 		= Helper::cmsLinkSort('Email', 'email', $columnPost, $orderPost);
$lblPhone 		= Helper::cmsLinkSort('Phone', 'phone', $columnPost, $orderPost);
$lblAddress 		= Helper::cmsLinkSort('Address', 'address', $columnPost, $orderPost);
$lblOrderTime 		= Helper::cmsLinkSort('Order time', 'order_time', $columnPost, $orderPost);
$lblDeliveryStatus 		= Helper::cmsLinkSort('Delivery Status', 'status', $columnPost, $orderPost);
$lblTotalPrice 		= Helper::cmsLinkSort('Total price', 'total_price', $columnPost, $orderPost);
$lblID			= Helper::cmsLinkSort('ID', 'id', $columnPost, $orderPost);

// SELECT
$arrStatus			= array('default' => '- Select Status -', 1 => 'Publish',  0 => 'Unpublish');
$selectboxStatus	= Helper::cmsSelectbox('filter_state', 'inputbox', $arrStatus, $this->arrParam['filter_state']);


function cmsArrCheck($check)
{
	$arrDeliveryStatus			= array('default' => '- Trạng thái giao hàng -', 1 => 'vừa đặt hàng', 2 => 'xác nhận', 3 => 'giao hàng', 4 => 'đã nhận', 5 => 'xác nhận');
	$xhtmlDeliveryStatus = '';
	foreach ($arrDeliveryStatus as $key => $value) {
		if ($check == $key) {
			$xhtmlDeliveryStatus .= '<option value="' . $key . '" selected>' . $value . '</option>';
		} else {
			$xhtmlDeliveryStatus .= '<option value="' . $key . '">' . $value . '</option>';
		}
	}
	return $xhtmlDeliveryStatus;
}

// Pagination
$paginationHTML		= $this->pagination->showPagination(URL::createLink('admin', 'order', 'index'));

// MESSAGE
$message	= Session::get('message');
Session::delete('message');
$strMessage = Helper::cmsMessage($message);

?>
<div id="system-message-container"><?php echo $strMessage; ?></div>

<div id="element-box">
	<div class="m">
		<form action="#" method="post" name="adminForm" id="adminForm">
			<!-- FILTER -->
			<fieldset id="filter-bar">
				<div class="filter-search fltlft">
					<label class="filter-search-lbl" for="filter_search">Filter:</label>
					<input type="text" name="filter_search" id="filter_search" value="<?php echo $this->arrParam['filter_search']; ?>">
					<button type="submit" name="submit-keyword">Search</button>
					<button type="button" name="clear-keyword">Clear</button>
				</div>
				<div class="filter-select fltrt">
					<?php echo $selectboxStatus; ?>
				</div>
			</fieldset>
			<div class="clr"> </div>

			<table class="adminlist" id="modules-mgr">
				<!-- HEADER TABLE -->
				<thead>
					<tr>
						<th width="10%"><?php echo $lblCode; ?></th>
						<th width="10%"><?php echo $lblFullname; ?></th>
						<th width="10%"><?php echo $lblEmail; ?></th>
						<th width="10%"><?php echo $lblPhone; ?></th>
						<th width="10%"><?php echo $lblAddress; ?></th>
						<th width="10%"><?php echo $lblOrderTime; ?></th>
						<th width="10%"><?php echo $lblDeliveryStatus; ?></th>
						<th width="10%"><?php echo $lblTotalPrice; ?></th>
						<th width="1%" class="nowrap"><?php echo $lblID; ?></th>
					</tr>
				</thead>
				<!-- FOOTER TABLE -->
				<?php echo Helper::cmsTfoot(10, $paginationHTML) ?>
				<!-- BODY TABLE -->
				<tbody>
					<?php
					if (!empty($this->Items)) {
						$i = 0;
						foreach ($this->Items as $key => $value) {
							$id 		= $value['id'];
							$fullname	= $value['fullname'];
							$code 		= $value['code'];
							$email 		= $value['email'];
							$phone 		= $value['phone'];
							$address 	= $value['address'];
							$order_time = $value['order_time'];
							$check		= $value['status'];
							$total_price = number_format($value['total_price']);
							$row		= ($i % 2 == 0) ? 'row0' : 'row1';
							$created	= Helper::formatDate('d-m-Y', $value['created']);
							$linkInfoOrderDetail	= URL::createLink('admin', 'order', 'infoOrderDetail', array('code' => $code));
							$linkChangeDeliveryStatus = URL::createLink('admin', 'order', 'changeDeliveryStatus', array('id' => $id));
							echo  '<tr class="' . $row . '">
		                                	<td class="center"><a href="' . $linkInfoOrderDetail . '">' . $code . '</a></td>
			                                <td class="center">' . $fullname . '</td>
			                                <td class="center">' . $email . '</td>
			                                <td class="center">' . $phone . '</td>
			                                <td class="center">' . $address . '</td>
			                                <td class="center">' . $order_time . '</td>
			                                <td class="center" data-link-ChangeDeliveryStatus="' . $linkChangeDeliveryStatus . '" data-id="' . $id . '">
												<select name="filter_check" id="' . $check . '">
													' . cmsArrCheck($check) . '
												</select>
											</td>
			                                <td class="center">' . $total_price . ' đ</td>
			                                <td class="center">' . $id . '</td>
			                            </tr>';
							$i++;
						}
					}
					?>
				</tbody>
			</table>

			<div>
				<!-- <input type="hidden" name="filter_column" value="fullname"> -->
				<input type="hidden" name="filter_page" value="1">
				<input type="hidden" name="filter_column_dir" value="asc">
			</div>
		</form>

		<div class="clr"></div>
	</div>
</div>
</div>