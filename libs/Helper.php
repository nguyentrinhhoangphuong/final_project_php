<?php
class Helper
{

	// Create Button
	public static function cmsButton($name, $id, $link, $icon, $type = 'new')
	{
		$xhtml  = '<li class="button" id="' . $id . '">';
		if ($type == 'new') {
			$xhtml .= '<a class="modal" href="' . $link . '"><span class="' . $icon . '"></span>' . $name . '</a>';
		} else if ($type == 'submit') {
			$xhtml .= '<a class="modal" href="#" onclick="javascript:submitForm(\'' . $link . '\');"><span class="' . $icon . '"></span>' . $name . '</a>';
		}
		$xhtml .= '</li>';

		return $xhtml;
	}

	// Create Icon Status
	public static function cmsStatus($statusValue, $link, $id)
	{
		$strStatus = ($statusValue == 0) ? 'unpublish' : 'publish';

		$xhtml		= '<a class="jgrid" id="status-' . $id . '" href="javascript:changeStatus(\'' . $link . '\');">
							<span class="state ' . $strStatus . '"></span>
						</a>';
		return $xhtml;
	}

	// Create Icon Delivery
	public static function cmsDelivery($statusValue, $link, $id)
	{
		$strStatus = ($statusValue == 0) ? 'unpublish' : 'publish';

		$xhtml		= '<a class="jgrid" id="delivery-' . $id . '" href="javascript:changeDelivery(\'' . $link . '\');">
							<span class="state ' . $strStatus . '"></span>
						</a>';
		return $xhtml;
	}
	// Create Icon Finish
	public static function cmsFinish($statusValue, $link, $id)
	{
		$strStatus = ($statusValue == 0) ? 'unpublish' : 'publish';

		$xhtml		= '<a class="jgrid" id="finish-' . $id . '" href="javascript:changeFinish(\'' . $link . '\');">
							<span class="state ' . $strStatus . '"></span>
						</a>';
		return $xhtml;
	}

	// Create Icon Special
	public static function cmsSpecial($statusValue, $link, $id)
	{
		$strStatus = ($statusValue == 0) ? 'unpublish' : 'publish';

		$xhtml		= '<a class="jgrid" id="special-' . $id . '" href="javascript:changeSpecial(\'' . $link . '\');">
							<span class="state ' . $strStatus . '"></span>
						</a>';
		return $xhtml;
	}

	// Create Icon Group ACP
	public static function cmsGroupACP($groupAcpValue, $link, $id)
	{
		$strGroupACP 	= ($groupAcpValue == 0) ? 'unpublish' : 'publish';

		$xhtml			= '<a class="jgrid" id="group-acp-' . $id . '" href="javascript:changeGroupACP(\'' . $link . '\');">
								<span class="state ' . $strGroupACP . '"></span>
							</a>';
		return $xhtml;
	}

	// Create Title sort
	public static function cmsLinkSort($name, $column, $columnPost, $orderPost)
	{
		$img	= '';
		$order	= ($orderPost == 'desc') ? 'asc' : 'desc';
		if ($column == $columnPost) {
			$img	= '<img src="' . TEMPLATE_URL . 'admin/main/images/admin/sort_' . $orderPost . '.png" alt="">';
		}
		$xhtml = '<a href="#" onclick="javascript:sortList(\'' . $column . '\',\'' . $order . '\')">' . $name . $img . '</a>';
		return $xhtml;
	}

	// Create Message
	public static function cmsMessage($message)
	{
		$xhtml = '';
		if (!empty($message)) {
			$xhtml = '<dl id="system-message">
							<dt class="' . $message['class'] . '">' . ucfirst($message['class']) . '</dt>
							<dd class="' . $message['class'] . ' message">
								<ul>
									<li>' . $message['content'] . '</li>
								</ul>
							</dd>
						</dl>';
		}
		return $xhtml;
	}

	// Create Selectbox
	public static function cmsSelectbox($name, $class, $arrValue, $keySelect = 'default', $style = null)
	{
		$xhtml = '<select style="' . $style . '" name="' . $name . '" class="' . $class . '" >';
		foreach ($arrValue as $key => $value) {
			if ($key == $keySelect && is_numeric($keySelect)) {
				$xhtml .= '<option selected="selected" value = "' . $key . '">' . $value . '</option>';
			} else {
				$xhtml .= '<option value = "' . $key . '">' . $value . '</option>';
			}
		}
		$xhtml .= '</select>';
		return $xhtml;
	}

	// Create Input
	public static function cmsInput($type, $name, $id, $value, $class = null, $size = null)
	{
		$strSize	=	($size == null) ? '' : "size='$size'";
		$strClass	=	($class == null) ? '' : "class='$class'";

		$xhtml = "<input type='$type' name='$name' id='$id' value='$value' $strClass $strSize>";

		return $xhtml;
	}

	// Create Row - ADMIN
	public static function cmsRowForm($lblName, $input, $require = false)
	{
		$strRequired = '';
		if ($require == true) $strRequired = '<span class="star">&nbsp;*</span>';
		$xhtml = '<li><label>' . $lblName . $strRequired . '</label>' . $input . '</li>';

		return $xhtml;
	}

	// Create Row - PUBLIC
	public static function cmsRow($lblName, $input, $submit = false)
	{
		if ($submit == false) {
			$xhtml = '<div class="form_row"><label class="contact"><strong>' . $lblName . ':</strong></label>' . $input . '</div>';
		} else {
			$xhtml = '<div class="form_row">' . $input . '</div>';
		}
		return $xhtml;
	}

	// Formate Date
	public static function formatDate($format, $value)
	{
		$result = '';
		if (!empty($value) && $value != '0000-00-00') {
			$result = date($format, strtotime($value));
		}
		return $result;
	}

	// Create Image
	public static function createImage($folder, $prefix, $pictureName, $attribute = null)
	{
		$class	= !empty($attribute['class']) ? $attribute['class'] : '';
		$width	= !empty($attribute['width']) ? $attribute['width'] : '';
		$height	= !empty($attribute['height']) ? $attribute['height'] : '';
		$style	= !empty($attribute['style']) ? $attribute['style'] : '';
		$strAttribute	= "class='$class'  style='$style' width='$width' height='$height'";

		$picturePath	= UPLOAD_PATH . $folder . DS . $prefix . $pictureName;
		if (file_exists($picturePath) == true) {
			$picture	= '<img  ' . $strAttribute . ' src="' . UPLOAD_URL . $folder . DS . $prefix . $pictureName . '">';
		} else {
			$picture	= '<img ' . $strAttribute . ' src="' . UPLOAD_URL . $folder . DS . $prefix . 'default.jpg' . '">';
		}

		return $picture;
	}

	public static function getImage($folder, $pictureName)
	{
		$picturePath	= UPLOAD_PATH . $folder . DS  . $pictureName;
		if (file_exists($picturePath) == true) {
			$picture	= '<img style="" src="' . UPLOAD_URL . $folder . DS  . $pictureName . '">';
		} else {
			$picture	= '<img src="' . UPLOAD_URL . $folder . DS  . 'default.jpg' . '">';
		}
		return $picture;
	}

	// Create Title - Default
	public static function createTitle($imageURL, $titleName)
	{
		$xhtml = '<div class="title">
						<span class="title_icon"><img src="' . $imageURL . '" alt="" title=""></span>' . $titleName . '
					</div>';
		return $xhtml;
	}

	public static function cmsTfoot($column, $paginationHTML)
	{
		return "<tfoot>
		<tr>
			<td colspan='$column'>
				<!-- PAGINATION -->
				<div class='container'>
					 $paginationHTML
				</div>
			</td>
		</tr>
	</tfoot>";
	}

	public static function cmsSaleOff($item)
	{
		$price = 0;
		if ($item['sale_off'] > 0) {
			$priceSaleOff = (100 - $item['sale_off']) * $item['price'] / 100;
			$price = "<span class='text-accent'>" . number_format($priceSaleOff) . "<small>đ</small></span>        ";
			$price .= "<del class='text-muted fs-lg me-3'>" . number_format($item['price']) . "<small>đ</small></small></del>";
		} else {
			$price = "<span class='text-accent'>" . number_format($item['price']) . "<small>đ</small></span>";
		}
		return $price;
	}

	public static function cmsPay($item)
	{
		$price = 0;
		if ($item['sale_off'] > 0) {
			$price = (100 - $item['sale_off']) * $item['price'] / 100;
		} else {
			$price = $item['price'];
		}
		return $price;
	}

	public static function cmsTextArea($name, $id, $value, $rows = 4, $cols = 50, $class = '')
	{
		$xhtml = '<textarea name="' . $name . '" id="' . $id . '" rows="' . $rows . '" cols="' . $cols . '" class="' . $class . '">' . $value . '</textarea>';
		return $xhtml;
	}


	public static function shortenString($string, $len = 150)
	{
		if (strlen($string) > $len) {
			$string = trim(substr($string, 0, $len));
			$string = substr($string, 0, strrpos($string, " ")) . "&hellip;";
		} else {
			$string .= "&hellip;";
		}
		return $string;
	}

	public static function showListGrid()
	{
		$validDisplayModes = ['list', 'grid']; // Các giá trị hợp lệ cho display_mode
		$displayMode = isset($_GET['display_mode']) && in_array($_GET['display_mode'], $validDisplayModes) ? $_GET['display_mode'] : 'grid';
		return $displayMode;
	}

	public static function generateRandomString($length = 6)
	{
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, strlen($characters) - 1)];
		}
		return $randomString;
	}

	public static function highLight($text, $keyword)
	{
		$highlightedText = preg_replace('/' . preg_quote($keyword, '/') . '/i', '<span style="background-color: yellow;">$0</span>', $text);
		return $highlightedText;
	}
}
