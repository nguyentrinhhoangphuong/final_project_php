<?php
include_once(MODULE_PATH . 'admin/views/toolbar.php');
include_once 'submenu/index.php';

// COLUMN
$columnPost        = $this->arrParam['filter_column'];
$orderPost        = $this->arrParam['filter_column_dir'];
$lblName         = Helper::cmsLinkSort('Name', 'name', $columnPost, $orderPost);
$lblPicture        = Helper::cmsLinkSort('Picture', 'picture', $columnPost, $orderPost);
$lblStatus        = Helper::cmsLinkSort('Status', 'status', $columnPost, $orderPost);
$lblDescription     = Helper::cmsLinkSort('Description', 'description', $columnPost, $orderPost);
$lblOrdering    = Helper::cmsLinkSort('Ordering', 'ordering', $columnPost, $orderPost);
$lblLink    = Helper::cmsLinkSort('Link', 'link', $columnPost, $orderPost);
$lblCreated        = Helper::cmsLinkSort('Created', 'created', $columnPost, $orderPost);
$lblCreatedBy    = Helper::cmsLinkSort('Created By', 'created_by', $columnPost, $orderPost);
$lblModified    = Helper::cmsLinkSort('Modified', 'modified', $columnPost, $orderPost);
$lblModifiedBy    = Helper::cmsLinkSort('Modified By', 'modified_by', $columnPost, $orderPost);
$lblID            = Helper::cmsLinkSort('ID', 'id', $columnPost, $orderPost);

// SELECT
$arrStatus            = array('default' => '- Select Status -', 1 => 'Publish',  0 => 'Unpublish');
$selectboxStatus    = Helper::cmsSelectbox('filter_state', 'inputbox', $arrStatus, $this->arrParam['filter_state']);

// Pagination
$paginationHTML        = $this->pagination->showPagination(URL::createLink('admin', TBL_SLIDER, 'index'));

// MESSAGE
$message    = Session::get('message');
Session::delete('message');
$strMessage = Helper::cmsMessage($message);

?>
<div id="system-message-container"><?php echo $strMessage; ?></div>

<div id="element-box">
    <div class="m">
        <form action="#" method="post" name="adminForm" id="adminForm">
            <!-- FILTER -->
            <fieldset id="filter-bar">
                <div class="filter-select fltrt">
                    <?php echo $selectboxStatus; ?>
                </div>
            </fieldset>
            <div class="clr"> </div>

            <table class="adminlist" id="modules-mgr">
                <!-- HEADER TABLE -->
                <thead>
                    <tr>
                        <th width="1%"><input type="checkbox" name="checkall-toggle"></th>
                        <th width="10%"><?php echo $lblName; ?></th>
                        <th width="8%"><?php echo $lblPicture; ?></th>
                        <th width="5%"><?php echo $lblStatus; ?></th>
                        <th width="6%"><?php echo $lblOrdering; ?></th>
                        <th width="6%"><?php echo $lblLink; ?></th>
                        <th width="6%"><?php echo $lblDescription; ?></th>
                        <th width="7%"><?php echo $lblCreated; ?></th>
                        <th width="7%"><?php echo $lblCreatedBy; ?></th>
                        <th width="7%"><?php echo $lblModified; ?></th>
                        <th width="7%"><?php echo $lblModifiedBy; ?></th>
                        <th width="1%" class="nowrap"><?php echo $lblID; ?></th>
                    </tr>
                </thead>
                <!-- FOOTER TABLE -->
                <?php echo Helper::cmsTfoot(14, $paginationHTML) ?>
                <!--  -->
                <!-- BODY TABLE -->
                <tbody>
                    <?php
                    if (!empty($this->Items)) {
                        $i = 0;
                        foreach ($this->Items as $key => $value) {
                            $id         = $value['id'];
                            $ckb        = '<input type="checkbox" name="cid[]" value="' . $id . '">';
                            $name        = $value['title'];
                            $picture     = Helper::createImage('slider', '', $value['image'], array('width' => 100, 'height' => 100));
                            $row        = ($i % 2 == 0) ? 'row0' : 'row1';
                            $status        = Helper::cmsStatus($value['status'], URL::createLink('admin', 'slider', 'ajaxStatus', array('id' => $id, 'status' => $value['status'])), $id);
                            $description        = substr($value['description'], 0, 100) . "...";
                            $ordering    = '<input type="text" name="order[' . $id . ']" size="5" value="' . $value['ordering'] . '" class="text-area-order">';
                            $link        = $value['link'];
                            $created    = Helper::formatDate('d-m-Y', $value['created']);
                            $created_by    = $value['created_by'];
                            $modified    = Helper::formatDate('d-m-Y', $value['modified']);
                            $modified_by = $value['modified_by'];
                            $linkEdit    = URL::createLink('admin', 'slider', 'form', array('id' => $id));

                            echo  '<tr class="' . $row . '">
		                                	<td class="center">' . $ckb . '</td>
		                                	<td ><a href="' . $linkEdit . '">' . $name . '</a></td>
			                                <td class="center">' . $picture . '</td>
			                                <td class="center">' . $status . '</td>
			                                <td class="order">' . $ordering . '</td>
			                                <td class="order">' . $link . '</td>
			                                <td class="order">' . $description . '</td>
			                                <td class="center">' . $created . '</td>
			                                <td class="center">' . $created_by . '</td>
			                                <td class="center">' . $modified . '</td>
			                                <td class="center">' . $modified_by . '</td>
			                                <td class="center">' . $id . '</td>
			                            </tr>';
                            $i++;
                        }
                    }
                    ?>
                </tbody>
            </table>

            <div>
                <input type="hidden" name="filter_column" value="title">
                <input type="hidden" name="filter_page" value="1">
                <input type="hidden" name="filter_column_dir" value="asc">
            </div>
        </form>

        <div class="clr"></div>
    </div>
</div>
</div>