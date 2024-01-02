<?php
include_once(MODULE_PATH . 'admin/views/toolbar.php');
include_once 'submenu/index.php';

// COLUMN
$columnPost         = $this->arrParam['filter_column'];
$orderPost          = $this->arrParam['filter_column_dir'];

$lblQuestion        = Helper::cmsLinkSort('Question', 'question', $columnPost, $orderPost);
$lblAnswer          = Helper::cmsLinkSort('Answer', 'answer', $columnPost, $orderPost);
$lblFaqCategory     = Helper::cmsLinkSort('Faq Category', 'faq_category_id', $columnPost, $orderPost);
$lblStatus          = Helper::cmsLinkSort('Status', 'status', $columnPost, $orderPost);
$lblOrdering        = Helper::cmsLinkSort('Ordering', 'ordering', $columnPost, $orderPost);
$lblCreated         = Helper::cmsLinkSort('Created', 'created', $columnPost, $orderPost);
$lblCreatedBy       = Helper::cmsLinkSort('Created By', 'created_by', $columnPost, $orderPost);
$lblModified        = Helper::cmsLinkSort('Modified', 'modified', $columnPost, $orderPost);
$lblModifiedBy      = Helper::cmsLinkSort('Modified By', 'modified_by', $columnPost, $orderPost);
$lblID              = Helper::cmsLinkSort('ID', 'id', $columnPost, $orderPost);

// SELECT STATUS
$arrStatus          = array('default' => '- Select Status -', 1 => 'Publish',  0 => 'Unpublish');
$selectboxStatus    = Helper::cmsSelectbox('filter_state', 'inputbox', $arrStatus, $this->arrParam['filter_state']);


// Pagination
$paginationHTML     = $this->pagination->showPagination(URL::createLink('admin', 'faq', 'index'));

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
                <?php include_once(MODULE_PATH . 'admin/views/filter-search.php'); ?>
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
                        <th class="10%"><?php echo $lblQuestion; ?></th>
                        <th class="10%"><?php echo $lblAnswer; ?></th>
                        <th class="10%"><?php echo $lblFaqCategory; ?></th>
                        <th width="10%"><?php echo $lblStatus; ?></th>
                        <th width="10%"><?php echo $lblOrdering; ?></th>
                        <th width="10%"><?php echo $lblCreated; ?></th>
                        <th width="10%"><?php echo $lblCreatedBy; ?></th>
                        <th width="10%"><?php echo $lblModified; ?></th>
                        <th width="10%"><?php echo $lblModifiedBy; ?></th>
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
                            $id = $value['id'];
                            $ckb = '<input type="checkbox" name="cid[]" value="' . $id . '">';
                            $question = $value['question'];
                            $answer = $value['answer'];
                            $faqCategory = $value['faq_category'];
                            $row = ($i % 2 == 0) ? 'row0' : 'row1';
                            $status = Helper::cmsStatus($value['status'], URL::createLink('admin', 'faqItem', 'ajaxStatus', array('id' => $id, 'status' => $value['status'])), $id);
                            $ordering = '<input type="text" name="order[' . $id . ']" size="5" value="' . $value['ordering'] . '" class="text-area-order">';
                            $created = Helper::formatDate('d-m-Y', $value['created']);
                            $created_by = $value['created_by'];
                            $modified = Helper::formatDate('d-m-Y', $value['modified']);
                            $modified_by = $value['modified_by'];
                            $linkEdit = URL::createLink('admin', 'faqItem', 'form', array('id' => $id));

                            echo  '<tr class="' . $row . '">
		                                	<td class="center">' . $ckb . '</td>
		                                	<td><a href="' . $linkEdit . '">' . $question . '</a></td>
			                                <td>' . $answer . '</td>
			                                <td class="center">' . $faqCategory . '</td>
			                                <td class="center">' . $status . '</td>
			                                <td class="order">' . $ordering . '</td>
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
                <input type="hidden" name="filter_column" value="question">
                <input type="hidden" name="filter_page" value="1">
                <input type="hidden" name="filter_column_dir" value="asc">
            </div>
        </form>

        <div class="clr"></div>
    </div>
</div>
</div>